<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="google-signin-client_id"
              content="284096022474-e0adkc8gaup09svoo2tvfsj2en561vgh.apps.googleusercontent.com">
        <link rel="stylesheet" href="./css/style.css">
        <script src="https://kit.fontawesome.com/2317c2b3ca.js" crossorigin="anonymous"></script>
        <title>Login Form Validation</title>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <form action="<?php echo "javascript(void)"; ?>" id="loginForm" method="post">
					<?php if ( isset( $_SESSION['registration_success'] ) ): ?>
                        <p class="text-danger text-center my-2"><?php echo $_SESSION['registration_success']; ?></p>
					<?php endif; ?>
                    <h1 class="card-heading">Login</h1>
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
                        <input type="checkbox" name="remember_me" id="remember-me" class="form-control-checkbox"
                               checked>
                        <label for="remember-me" class="label-checkbox">Remember Me</label>
                    </div>
                    <div class="form-submit">
                        <input type="submit" name="login" value="Login" class="btn btn-login">
                    </div>

                    <!--					<div class="social-login">-->
                    <!--						<a href="#" class="s-login"><i class="fab fa-facebook-square"></i> Login with-->
                    <!--							Facebook</a>-->
                    <!--						<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                    <!--					</div>-->

                    <div class="lost-password">
                        <a href="./forgotpassword.php" class="lostpassword">Lost Password?</a>
                    </div>

                    <div class="login">
                        Don't have an account? <a href="./registration.php" class="newregister">Register Now</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="./js/login.js"></script>
    </body>
</html>