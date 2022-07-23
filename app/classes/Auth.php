<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 02-Jul-22
 * Time: 10:42 AM
 */

namespace App\Classes;


class Auth extends Config
{
    public function register($email, $name, $password){
        $result = $this->conn->query("INSERT INTO `users`(`email`, `name`, `password`) VALUES ('$email', '$name', '$password')");
        return $result ? true : false;
    }

    public function user_exists($email){
        $result = $this->conn->query("SELECT `email` FROM `users` WHERE `email`='$email'");

        return $result->num_rows;
    }

    public function login($email){
        return $this->conn->query("SELECT `name`,`email`,`password`,`status` FROM `users` WHERE `email`='$email'");
    }

    public function isLogin(){
        session_start();
        return isset($_SESSION['user_email']) ? true : false;
    }
}