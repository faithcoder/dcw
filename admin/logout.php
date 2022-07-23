<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 15-Jul-22
 * Time: 9:29 AM
 */

session_start();
session_destroy();

header('location:login.php');