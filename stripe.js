const stripe = Stripe('pk_test_51HkPqZKomNJ2WTb0Ly417EGfPfwaS4UaSdFhWnl3CfkLFzO5qMkXPXnmYqmiTNyDlIXtCRMSPIC7xveJF5UhVbVc00UsGxPG3u');

const elements = stripe.elements();
const cardElement = elements.create('card');
cardElement.mount('#card-element');

const form = document.getElementById('payment-form');
form.addEventListener('submit', handleSubmit);
  

async function handleSubmit(event) {
    form.removeEventListener('submit', handleSubmit);
    event.preventDefault();
    const { token, error } = await stripe.createToken(cardElement);
  
    if (error) {
      console.log('Error:', error);
      PrePaymentCheck(error.code);
      form.addEventListener('submit', handleSubmit);
    } else {
      stripeTokenHandler(token);
    }
  }
  
function stripeTokenHandler(token) {
    const formData = new FormData();
    formData.append('stripeToken', token.id);

    formData.append('amount', '1234560');
    formData.append('currency', 'AED');
    formData.append('description', 'Test Payment');
  
    fetch('charge.php', {
      method: 'POST',
      body: formData
    })
    .then((response) => response.json())
    .then((result) => {
    if (result.error) {
        console.log('Payment Error:', result.error);
        Swal.fire(
            'Payment Error!',
            'Your card was declined!',
            'error'
        )
    } else {
        console.log('Payment Success:', result);
        Swal.fire(
            'Payment Complete!',
            'Payment successfully processed!',
            'success',
        )
        //redirect to success page
    }
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}


function PrePaymentCheck(error){
    if(error == "incomplete_number"){
        Swal.fire(
            'Error!',
            'The card number is incomplete. Please check it!',
            'error'
        )
    }
    if(error == "invalid_number"){
        Swal.fire(
            'Error!',
            'The credit card code you entered is incorrect!',
            'error'
        )
    }
    if(error == "incomplete_zip"){
        Swal.fire(
            'Error!',
            'The zip code you entered is incomplete!',
            'error'
        )
    }
    if(error == "incomplete_expiry"){
        Swal.fire(
            'Error!',
            'The expire you entered is incomplete!',
            'error'
        )
    }
    if(error == "incomplete_cvc"){
        Swal.fire(
            'Error!',
            'The CVV you entered is incomplete!',
            'error'
        )
    }
}

  

