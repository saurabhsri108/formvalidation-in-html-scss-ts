class Forgotpassword {
  private email: string;
  private errors = [];

  validateEmail(email: string) {
    this.email = email;
    this.errors = [];
    const regExEmail: RegExp = new RegExp(
        '^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$');

    if (!regExEmail.test(this.email)) {
      this.errors['email_invalid'] = 'Please enter a valid email';
    }

    return this.errors;
  }

  checkEmail(emailInput: string) {
    return true;
  }
}

const forgotpassword: Forgotpassword = new Forgotpassword();
let errors: object = [];

const email = document.querySelector('#email');
let emailInput: string;
email.addEventListener('focusout', (e: KeyboardEvent) => {
  e.preventDefault();
  emailInput = (<HTMLInputElement>e.target).value;
  if (forgotpassword.validateEmail(emailInput)) {
    errors = forgotpassword.validateEmail(emailInput);

    if (errors['email_invalid'] !== undefined) {
      document.querySelector(
          '.error_email_invalid').innerHTML = errors['email_invalid'];
    } else {
      errors['email_invalid'] = '';
      document.querySelector(
          '.error_email_invalid').innerHTML = errors['email_invalid'];
    }

    if (errors['email_invalid'] === '') {
      if (forgotpassword.checkEmail(emailInput)) {
        document.querySelector(
            '.success_email_valid').innerHTML = 'Email is valid';
      } else {
        document.querySelector(
            '.success_email_valid').innerHTML = '';
      }
    }
  }
});