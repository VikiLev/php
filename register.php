<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- register form -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p id="msg" class="msg" style="display:none">message</p>
            <form id="form_register">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" name="lastname" placeholder="Enter your lastname">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <label>Confirm the password</label>
                    <input type="password" name="password_confirm" placeholder="Enter your password">
                </div>
                <button type="submit" class="register-btn">Register</button>
                <p>
                    Do you have an account? - <a href="/">login</a>!
                </p>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
