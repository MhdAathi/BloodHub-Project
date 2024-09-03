<?php
session_start();
// check if user is already logged in and redirect to index page if true
if (isset($_SESSION['auth'])) {
    if (!isset($_SESSION['auth'])) {
        $_SESSION['message'] = "You are Already Logged in";
    }
    header("Location: index.php");
    exit(0);
}
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap");

    body {
        background: #f1fbff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        position: relative;
    }

    .login-card {
        width: 100%;
        max-width: 400px;
        background: #ffffff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        padding: 20px;
    }

    .card-header {
        text-transform: uppercase;
        font-weight: 700%;
        letter-spacing: 1px;
        text-align: center;
        margin-bottom: 20px;
        color: #106eea;
    }

    .card-header h4 {
        margin: 0;
        font-size: 1.5rem;
    }

    .card-body {
        padding: 20px;
    }

    .form-group label {
        font-weight: bold;
        font-size: 16px;
        color: #333;
    }

    .form-group input {
        font-size: 16px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-top: 5px;
        width: 100%;
    }

    .btn-block {
        display: block;
        margin: 0 auto;
        font-size: 13px;
        font-weight: 500;
        text-transform: uppercase;
        color: #fff;
        padding: 7px 14px;
        border-radius: 5px;
        text-decoration: none;
        width: 100%;
    }

    .btn-primary {
        background-color: #106eea;
        color: #ffffff;
        margin-bottom: 10px;
    }

    .btn-primary:hover {
        background: #0844a8;
    }

    .btn-google {
        background-color: #db4437;
        color: #ffffff;
        margin-bottom: 20px;
    }

    .btn-google:hover {
        background-color: #c23321;
    }

    .form-group a {
        text-decoration: none;
        font-size: 14px;
        color: #106eea;
        display: inline-block;
        margin-top: 10px;
    }

    .form-group a:hover {
        color: #0844a8;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('assets/images/login-bg.jpg') no-repeat center center/cover;
        z-index: -1;
        opacity: 0.7;
    }

    ::placeholder {
        color: #b0b0b0;
        font-weight: 300;
        font-style: italic;
        letter-spacing: 1px;
        opacity: 1;
        font-size: 16px;
    }

    input:focus::placeholder {
        color: #d0d0d0;
        opacity: 0.7;
        font-size: 15px;
    }

    @media only screen and (max-width: 767px) {
        .login-card {
            padding: 15px;
        }

        .card-header h4 {
            font-size: 1.25rem;
        }

        .form-group input {
            font-size: 14px;
        }

        .btn-block {
            font-size: 14px;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="card-header text-center">
            <h4>Login to <a class="navbar-brand" href="#"><span class="text-danger">Blood</span>Hub</a></h4>
        </div>
        <div class="card-body">
            <?php include('message.php'); ?>

            <form action="logincode.php" method="POST">
                <div class="form-group mb-3">
                    <label>Email ID</label>
                    <input type="email" name="email" required placeholder="Enter Email Address" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <a href="#" class="text-right">Forgot Password?</a>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login Now</button>
                </div>

                <div class="form-group mb-3 text-center">
                    <span>or</span>
                </div>

                <div class="form-group mb-3">
                    <button type="button" class="btn btn-google btn-block">Login with Google</button>
                </div>

                <div class="form-group text-center">
                    <span>Don't have an account? <a href="#">Sign up</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
