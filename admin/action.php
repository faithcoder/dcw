<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 01-Jul-22
 * Time: 9:12 PM
 */

session_start();

require_once '../vendor/autoload.php';

use App\Classes\Auth;

$auth = new Auth();
//register code
if(isset($_POST['action']) && $_POST['action'] ==='register'){
     $email     = $_POST['email'];
     $name      = $_POST['name'];
     $password  = password_hash($_POST['r_password'], PASSWORD_DEFAULT );


     if($auth->user_exists($email) > 0){

     echo $auth->showMessage('danger', 'This '.$email.' is already exist, please try again!');

     }else{
         if($auth->register($email, $name, $password)){
            echo 'ok';
            $_SESSION['user_email'] = $email;
         }else{
             echo $auth->showMessage('warning', 'Registration incomplete, please try again');
         }
     };

     //var_dump();
}


//login code
if(isset($_POST['action']) && $_POST['action'] === 'login'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;

    $result = $auth->login($email);

    if($result->num_rows === 1){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            if($row['status'] == 0){
                echo "ok";

                if($rememberMe){
                    setcookie('user_email', $email, time()+ (7*24*60*60));
                    setcookie('user_pass', $password, time()+ (7*24*60*60));
                }else {
                    setcookie('user_email','', -time()+ (7*24*60*60));
                    setcookie('user_pass', '', -time()+ (7*24*60*60));
                }

                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $row['name'];

            }else {
                echo $auth->showMessage('danger', 'Your account is inactive, please contact to Admin');
            }
        }else{
            echo $auth->showMessage('danger', 'Wrong Password, please try again');
        }
    }else{
        echo $auth->showMessage('warning', 'Wrong Email, please try again');
    }
}

//reset password
if(isset($_POST['action']) && $_POST['action'] === 'resetPassword'){
   $email = $_POST['email'];
   $result = $auth->login($email);
   print_r($result);
}