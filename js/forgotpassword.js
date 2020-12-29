var Forgotpassword = /** @class */ (function () {
    function Forgotpassword() {
        this.errors = [];
    }
    Forgotpassword.prototype.validateEmail = function (email) {
        this.email = email;
        this.errors = [];
        var regExEmail = new RegExp('^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$');
        if (!regExEmail.test(this.email)) {
            this.errors['email_invalid'] = 'Please enter a valid email';
        }
        return this.errors;
    };
    Forgotpassword.prototype.checkEmail = function (emailInput) {
        return true;
    };
    return Forgotpassword;
}());
var forgotpassword = new Forgotpassword();
var errors = [];
var email = document.querySelector('#email');
var emailInput;
email.addEventListener('focusout', function (e) {
    e.preventDefault();
    emailInput = e.target.value;
    if (forgotpassword.validateEmail(emailInput)) {
        errors = forgotpassword.validateEmail(emailInput);
        if (errors['email_invalid'] !== undefined) {
            document.querySelector('.error_email_invalid').innerHTML = errors['email_invalid'];
        }
        else {
            errors['email_invalid'] = '';
            document.querySelector('.error_email_invalid').innerHTML = errors['email_invalid'];
        }
        if (errors['email_invalid'] === '') {
            if (forgotpassword.checkEmail(emailInput)) {
                document.querySelector('.success_email_valid').innerHTML = 'Email is valid';
            }
            else {
                document.querySelector('.success_email_valid').innerHTML = '';
            }
        }
    }
});
