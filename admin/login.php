<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 01-Jul-22
 * Time: 9:12 PM
 */

require_once '../vendor/autoload.php';

use App\Classes\Auth;

$auth = new Auth();
$auth->isLogin() ? header("location: dashboard.php"): false;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login Panel </title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/admin/login.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
</head>
<body>
<div class="container">
<!--    ADMIN LOGIN FORM START-->
    <div class="row justify-content-center h-100vh" id="login-form-box">
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-4">
                    <h2 class="text-center text-primary font-weight-bold">Login to your account</h2>
                    <hr class="my-3">
                    <div id="loginError"></div>
                    <form action="" method="post" class="px-3" id="login-form">
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                   value="<?= isset($_COOKIE['user_email']) ? $_COOKIE['user_email']:'' ?>">
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password"
                                   value="<?= isset($_COOKIE['user_pass']) ? $_COOKIE['user_pass'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <div class="float-left custom-control custom-checkbox">
                                <input type="checkbox" id="rememberMe" name="rememberMe" class="custom-control-input" <?= isset($_COOKIE['user_email']) ? 'checked':'' ?> >
                                <label for="rememberMe" class="custom-control-label" >Remember Me</label>
                            </div>
                            <div class="float-right">
                                <a href="javascript:" class="text-decoration-none" id="showForgetPassword">Forget password?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign In" id="loginBtn" class="btn btn-block align-self-center btn-primary">
                        </div>
                    </form>

                </div>
                <div class="card p-4 justify-content-center" style="background-color: #666;">
                    <h2 class="text-center text-light">Welcome back!</h2>
                    <hr class="my-3 bg-white">
                    <p class="text-light text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, rem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur in iure maiores nihil, veritatis.</p>
                    <button class="btn btn-outline-light btn-md align-self-center" id="showSignUpForm">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<!-- ADMIN LOGIN FORM END-->

    <!--    ADMIN Register FORM START-->
    <div class="row justify-content-center h-100vh" id="register-form-box" style="display: none;">
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-4">
                    <h2 class="text-center text-primary font-weight-bold">Create your account</h2>
                    <hr class="my-3">
                    <div id="displayError"></div>
                    <form action="" method="post" class="px-3" id="register-form">
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            <div class="invalid-feedback">Write your email address please</div>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                            <div class="invalid-feedback">Your name is required</div>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="r_password" id="r_password" placeholder="Enter your password">
                            <div class="invalid-feedback">A Strong Password is recommended</div>
                        </div>

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Confirm your password">
                            <div class="invalid-feedback">Confirm your password please</div>
<!--                            <div class="passerror"></div>-->
                        </div>

                        <div class="clearfix">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register" id="registerUser" class="btn btn-block align-self-center btn-primary">
                        </div>
                    </form>

                </div>
                <div class="card p-4 justify-content-center" style="background-color: #666;">
                    <h2 class="text-center text-light">Welcome back!</h2>
                    <hr class="my-3 bg-white">
                    <p class="text-light text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, rem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur in iure maiores nihil, veritatis.</p>
                    <button class="btn btn-outline-light btn-md align-self-center" id="showSignInForm">Sign In</button>
                </div>
            </div>
        </div>
    </div>
<!-- ADMIN LOGIN FORM END-->

    <!--    FORGOTTEN PASSWORD FORM START-->
    <div class="row justify-content-center h-100vh" id="forgotten-form-box" style="display: none;">
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-4">
                    <h2 class="text-center text-primary font-weight-bold">Forgot your password?</h2>
                    <hr class="my-3">
                    <div id="resetPasswordError"></div>
                    <form action="" method="post" class="px-3" id="forgotten-form">
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="clearfix">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Reset Password" id="resetPassword" class="btn btn-block align-self-center btn-primary">
                        </div>
                    </form>

                </div>
                <div class="card p-4 justify-content-center" style="background-color: #666;">
                    <h2 class="text-center text-light">Lost Password!</h2>
                    <hr class="my-3 bg-white">
                    <p class="text-light text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, rem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur in iure maiores nihil, veritatis.</p>
                    <button class="btn btn-outline-light btn-md align-self-center" id="back">Back to Login</button>
                </div>
            </div>
        </div>
    </div>
<!-- FORGOTTEN PASSWORD FORM END-->
</div>



<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js.map"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/css/admin/login.js"></script>
</body></html>
