<?php

$name = htmlspecialchars($_POST['name']);
$firstName = htmlspecialchars($_POST['firstName']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

$err0 = "not same password";
$err1 = "7 char min";

$success = false;

if($password == $confirmPassword){
    if (substr($password, 7)!= false){

    }
    else return $err1;
}
else return $err0;

header('Location: http://localhost/siteWebBdeProject/views/viewSign.html.php');
