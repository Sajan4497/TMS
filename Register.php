<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Form</title> 
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans|Nova+Mono|Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<style>
    body {
        text-align: center;
        background-image: linear-gradient(135deg, #007991 30%, #78ffd6 90%);
    }
    .register-wrapper {
        position: relative;
        z-index: 3;
        padding: 100px;
        font-size: 18px;
        color: #999999;
    }
    .register-wrapper * {
        box-sizing: border-box;
    }
    .register-wrapper form input {
        display: inline-block;
        width: 100%;
        padding: 0 20px;
        line-height: 50px;
        height: 65px;
        background-color: white;
        border: 2px solid #e6e6e6;
        border-bottom-width: 3px;
        border-radius: 5px;
        outline: 0;
        transition: all 0.3s ease;
    }
    .register-wrapper form input:not(:last-child) {
        margin-bottom: 20px;
    }
    .register-wrapper form input[type="email"]:focus, 
    .register-wrapper form input[type="email"]:active, 
    .register-wrapper form input[type="password"]:focus, 
    .register-wrapper form input[type="password"]:active {
        border-color: #cccccc;
    }
    .register-wrapper form input[type="submit"] {
        position: relative;
        z-index: 1;
        display: inline-block;
        padding: 0 20px;
        font-size: 1rem;
        background-color: #f2395a;
        background-image: linear-gradient(45deg,
            rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%,
            rgba(0, 0, 0, 0) 50%,
            rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%,
            rgba(0, 0, 0, 0));
        background-size: 20px 20px, 100% 100%;
        border: 1px solid #f02146;
        border-bottom-width: 3px;
        color: white;
        outline: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .register-wrapper form input[type="submit"]:hover {
        background-size: 40px 40px;
    }
    .register-title {
        font-size: 1.5em;
        padding-bottom: 30px;
        margin: 0 0 20px;
        border-bottom: 1px dashed #e6e6e6;
    }
    .register-block {
        position: relative;
        display: block;
        width: 100%;
        max-width: 300px;
        margin: auto;
        padding: 30px;
        background-color: white;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
    .register-block:before, 
    .register-block:after {
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: block;
        width: 100%;
        height: 100%;
        content: "";
        background-color: white;
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        transform: scale(0.9) translate(0, 0);
        transition: all 0.3s ease;
    }
    .register-block:hover:before {
        z-index: -1;
        transform: scale(0.96) translate(0, 16px);
    }
    .register-block:hover:after {
        z-index: -2;
        transform: scale(0.92) translate(0, 32px);
    }
    h1, a {
        font-family: 'Parisienne', cursive;
        color: #fff;
        font-size: 50px;
        text-decoration: none;
        text-shadow: 2px 2px 3px lightblue;
        padding-top: 35px;
    }
</style>
<body>
    <h1> Registration Form.</h1>
    <div class="content">
        <section>
            <div class="register-wrapper">
                <div class="register-block">
                    <h3 class="register-title">Create An Account</h3>
                    <form id="register" method="post" enctype="multipart/form-data" action="Signup.php">  
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
                        <span class='name_error' style="color:red"></span>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email">
                        <span class='email_error' style="color:red"></span>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                        <span class='password_error' style="color:red"></span>
                        <label for="phonenumber">Phone Number:</label>
                        <input type="tel" id="phonenumber" name="phonenumber">
                        <span class='phone_error' style="color:red"></span>
                        <label for="image">Upload image:</label>
                        <input type="file" id="image" name="image"><br>
                        <span class='image_error' style="color:red"></span>
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
                        <input type="submit" value="Submit" id="submit-btn"/>
                        <p><a href="Login.php"><h5>Login</h5></a></p>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <footer></footer>
    <script>
    $(document).ready(function () {
        // Event listeners to remove error messages on input
        $('#name').on('input', function() {
            $('.name_error').text('');
        });
        $('#email').on('input', function() {
            $('.email_error').text('');
        });
        $('#password').on('input', function() {
            $('.password_error').text('');
        });
        $('#phonenumber').on('input', function() {
            $('.phone_error').text('');
        });
        $('#image').on('input', function() {
            $('.image_error').text('');
        });

        $('#register').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $(".error").text('');

            var name = $('#name').val().trim();
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            var phone = $('#phonenumber').val().trim(); // Corrected variable name
            var file = $('#image')[0].files[0];

            var isValid = true;

            if (name === '') {
                $('.name_error').text('Name is required');
                isValid = false;
            }
            if (email === '') {
                $('.email_error').text('Email is required');
                isValid = false;
            } else if (!email.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)) {
                $('.email_error').text('Invalid email format');
                isValid = false;
            }
            if (password === '') {
                $('.password_error').text('Password is required');
                isValid = false;
            } else if (password.length < 8 || !password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
                $('.password_error').text('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
                isValid = false;
            }
            if (phone === '') { // Corrected variable name
                $('.phone_error').text('Phone number is required');
                isValid = false;
            }
            if (!file) {
                $('.image_error').text('Image is required');
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    type: 'POST',
                    url: 'Signup.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.status == "error") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.msg
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.msg,
                                showConfirmButton: false,
                               
                            }).then(function() {
                                window.location.href = "Login.php"; 
                            });
                        }
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
