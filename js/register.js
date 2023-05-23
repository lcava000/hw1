
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
---------------------------- REGISTER FUNCTION VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */
function RegCheckName() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    reg_name.classList.remove("wrong");
    //check name
    const name = document.getElementById("reg_name").value;
    if (name.length < 2) {
        reg_name.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The name is not valid';
        show_error.classList.add("error_text");
        reg_name.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}
function RegCheckSurname() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    reg_surname.classList.remove("wrong");
    //check surname
    const surname = document.getElementById("reg_surname").value;
    if (surname.length < 2) {
        reg_surname.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The surname is not valid';
        show_error.classList.add("error_text");
        reg_surname.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}
function RegCheckTRN() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    reg_trn.classList.remove("wrong");
    //check trn
    const trn = document.getElementById("reg_trn").value;
    if (!isValidTRN(trn)) {
        reg_trn.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The TRN is not valid';
        show_error.classList.add("error_text");
        reg_trn.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}
function RegCheckEmail() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    reg_email.classList.remove("wrong");
    //check email
    const email = document.getElementById("reg_email").value;
    if (!isValidEmail(email)) {
        reg_email.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The email is not valid';
        show_error.classList.add("error_text");
        reg_email.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}
function RegCheckPassword() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    reg_password.classList.remove("wrong");
    //check password
    const password = document.getElementById("reg_password").value;
    if (!isStrongPassword(password)) {
        reg_password.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The password is not valid';
        show_error.classList.add("error_text");
        reg_password.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}
function RegCheckConfirmPassword() {
    //remove error text if exists
    const error_text = document.querySelector(".error_text");
    if (error_text) {
        error_text.remove();
    }
    //remove wrong class if exists
    reg_password_confirm.classList.remove("wrong");
    //check confirm password
    const password = document.getElementById("reg_password").value;
    const confirm_password = document.getElementById("reg_password_confirm").value;
    if (password != confirm_password) {
        reg_password_confirm.classList.add("wrong");
        let show_error = document.createElement('p');
        show_error.textContent = 'The passwords do not match';
        show_error.classList.add("error_text");
        reg_password_confirm.insertAdjacentElement('afterend', show_error);
        return false;
    }
    return true;
}

/*  ----------------------------------------------------------------------------------------------
----------------------------  BLUR REGISTER FORM VALIDATION  -------------------------------------
--------------------------------------------------------------------------------------------------- */
reg_name.addEventListener("blur", RegCheckName);
reg_surname.addEventListener("blur", RegCheckSurname);
reg_trn.addEventListener("blur", RegCheckTRN);
reg_email.addEventListener("blur", RegCheckEmail);
reg_password.addEventListener("blur", RegCheckPassword);
reg_password_confirm.addEventListener("blur", RegCheckConfirmPassword);


/*  -----------------------------------------------------------------------------------------------
----------------------------  CHECKOUT REGISTER FORM VALIDATION  ----------------------------------
--------------------------------------------------------------------------------------------------- */

const register_form = document.getElementById("register_form");
const goRegisterSubmit = document.getElementById("goRegisterSubmit");

goRegisterSubmit.addEventListener("click", function(event) {
    event.preventDefault();    
    //check if all fields are valid
    if(RegCheckName() && RegCheckSurname() && RegCheckTRN() && RegCheckEmail() && RegCheckPassword() && RegCheckConfirmPassword()) {
        register_form.submit();
    }
});


