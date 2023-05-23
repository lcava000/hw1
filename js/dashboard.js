/*  -----------------------------------------------------------------------------------------------
    CREATION DATE: 2023/05/12
    SUMMARY RESERVATION
--------------------------------------------------------------------------------------------------- */

function summartyOnText(text){
    data = JSON.parse(text);

    const reservationTable = document.querySelector("#summaryReservation"); //RESERCATION TABLE
    const paymentReservation = document.querySelector("#paymentReservation"); //INVOICE TABLE 

    data.forEach(element => {
        const tr = document.createElement("tr");

        //ROOM NAME
        const roomName = document.createElement("td");
        roomName.innerHTML = element.roomName;
        tr.appendChild(roomName);

        //CHECKIN DATE
        const checkinDate = document.createElement("td");
        checkinDate.innerHTML = element.checkinDate;
        tr.appendChild(checkinDate);

        //CHECKOUT DATE
        const checkoutDate =  document.createElement("td");
        checkoutDate.innerHTML = element.checkoutDate
        tr.appendChild(checkoutDate);

        //BED SPACE
        const bed_space = document.createElement("td");
        for (let i = 0; i < element.roomBed; i++) {
            const bed_icon = document.createElement("i");
            bed_icon.classList.add("fa-solid", "fa-person");
            bed_space.appendChild(bed_icon);
        }
        tr.appendChild(bed_space);

        //TOTALE PRICE
        const totalPrice =  document.createElement("td");
        totalPrice.innerHTML = element.totalPayed + " AED";
        tr.appendChild(totalPrice);

        //BUTTON
        const reservation = document.createElement("td");
        const button = document.createElement("button");
        button.innerHTML = "Cancel Resevation";
        button.classList.add("btn-primary");
        button.classList.add("white");
        button.classList.add("small");
        button.setAttribute("button-type", "booking");
        button.setAttribute("data-id", element.id);

        reservation.appendChild(button);
        tr.appendChild(reservation);

        reservationTable.appendChild(tr);

        //INVOICE TABLE

        const itr = document.createElement("tr");

        //PAYMENT DATE
        const paymentdate = document.createElement("td");
        paymentdate.innerHTML = element.timestamp;
        itr.appendChild(paymentdate);

        //AMOUNT
        const amount =  document.createElement("td");
        amount.innerHTML = element.totalPayed + " AED";
        itr.appendChild(amount);

        //PAYMENT METHOD
        const paymentmethod =  document.createElement("td");
        paymentmethod.innerHTML = "Credit Card"
        itr.appendChild(paymentmethod);

        //BUTTON
        const ireservation = document.createElement("td");
        const ibutton = document.createElement("a");
        ibutton.innerHTML = "Download Invoice";
        ibutton.classList.add("btn-primary");
        ibutton.classList.add("white");
        ibutton.classList.add("small");
        ibutton.id = "downloadBtn";
        ibutton.setAttribute("button-type", "booking");
        ibutton.setAttribute("href", element.invoiceUrl);
        ibutton.setAttribute("target", "_blank");

        //per comodità ho salvato l'invoice url in href del <a>
        //così da poterlo scaricare  quando clicco         
        //anche se è poco carino
        //avessi avuto più tempo avrei fatto una funzione che tramite una fetch 
        //prende l'url e lo scarica

        ireservation.appendChild(ibutton);
        itr.appendChild(ireservation);

        paymentReservation.appendChild(itr);

    });
}

function summaryOnResponse(response){
    return response.text();
}

/*  -----------------------------------------------------------------------------------------------
    CREATION DATE: 2023/05/16
    DOWNLOAD INVOICE
--------------------------------------------------------------------------------------------------- */



fetch('../json/getUserId.php')
  .then(response => response.text())
  .then(data => {
    const userid = data;
    console.log('Success to get ID:', userid);
    fetch("../json/bookingSummary.php?customerId="+userid).then(summaryOnResponse).then(summartyOnText);

  })
  .catch(error => {
    console.error('Error to get ID:', error);
  });


/*  -----------------------------------------------------------------------------------------------
    CREATION DATE: 2023/05/12
    PDF MAKE INVOICE
--------------------------------------------------------------------------------------------------- */
