/*  -----------------------------------------------------------------------------------------------
----------------------------  REGEX VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */
function isValidEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(String(email).toLowerCase());
}
function isStrongPassword(password) {
    const hasUppercase = /[A-Z]/.test(password); // Test for uppercase letters
    const hasNumber = /\d/.test(password); // Test for numbers
    const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password); // Test for special characters
    return hasUppercase && hasNumber && hasSpecialChar;
}
function isValidTRN(input) {
    const regex = /^\d{15}$/;
    return regex.test(input);
}

/*  -----------------------------------------------------------------------------------------------
---------------------------- LOGIN FUNCTION VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */
function LogCheckEmail() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    log_email.classList.remove("wrong");
    //check email
    const email = document.getElementById("log_email").value;
    if (!isValidEmail(email)) {
        log_email.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The email is not valid';
        show_error.classList.add("error_text");
        log_email.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}
function LogCheckPassword() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    log_password.classList.remove("wrong");
    //check password
    const password = document.getElementById("log_password").value;
    if (!isStrongPassword(password)) {
        log_password.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The password is not valid';
        show_error.classList.add("error_text");
        log_password.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}



/*  -----------------------------------------------------------------------------------------------
----------------------------  BLUR LOGIN FORM VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */
log_email.addEventListener("blur", LogCheckEmail);
log_password.addEventListener("blur", LogCheckPassword);

/*  -----------------------------------------------------------------------------------------------
----------------------------  CHECKOUT LOGIN FORM VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */
const login_form = document.getElementById("login_form");
const goLoginSubmit = document.getElementById("goLoginSubmit");

goLoginSubmit.addEventListener("click", function(event) {
    event.preventDefault();    
    //check if email or password are valid
    if(LogCheckEmail() && LogCheckPassword()) {
        login_form.submit();
    }
});
