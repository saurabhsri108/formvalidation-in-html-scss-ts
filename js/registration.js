var Registration = /** @class */ (function () {
    function Registration() {
        this.errors = [];
    }
    Registration.prototype.validateUsername = function (username) {
        this.username = username;
        this.errors = [];
        var regExUsername = new RegExp('^[a-z0-9]+$');
        if (this.username.length <= 6) {
            this.errors['username_length'] = 'Username must be greater than 6 character long';
        }
        else if (!regExUsername.test(this.username)) {
            this.errors['username_invalid'] = 'Username can only contain lowercase alphabets or numbers';
        }
        return this.errors;
    };
    Registration.prototype.validateFirstname = function (firstname) {
        this.firstname = firstname;
        this.errors = [];
        var regExFirstname = new RegExp('^[a-zA-Z]+$');
        if (this.firstname.length <= 0) {
            this.errors['firstname_length'] = 'Firstname should not be empty';
        }
        else if (!regExFirstname.test(this.firstname)) {
            this.errors['firstname_invalid'] = 'Firstname can only contain alphabets';
        }
        return this.errors;
    };
    Registration.prototype.validateLastname = function (lastname) {
        this.lastname = lastname;
        this.errors = [];
        var regExLastname = new RegExp('^[a-zA-Z]+$');
        if (this.lastname.length <= 0) {
            this.errors['lastname_length'] = 'Lastname should not be empty';
        }
        else if (!regExLastname.test(this.lastname)) {
            this.errors['lastname_invalid'] = 'Lastname can only contain alphabets';
        }
        return this.errors;
    };
    Registration.prototype.validateEmail = function (email) {
        this.email = email;
        this.errors = [];
        var regExEmail = new RegExp('^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$');
        if (!regExEmail.test(this.email)) {
            this.errors['email_invalid'] = 'Please enter a valid email';
        }
        return this.errors;
    };
    Registration.prototype.validatePassword = function (password) {
        this.password = password;
        this.errors = [];
        var regExPassword = new RegExp('^(?:(?=.*?[A-Z])(?:(?=.*?[0-9])(?=.*?[-!@#$%^&*()_[\\]{},:;.<>+=])|(?=.*?[a-z])(?:(?=.*?[0-9])|(?=.*?[-!@#$%^&*()_[\\]{},:;.<>+=])))|(?=.*?[a-z])(?=.*?[0-9])(?=.*?[-!@#$%^&*()_[\\]{},:;.<>+=]))[A-Za-z0-9!@#$%^&*()_[\\]{},:;.<>+=-]{7,50}$');
        if (!regExPassword.test(this.password)) {
            this.errors['password_invalid'] = 'Password must contain minimum 8 & maximum 50 characters, an uppercase letter, a lowercase letter, a digit, & a non-alphanumeric character [!@#$%^&*()_[]{},.<>+=-]';
        }
        return this.errors;
    };
    Registration.prototype.validateConfirmPassword = function (confirm_password) {
        this.confirmPassword = confirm_password;
        this.errors = [];
        if (this.confirmPassword !== this.password) {
            this.errors['confirm_password_invalid'] = 'Passwords don\'t match';
        }
        return this.errors;
    };
    Registration.prototype.checkUsername = function (usernameInput) {
        return true;
    };
    Registration.prototype.checkEmail = function (emailInput) {
        return true;
    };
    return Registration;
}());
var register = new Registration();
var errors = [];
var username = document.querySelector('#username');
var usernameInput;
username.addEventListener('focusout', function (e) {
    usernameInput = e.target.value;
    if (register.validateUsername(usernameInput)) {
        errors = register.validateUsername(usernameInput);
        if (errors['username_length'] !== undefined) {
            document.querySelector('.error_username_length').innerHTML = errors['username_length'];
        }
        else {
            errors['username_length'] = '';
            document.querySelector('.error_username_length').innerHTML = errors['username_length'];
        }
        if (errors['username_invalid'] !== undefined) {
            document.querySelector('.error_username_invalid').innerHTML = errors['username_invalid'];
        }
        else {
            errors['username_invalid'] = '';
            document.querySelector('.error_username_invalid').innerHTML = errors['username_invalid'];
        }
        if (errors['username_length'] === '' && errors['username_invalid'] === '') {
            if (register.checkUsername(usernameInput)) {
                document.querySelector('.success_username_valid').innerHTML = 'Username is valid';
            }
        }
        else {
            document.querySelector('.success_username_valid').innerHTML = '';
        }
    }
});
var firstname = document.querySelector('#firstname');
var firstnameInput;
firstname.addEventListener('focusout', function (e) {
    firstnameInput = e.target.value;
    if (register.validateFirstname(firstnameInput)) {
        errors = register.validateFirstname(firstnameInput);
        if (errors['firstname_length'] !== undefined) {
            document.querySelector('.error_firstname_length').innerHTML = errors['firstname_length'];
        }
        else {
            errors['firstname_length'] = '';
            document.querySelector('.error_firstname_length').innerHTML = errors['firstname_length'];
        }
        if (errors['firstname_invalid'] !== undefined) {
            document.querySelector('.error_firstname_invalid').innerHTML = errors['firstname_invalid'];
        }
        else {
            errors['firstname_invalid'] = '';
            document.querySelector('.error_firstname_invalid').innerHTML = errors['firstname_invalid'];
        }
        if (errors['firstname_length'] === '' && errors['firstname_invalid'] ===
            '') {
            document.querySelector('.success_firstname_valid').innerHTML = 'Firstname is valid';
        }
        else {
            document.querySelector('.success_firstname_valid').innerHTML = '';
        }
    }
});
var lastname = document.querySelector('#lastname');
var lastnameInput;
lastname.addEventListener('focusout', function (e) {
    lastnameInput = e.target.value;
    if (register.validateLastname(lastnameInput)) {
        errors = register.validateLastname(lastnameInput);
        if (errors['lastname_length'] !== undefined) {
            document.querySelector('.error_lastname_length').innerHTML = errors['lastname_length'];
        }
        else {
            errors['lastname_length'] = '';
            document.querySelector('.error_lastname_length').innerHTML = errors['lastname_length'];
        }
        if (errors['lastname_invalid'] !== undefined) {
            document.querySelector('.error_lastname_invalid').innerHTML = errors['lastname_invalid'];
        }
        else {
            errors['lastname_invalid'] = '';
            document.querySelector('.error_lastname_invalid').innerHTML = errors['lastname_invalid'];
        }
        if (errors['lastname_length'] === '' && errors['lastname_invalid'] === '') {
            document.querySelector('.success_lastname_valid').innerHTML = 'Lastname is valid';
        }
        else {
            document.querySelector('.success_lastname_valid').innerHTML = '';
        }
    }
});
var email = document.querySelector('#email');
var emailInput;
email.addEventListener('focusout', function (e) {
    emailInput = e.target.value;
    if (register.validateEmail(emailInput)) {
        errors = register.validateEmail(emailInput);
        if (errors['email_invalid'] !== undefined) {
            document.querySelector('.error_email_invalid').innerHTML = errors['email_invalid'];
        }
        else {
            errors['email_invalid'] = '';
            document.querySelector('.error_email_invalid').innerHTML = errors['email_invalid'];
        }
        if (errors['email_invalid'] === '') {
            if (register.checkEmail(emailInput)) {
                document.querySelector('.success_email_valid').innerHTML = 'Email is valid';
            }
            else {
                document.querySelector('.success_email_valid').innerHTML = '';
            }
        }
    }
});
var password = document.querySelector('#password');
var passwordInput;
password.addEventListener('focusout', function (e) {
    passwordInput = e.target.value;
    if (register.validatePassword(passwordInput)) {
        errors = register.validatePassword(passwordInput);
        if (errors['password_invalid'] !== undefined) {
            document.querySelector('.error_password_invalid').innerHTML = errors['password_invalid'];
        }
        else {
            errors['password_invalid'] = '';
            document.querySelector('.error_password_invalid').innerHTML = errors['password_invalid'];
        }
        if (errors['password_invalid'] === '') {
            document.querySelector('.success_password_valid').innerHTML = 'Password is valid';
        }
        else {
            document.querySelector('.success_password_valid').innerHTML = '';
        }
    }
});
var confirmpassword = document.querySelector('#confirm-password');
var confirmpasswordInput;
confirmpassword.addEventListener('focusout', function (e) {
    confirmpasswordInput = e.target.value;
    if (register.validateConfirmPassword(confirmpasswordInput)) {
        errors = register.validateConfirmPassword(confirmpasswordInput);
        if (errors['confirm_password_invalid'] !== undefined) {
            document.querySelector('.error_confirm_password_invalid').innerHTML = errors['confirm_password_invalid'];
        }
        else {
            errors['confirm_password_invalid'] = '';
            document.querySelector('.error_confirm_password_invalid').innerHTML = errors['confirm_password_invalid'];
        }
        if (errors['confirm_password_invalid'] === '') {
            document.querySelector('.success_confirm_password_valid').innerHTML = 'Password match';
        }
        else {
            document.querySelector('.success_confirm_password_valid').innerHTML = '';
        }
    }
});
