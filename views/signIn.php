<?php

include('Curl.php');

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$curl = new Curl;
$try = $curl->post('users/signin',"{'id:".$email."','password:".$password."'}");

var_dump($try);
