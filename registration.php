<?php

	require_once 'user_validation.php';

	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
		$register = new user_validation( $_POST );

		if ( $register ) {
			$_SESSION['registration_success'] = 'You are successfully registered to our website. Please Login!';
			header( 'location:http://localhost/formvalidation/login.php' );
		}
	}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/style.css">
        <script src="https://kit.fontawesome.com/2317c2b3ca.js" crossorigin="anonymous"></script>
        <title>Registration Form Validation</title>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <form action="" id="registrationForm" method="post">
                    <h1 class="card-heading">Register</h1>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control"
                               autocomplete="new-password"
                               required/>
                        <label for="username" class="label">
                            <span class="content">Username</span>
                        </label>
                    </div>
                    <div class="btm-space">
                        <div class="error error_username_length"></div>
                        <div class="error error_username_invalid"></div>
                        <div class="success success_username_valid"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="firstname" id="firstname" class="form-control"
                               autocomplete="new-password"
                               required/>
                        <label for="firstname" class="label">
                            <span class="content">Firstname</span>
                        </label>
                    </div>
                    <div class="btm-space">
                        <div class="error error_firstname_length"></div>
                        <div class="error error_firstname_invalid"></div>
                        <div class="success success_firstname_valid"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" id="lastname" class="form-control"
                               autocomplete="new-password"
                               required/>
                        <label for="lastname" class="label">
                            <span class="content">Lastname</span>
                        </label>
                    </div>
                    <div class="btm-space">
                        <div class="error error_lastname_length"></div>
                        <div class="error error_lastname_invalid"></div>
                        <div class="success success_lastname_valid"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" autocomplete="new-password"
                               required/>
                        <label for="email" class="label">
                            <span class="content">Email</span>
                        </label>
                    </div>
                    <div class="btm-space">
                        <div class="error error_email_invalid"></div>
                        <div class="success success_email_valid"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"
                               autocomplete="new-password"
                               required/>
                        <label for="password" class="label">
                            <span class="content">Password</span>
                        </label>
                    </div>
                    <div class="btm-space">
                        <div class="error error_password_invalid"></div>
                        <div class="success success_password_valid"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm-password" class="form-control"
                               autocomplete="new-password"
                               required/>
                        <label for="confirm-password" class="label">
                            <span class="content">Confirm Password</span>
                        </label>
                    </div>
                    <div class="btm-space">
                        <div class="error error_confirm_password_invalid"></div>
                        <div class="success success_confirm_password_valid"></div>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="role" value="role_one" id="role-seller" class="form-control-checkbox">
                        <label for="role-seller" class="label-checkbox">Register as Role One</label> <br/>
                        <input type="radio" name="role" value="role_two"
                               id="role-buyer" class="form-control-checkbox" checked>
                        <label for="role-buyer" class="label-checkbox">Register as Role Two</label>
                    </div>
                    <div class="form-submit mt-2">
                        <input type="submit" name="register" value="Register" class="btn btn-registration">
                    </div>
                    <div class="register">
                        Already have an account? <a href="./login.php" class="newregister">Login Here</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="./js/registration.js"></script>
    </body>
</html>