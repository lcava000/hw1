
/**************************************************
                 GET ID / PAGES
**************************************************/
const urlSearchParams = new URLSearchParams(window.location.search);
const id = urlSearchParams.get("id");


/* 
--------  roomDescription 
*/

function roomDescriptionOnText(text){
    //JSON Object Data
    data = JSON.parse(text);

    //Assign roomDescription
    const p = document.getElementById('roomDescription');
    p.innerHTML = data.roomDescription;

    const roomImage = document.getElementById("roomImage");
    roomImage.src = data.roomImage; 
    roomImage.alt = data.roomName; 

    const roomName = document.getElementById("roomName");
    roomName.innerHTML = data.roomName;



}

function roomDescriptionOnResponse(response){
    return response.text();
}

fetch("./json/roomDetails.php?id="+id).then(roomDescriptionOnResponse).then(roomDescriptionOnText);


/*
    roomPrice
*/

function roomPriceOnText(text){
    //JSON Object Data
    data = JSON.parse(text);

    const priceTable = document.querySelector("#roomPriceTable");

    data.forEach(element => {
        const tr = document.createElement("tr");

        const roomType = document.createElement("td");
        roomType.innerHTML = element.roomName;
        tr.appendChild(roomType);

        const serviceType = document.createElement("td");
        serviceType.innerHTML = element.serviceName;
        tr.appendChild(serviceType);

        const priceNight =  document.createElement("td");
        priceNight.innerHTML = element.roomPrice + ' AED';
        tr.appendChild(priceNight);

        const status = document.createElement("td");

        //check if is booked
        if(element.available==false){
            status.classList.add("booked");
            status.innerHTML = "Booked";
            tr.appendChild(status);

            const reservation = document.createElement("td");
            reservation.innerHTML = "--";
            tr.appendChild(reservation);
        }
        else{
            status.classList.add("available");
            status.innerHTML = "Available";
            tr.appendChild(status);

            const reservation = document.createElement("td");
            //Button to Book
            const button = document.createElement("button");
            button.innerHTML = "Book Now";
            button.classList.add("btn-primary");
            button.classList.add("white");
            button.classList.add("small");
            button.setAttribute("button-type", "booking");
            button.setAttribute("data-id", element.id);

            reservation.appendChild(button);
            tr.appendChild(reservation);
            
        }

        priceTable.appendChild(tr);
    });

    //Date
    const checkInInput = document.querySelector("#checkInInput").value
    const checkOutInput = document.querySelector("#checkOutInput").value

    const bookingButtons = document.querySelectorAll('button[button-type="booking"]');
    bookingButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        
    
        //Redirect to Booking Checkout Page when Clicking Book Now Button
        const room_selected = button.getAttribute('data-id');
        window.location.href = './checkout.php?id=' + room_selected + '&checkin=' + checkInInput + '&checkout=' + checkOutInput;

      });
    });
    
}

function roomPriceOnResponse(response){
    return response.text();
}


/**************************************************
                 Event Listener
**************************************************/

const search = document.getElementById("search_room");
search.addEventListener("click", () => {

    //Date
    const checkInInput = document.querySelector("#checkInInput").value
    const checkOutInput = document.querySelector("#checkOutInput").value
    const currentDate = new Date();

    console.log(currentDate);

    //if checkout date is before checkin date
    if(checkOutInput<=checkInInput){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Checkout Date is incorrect!',
          })


        //Set checkout date checkin date + 1
        document.querySelector("#checkOutInput").value = '';
    }
    // Convert the check-in input to a Date object
    const checkInDate = new Date(checkInInput);
    // Set the time portion of the current date to midnight
    currentDate.setHours(0, 0, 0, 0);
    // Compare the check-in date with the current date
    if (checkInDate < currentDate) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Check-in Date is incorrect!',
        });
      
        // Reset the check-in input field
        document.querySelector("#checkInInput").value = '';
    }

    //Delete all Child Elements if they exist
    const priceTable = document.querySelector("#roomPriceTable");
    while (priceTable.firstChild) {
        priceTable.removeChild(priceTable.firstChild);
    }

    //Get Request
    fetch("./json/roomPrice.php?id="+id+"&checkin="+ checkInInput + "&checkout=" + checkOutInput).then(roomPriceOnResponse).then(roomPriceOnText);

});

/**************************************************
                On Load Page
**************************************************/
const date_raw = new Date();
const year = date_raw.getFullYear();
const month = String(date_raw.getMonth() + 1).padStart(2, '0');
const day = String(date_raw.getDate()).padStart(2, '0');

const today_formatted = `${year}-${month}-${day}`;

const tomorrow = new Date(date_raw);
tomorrow.setDate(tomorrow.getDate() + 1);
const year_tomorrow = tomorrow.getFullYear();
const month_tomorrow = String(tomorrow.getMonth() + 1).padStart(2, '0');
const day_tomorrow = String(tomorrow.getDate()).padStart(2, '0');

const tomorrow_formatted = `${year_tomorrow}-${month_tomorrow}-${day_tomorrow}`;

document.querySelector("#checkInInput").value = today_formatted;
document.querySelector("#checkOutInput").value = tomorrow_formatted;

search.click();

