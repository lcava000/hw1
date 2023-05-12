/*  -----------------------------------------------------------------------------------------------
    CREATION DATE: 2023/05/12
    SUMMARY RESERVATION
--------------------------------------------------------------------------------------------------- */

function summartyOnText(text){
    data = JSON.parse(text);

    const reservationTable = document.querySelector("#summaryReservation");

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
    });
}

function summaryOnResponse(response){
    return response.text();
}

fetch("/json/bookingSummary.php?customerId=1").then(summaryOnResponse).then(summartyOnText);

/*  -----------------------------------------------------------------------------------------------
    CREATION DATE: 2023/05/12
    PAYMENT RESERVATION
--------------------------------------------------------------------------------------------------- */

function paymentOnText(text){
    data = JSON.parse(text);

    const paymentReservation = document.querySelector("#paymentReservation");

    data.forEach(element => {
        const tr = document.createElement("tr");

        //INVOICE NUMBER
        const invoiceNumber = document.createElement("td");
        invoiceNumber.innerHTML = element.paymentId;
        tr.appendChild(invoiceNumber);

        //PAYMENT DATE
        const paymentdate = document.createElement("td");
        paymentdate.innerHTML = element.paymentDate;
        tr.appendChild(paymentdate);

        //AMOUNT
        const amount =  document.createElement("td");
        amount.innerHTML = element.amount + " AED";
        tr.appendChild(amount);

        //PAYMENT METHOD
        const paymentmethod =  document.createElement("td");
        paymentmethod.innerHTML = element.paymentMethod
        tr.appendChild(paymentmethod);


        //BUTTON
        const reservation = document.createElement("td");
        const button = document.createElement("button");
        button.innerHTML = "Download Invoice";
        button.classList.add("btn-primary");
        button.classList.add("white");
        button.classList.add("small");
        button.setAttribute("button-type", "booking");
        button.setAttribute("data-id", element.paymentId);

        reservation.appendChild(button);
        tr.appendChild(reservation);

        paymentReservation.appendChild(tr);
    });
}


fetch("/json/bookingPayment.php?customerId=1").then(summaryOnResponse).then(paymentOnText);

/*  -----------------------------------------------------------------------------------------------
    CREATION DATE: 2023/05/12
    PDF MAKE INVOICE
--------------------------------------------------------------------------------------------------- */


const axios = require('axios');

// Funzione per scaricare una fattura da Stripe
async function downloadInvoiceFromStripe(invoiceId) {
  try {
    // Effettua una richiesta GET all'API di Stripe per ottenere le informazioni sulla fattura
    const response = await axios.get(`https://api.stripe.com/v1/invoices/${invoiceId}`, {
      headers: {
        Authorization: 'Bearer pk_test_51HkPqZKomNJ2WTb0Ly417EGfPfwaS4UaSdFhWnl3CfkLFzO5qMkXPXnmYqmiTNyDlIXtCRMSPIC7xveJF5UhVbVc00UsGxPG3u', // Sostituisci <API_KEY_STRIPE> con la tua chiave API di Stripe
      },
    });

    // Verifica se la richiesta ha avuto successo e se è presente il link per il download del file PDF
    if (response.status === 200 && response.data && response.data.invoice_pdf) {
      // Effettua una nuova richiesta GET per scaricare il file PDF
      const invoicePdfResponse = await axios.get(response.data.invoice_pdf, {
        responseType: 'arraybuffer', // Specifica il tipo di risposta come array di byte
      });

      // Esegue il download del file PDF
      const link = document.createElement('a');
      link.href = window.URL.createObjectURL(new Blob([invoicePdfResponse.data], { type: 'application/pdf' }));
      link.download = `invoice_${invoiceId}.pdf`;
      link.click();
    } else {
      console.log('Impossibile trovare il link per il download del file PDF.');
    }
  } catch (error) {
    console.log('Errore durante il recupero della fattura da Stripe:', error.response.data.error);
  }
}

// Utilizzo della funzione per scaricare una fattura
const invoiceId = 'invoice_123'; // Sostituisci con l'ID della fattura desiderata
downloadInvoiceFromStripe(invoiceId);


