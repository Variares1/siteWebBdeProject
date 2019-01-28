<?php

include('Curl.php');

$name = htmlspecialchars($_POST['name']);
$firstName = htmlspecialchars($_POST['firstName']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
$center = 2; //htmlspecialchars($_POST['center']);

$curl = new Curl;
$try = $curl->post('users',"{'name:".$name."','firstName:".$firstName."','email:".$email."','password:".$password."','centres_id:".$center."'}");

var_dump($try);

//header('Location: http://localhost/siteWebBdeProject/views/viewSign.html.php');
