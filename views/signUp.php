<?php

include('Curl.php');

$name = htmlspecialchars($_POST['name']);
$firstName = htmlspecialchars($_POST['firstName']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
$center = htmlspecialchars($_POST['center']);

//{'name:".$name."','firstName:".$firstName."','email:".$email."','password:".$password."','centres_id:".$center."'}
$data = '{"name":"'.$name.'","firstName":"'.$firstName.'","email":"'.$email.'","centres_id":"'.$center.'","password":"'.$password.'"}';

$try = $curl->post('users',$data);

$array = json_decode($try, true);

header('Location: http://localhost/siteWebBdeProject/views/viewSign.html.php?c=0');
