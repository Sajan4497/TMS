<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            .container {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .container h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-weight: bold;
            }

            .form-group input[type="email"],
            .form-group input[type="password"] {
                width: calc(100% - 20px);
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .error-message {
                color: red;
                font-size: 12px;
                margin-top: 5px;
                display: block;
            }

            .form-group input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                border: none;
                border-radius: 4px;
                color: #fff;
                font-size: 16px;
                cursor: pointer;
            }

            .form-group input[type="submit"]:hover {
                background-color: #0056b3;
            }

            .register-link {
                text-align: center;
                margin-top: 10px;
            }

            .register-link a {
                color: #007bff;
                text-decoration: none;
            }

            .register-link a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Login Form</h2>
            <form action="login2.php" method="post" id="loginForm">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <span class="error-message email_error"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <span class="error-message password_error"></span>
                </div>
                <div class="form-group">
                    <input type="submit" id="btnsubmit" name="btnsubmit" value="Login">
                </div>
                <span class="success_msg" style="color:green"></span>
                <span class="error_msg" style="color:red"></span>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#loginForm').submit(function(e) {
                    e.preventDefault();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    if (email == '') {
                        $('.email_error').text('Email is required');
                        return;
                    } else if (!email.match(/^\w+([-.']?[\w]+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/)) {
                        $('.email_error').text('Invalid email format');
                        return;
                    } else {
                        $('.email_error').text('');
                    }
                    if (password == '') {
                        $('.password_error').text('Password is required');
                        return;
                    } else {
                        $('.password_error').text('');
                    }
                    $.ajax({
                        type: 'POST',
                        url: 'Login2.php',
                        data: {
                            email: email,
                            password: password
                        },
                        success: function(response) {
                            console.log(response);
                            var data = JSON.parse(response);
                            console.log(data);
                            if (data.status == "error") {
                                $('.error_msg').text(data.msg);
                            } else {

                                swal("Success", data.msg, "success").then(function() {

                                    //console.log("test");
                                    // Redirect based on user type
                                    if (data.msg == "Admin Login Successful!") {
                            window.location.href = "/managementsystem/Admin-Dashboard.php";
                        } else if (data.msg == 'Customer Login Successful!') {
                            window.location.href = "/managementsystem/Customer-Dashboard.php";
                        }
                                });
                            }
                        }
                    });
                });
            });
        </script>
