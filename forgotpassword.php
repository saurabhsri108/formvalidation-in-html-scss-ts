<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/style.css">
        <script src="https://kit.fontawesome.com/2317c2b3ca.js" crossorigin="anonymous"></script>
        <title>Login & Registration Form Validation</title>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <form action="<?php echo "javascript(void)"; ?>" id="forgotPasswordForm" method="post">
                    <h1 class="card-heading">Forgot Password</h1>
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
                    <div class="form-submit mt-2 rfs-0">
                        <input type="submit" name="forgotpassword" value="Submit" class="btn
						btn-registration">
                    </div>
                </form>
            </div>
        </div>
        <script src="./js/forgotpassword.js"></script>
    </body>
</html>