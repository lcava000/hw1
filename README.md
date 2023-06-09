<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="">
    <img src="https://i.ibb.co/1XCD2mw/black.png alt="logo" width="160" height="160">
  </a>

  <h3 align="center">Emaar Properties, a website for booking luxury hotel rooms for educational purposes.</h3>

  <p align="center">
    I wanted to create a website for the page of a luxury hotel in Dubai.
    <br />
    <strong>Cavallaro Lorenzo</strong>
    <br />
    <strong>1000014542</strong>
    <br />
    <br />
    <a href="https://codepro.it/hw1/">View Demo Page</a>
    ·
    <a href="">Report Bug</a>
    ·
    <a href="">Request Feature</a>
  </p>
</div>

<!-- ABOUT THE PROJECT -->
## About The Project

![home-screenshot]


Within the homepage, various rooms and types of the hotel are featured, along with different types of services.

What is possible to do?
* Choose a particular room type and make a reservation through the checkout process and payment via Stripe API (Attention! Set your own STRIPE API within the files)
* Manage within your customer area your reservations, and download payment invoices
* Open a ticket to manage reservations or write a message to the hotel (Under construction)

Certainly! This is a university project and before it can be used for real, you need to carry out some security checks, or add new payment methods. But it's a good starting point!

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- PAYMENT API -->
## Payment API Section

In case you want to try payments you can enter your STRIPE test APIs and enter the test credit card with these data to try a successful payment:

*  PAN: 4242 4242 4242 4242 
*  EXPIRE: 04/24
*  CVV: 242
*  CAP: 22222

![payment-screenshot]


<!-- INVOICE GENERATOR API -->
## Invoice Generator Section

a PDF electronic invoice generation system has been integrated that saves the files on an external server (this is because problems with permissions have been detected, in the future it will be managed locally)

![invoice-screenshot]

<!-- ROADMAP -->
## Roadmap

- [x] Stripe API Payment System
- [x] Invoice API  
- [ ] Implement advanced checkout session control and security mechanisms such as a checkout session id that expires after a certain amount of time
- [ ] Multi-language Support
    - [ ] Italian
    - [ ] Spanish

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
[home-screenshot]: ./asset/screenshot/screenshot1.png
[payment-screenshot]: ./asset/screenshot/screenshot2.png
[invoice-screenshot]: ./asset/screenshot/screenshot3.png
