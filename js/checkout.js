const container = document.getElementById("containerCheckoutItemForm");

const loginBlock = `
    <form class="formCheckout">
    <div class="step1">
    <h2>Login</h2>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button class="formButton" id="goRegister" type="button">Not already a member?</button>
    <button class="formButton" type="submit">Login</button>
    </div>
    </form>  
`;


const RegisterBlock = `
    <form class="formCheckout">
        <div class="step2">
            <h2>Register</h2>
            <div class="form-group">
                <label for="age">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Surname:</label>
                <input type="text" id="surname" name="surname" required>
            </div>                    
            <div class="form-group">
                <label for="age">Tax Registration Number (TRN):</label>
                <input type="text" id="trn" name="trn" required>
            </div>
            <div class="form-group">
                <label for="age">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>            
            <div class="form-group">
                <label for="age">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>         
            <button class="formButton" type="button">Continue</button>
        </div>
    </form>  
`;


// inserisco il blocco HTML nell'elemento del DOM come figlio
container.insertAdjacentHTML('beforeend', loginBlock);


const goRegister = document.getElementById("goRegister");
goRegister.addEventListener("click", function() {
    container.insertAdjacentHTML('beforeend', RegisterBlock);
    document.querySelector(".step1").style.display = "none";
    document.querySelector(".step2").style.display = "block";
});

