/**************************************************
                 GET ID / PAGES
**************************************************/
const urlSearchParams = new URLSearchParams(window.location.search);

const id_url = urlSearchParams.get("id");
const checkin_url = urlSearchParams.get("checkin");
const checkout_url = urlSearchParams.get("checkout");
let bed_space_input = 0;

/**************************************************
                QUERY SELECTORS
**************************************************/
const bed_space = document.querySelector('#bed_space');
const roomname = document.querySelector('#roomname');
const price_per_night = document.querySelector('#price_per_night');
const checkin = document.querySelector('#checkin');
const checkout = document.querySelector('#checkout');
const total_night = document.querySelector('#total_night');
const total_price = document.querySelector('#total_price');

/**************************************************
                    MAIN FECTH
**************************************************/
fetch('./json/roomCheckoutSummary.php?id=' + id_url)
  .then(response => response.json())
  .then(data => {

    //Icon Bed
    bed_space_input = parseFloat(data.roomBed);
    for (let i = 0; i < bed_space_input; i++) {
        const bed_icon = document.createElement("i");
        bed_icon.classList.add("fa-solid", "fa-person");
        bed_space.appendChild(bed_icon);
    }

    roomname.innerHTML = data.roomName;
    price_per_night.value = data.roomPrice;

    //Calculate Checkout Date - Checkin Date in Days 
    const date1 = new Date(checkin_url);
    const date2 = new Date(checkout_url);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    total_night.value = diffDays;

    //Assignament
    price_per_night.innerHTML = price_per_night.value + ' AED';
    checkin.innerHTML = checkin_url;
    checkout.innerHTML = checkout_url;
    total_night.innerHTML = total_night.value;
    total_price.innerHTML = price_per_night.value * total_night.value + ' AED';

  })
  .catch(error => {
    console.error('Si è verificato un errore:', error);
  });











