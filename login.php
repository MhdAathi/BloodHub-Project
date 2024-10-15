<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message']  = 'You are already Logged In';
    header("Location: ../index.php");
    exit(0);
};
include('includes/header.php');
include('includes/navbar.php');

?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap");

    body {
        background: linear-gradient(135deg, #b92b27, #4a0c0c);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(185, 43, 39, 0.8), rgba(74, 12, 12, 0.8));
        z-index: -1;
        opacity: 0.9;
    }

    .login-card {
        width: 100%;
        max-width: 400px;
        /* Lighter form background */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        padding: 20px;
        background: rgba(255, 255, 255, 0.45);
        -webkit-backdrop-filter: blur(15px);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.225);
        -webkit-box-shadow: 0 -1px 12.5px -1.5px #d5bfbf;
        -moz-box-shadow: 0 -1px 12.5px -1.5px #d5bfbf;
        box-shadow: 0 -1px 12.5px -1.5px #d5bfbf;
    }

    .card-header {
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
        color: #b92b27;
        /* Matching header color with the gradient */
    }

    .card-header h4 {
        margin: 0;
        font-size: 1.6rem;
    }

    .span-color {
        color: #000;
        /* Set span text color to black */
    }

    .card-body {
        padding: 10px;
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
        border: 1px solid #ccc;
        margin-top: 5px;
        width: 100%;
        background-color: #f0f0f0;
        /* Softer input background */
        color: #333;
    }

    .btn-block {
        display: block;
        margin: 0 auto;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 10px 16px;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #db4437;
        /* Updated button color */
        color: #000;
        margin-bottom: 10px;
        transition: background-color 0.3s ease;
        border-color: #000;
    }

    .btn-primary:hover {
        background-color: #c23321;
        border-color: #fff;
        /* Slightly darker on hover */
    }

    .btn-google {
        background-color: transparent;
        /* Transparent background */
        color: #000;
        /* Black text */
        border: 2px solid #000;
        /* Black border */
        margin-bottom: 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-google:hover {
        background-color: #000;
        /* White background on hover */
        color: #fff;
        /* Black text on hover */
        border: 2px solid #fff;
        /* Black border remains */
    }

    .form-group a {
        text-decoration: none;
        font-size: 14px;
        color: #000;
        display: inline-block;
        margin-top: 10px;
    }

    .form-group a:hover {
        color: #921d1d;
    }

    ::placeholder {
        color: #888;
        font-weight: 300;
        letter-spacing: 0.5px;
        font-size: 13px;
    }

    input:focus::placeholder {
        color: #aaa;
        opacity: 0.7;
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
            <h4>Login to <a class="navbar-brand" href="#"><span class="span-color">Blood</span>Hub</a></h4>
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
                    <span>Don't have an account? <a href="register.php">Sign up</a></span>
                </div>
            </form>
        </div>
    </div>
</div>