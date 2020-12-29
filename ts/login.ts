class Login {
  private email: string;
  private password: string;
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

  validatePassword(password: string) {
    this.password = password;
    this.errors = [];
    const regExPassword: RegExp = new RegExp(
        '^(?:(?=.*?[A-Z])(?:(?=.*?[0-9])(?=.*?[-!@#$%^&*()_[\\]{},:;.<>+=])|(?=.*?[a-z])(?:(?=.*?[0-9])|(?=.*?[-!@#$%^&*()_[\\]{},:;.<>+=])))|(?=.*?[a-z])(?=.*?[0-9])(?=.*?[-!@#$%^&*()_[\\]{},:;.<>+=]))[A-Za-z0-9!@#$%^&*()_[\\]{},:;.<>+=-]{7,50}$');

    if (!regExPassword.test(this.password)) {
      this.errors['password_invalid'] = 'Password must contain minimum 8 & maximum 50 characters, an uppercase letter, a lowercase letter, a digit, & a non-alphanumeric character [!@#$%^&*()_[]{},.<>+=-]';
    }

    return this.errors;
  }

  checkEmail(emailInput: string) {
    return true;
  }
}

const login: Login = new Login();
let errors = [];

const email = document.querySelector('#email');
let emailInput: string;
email.addEventListener('focusout', (e: KeyboardEvent) => {
  emailInput = (<HTMLInputElement>e.target).value;

  if (login.validateEmail(emailInput)) {
    errors = login.validateEmail(emailInput);

    if (errors['email_invalid'] !== undefined) {
      document.querySelector(
          '.error_email_invalid').innerHTML = errors['email_invalid'];
    } else {
      errors['email_invalid'] = '';
      document.querySelector(
          '.error_email_invalid').innerHTML = errors['email_invalid'];
    }

    if (errors['email_invalid'] === '') {
      if (login.checkEmail(emailInput)) {
        document.querySelector(
            '.success_email_valid').innerHTML = 'Email is valid';
      } else {
        document.querySelector(
            '.success_email_valid').innerHTML = '';
      }
    }
  }
});

const password = document.querySelector('#password');
let passwordInput: string;
password.addEventListener('focusout', (e: KeyboardEvent) => {
  passwordInput = (<HTMLInputElement>e.target).value;

  if (login.validatePassword(passwordInput)) {
    errors = login.validatePassword(passwordInput);

    if (errors['password_invalid'] !== undefined) {
      document.querySelector(
          '.error_password_invalid').innerHTML = errors['password_invalid'];
    } else {
      errors['password_invalid'] = '';
      document.querySelector(
          '.error_password_invalid').innerHTML = errors['password_invalid'];
    }

    if (errors['password_invalid'] === '') {
      document.querySelector(
          '.success_password_valid').innerHTML = 'Password is valid';
    } else {
      document.querySelector(
          '.success_password_valid').innerHTML = '';
    }
  }
});

// function onSignIn(googleUser) {
//   let profile = googleUser.getBasicProfile();
//   userID = profile.getId();
//   userPic = profile.getImageUrl();
//   userEmail = profile.getEmail();
//   userFirstname = profile.getGivenName();
//   userLastname = profile.getFamilyName();
//
//   const data = {
//     'id': userID,
//     'email': userEmail,
//     'firstname': userFirstname,
//     'lastname': userLastname,
//     'image': userPic,
//   };
//
//   console.log(data);
// }