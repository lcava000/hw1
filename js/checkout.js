const container = document.getElementById("containerCheckoutItemForm");

const loginBlock = `
<div class="step1">
    <form class="formCheckout" action="./checkout.php" method="POST" id="login_form">
    <input hidden name="action" value="login_form">
        <h2>Login</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="log_email" name="log_email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="log_password" name="log_password" required>
        </div>
        <button class="formButton" id="goRegister" type="button">Not already a member?</button>
        <button class="formButton" id="goLoginSubmit" type="button">Login</button>

        <?php echo $error_description;?>
    </form>  
</div>
`;


const RegisterBlock = `
<div class="step2">
    <form class="formCheckout" action="./checkout.php" method="POST" id="register_form">
    <input hidden name="action" value="register_form">
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
                <label for="age">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="age">Confirm Password:</label>
                <input type="password" id="password_confirm" name="password_confirm" required>
            </div> 
            <button class="formButton" id="goLogin" type="button">Are you already member?</button>
            <button class="formButton" type="button">Register Now</button>

            <?php echo $error_description;?>
    </form> 
</div> 
`;


container.insertAdjacentHTML('beforeend', loginBlock);
container.insertAdjacentHTML('beforeend', RegisterBlock);
document.querySelector(".step2").style.display = "none";

const goRegister = document.getElementById("goRegister");
goRegister.addEventListener("click", function() {
    document.querySelector(".step1").style.display = "none";
    document.querySelector(".step2").style.display = "block";
});

const goLogin = document.getElementById("goLogin");
goLogin.addEventListener("click", function() {
    document.querySelector(".step1").style.display = "block";
    document.querySelector(".step2").style.display = "none";
});



function validatePassword(password) {
    if (password.length > 8 && /\d/.test(password) && /[A-Z]/.test(password)) {
      return true;
    } else {
      return false;
    }
}
  

/*  -----------------------------------------------------------------------------------------------
----------------------------  CHECKOUT LOGIN FORM VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */

const login_form = document.getElementById("login_form");
const goLoginSubmit = document.getElementById("goLoginSubmit");

goLoginSubmit.addEventListener("click", function(event) {
    event.preventDefault();
    const email = document.getElementById("log_email");
    const password = document.getElementById("log_password");

    // Check if email is valid
    if (!email.checkValidity()) {
        Swal.fire(
            'Error!',
            'Please enter a valid email address!',
            'error'
        );
        return;
    }

    if (!(password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password))) {
        Swal.fire(
            'Errore!',
            'Inserisci una password valida! (8 caratteri, 1 maiuscola, 1 numero)',
            'error'
        );
        return;
    }

    // If all fields are valid, submit the form
    login_form.submit();
});

/*  -----------------------------------------------------------------------------------------------
----------------------------  CHECKOUT REGISTER FORM VALIDATION  ----------------------------------
--------------------------------------------------------------------------------------------------- */
