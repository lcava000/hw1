/**************************************************
                 GET ID / PAGES
**************************************************/
const urlSearchParams = new URLSearchParams(window.location.search);

const id_url = urlSearchParams.get("id");
const checkin_url = urlSearchParams.get("checkin");
const checkout_url = urlSearchParams.get("checkout");

/**************************************************
                QUERY SELECTORS
**************************************************/
const bed_space = document.querySelector('#bed_space');
const price_per_night = document.querySelector('#price_per_night');
const checkin = document.querySelector('#checkin');
const checkout = document.querySelector('#checkout');
const total_night = document.querySelector('#total_night');
const total_price = document.querySelector('#total_price');

/**************************************************
                    VARIABLES
**************************************************/
price_per_night.value = '1200.00';
total_night.value = '5';
const bed_space_input = 6;

/**************************************************
                    MAIN
**************************************************/
for (let i = 0; i < bed_space_input; i++) {
    const bed_icon = document.createElement("i");
    bed_icon.classList.add("fa-solid", "fa-person");
    bed_space.appendChild(bed_icon);
}

price_per_night.innerHTML = price_per_night.value + ' AED';
checkin.innerHTML = checkin_url;
checkout.innerHTML = checkout_url;
total_night.innerHTML = total_night.value;
total_price.innerHTML = price_per_night.value * total_night.value + ' AED';









