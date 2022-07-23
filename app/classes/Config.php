<?php

/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 01-Jul-22
 * Time: 11:41 PM
 */

namespace App\Classes;

class Config
{
    public $conn;

    public function __construct()
    {
        $this->conn = new \mysqli('localhost','root','','dcw');
        if($this->conn->connect_error){
            die($this->conn->connect_error);
        }
    }

    public function showMessage($type, $message){
        $output  = '';
        $output .= '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">';
        $output .= $message;
        $output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $output .= '<span aria-hidden="true">&times;</span>';
        $output .= '</button>';
        $output .= '</div>';

        return $output;
    }
}