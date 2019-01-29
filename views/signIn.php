<?php

include('Curl.php');

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$data = '{"id":"'.$email.'","password":"'.$password.'"}';

$try = $curl->post('users/signin',$data);

$array = json_decode($try, true);

$role = $array['statuts'];
$token = $array['token']['0'];

if(isset($role)){

    session_start();

    $_SESSION["session"]=$role;
    $_SESSION["token"]=$token;

    header('Location: http://localhost/siteWebBdeProject/');
}

else
    header('Location: http://localhost/siteWebBdeProject/views/viewSign.html.php?c=0');

//$data2 = '{"id":"'.$email.'"}';
//
//$try2 = $curl->getT('users/:id',$data2, $token);
//
//echo '<br>';
//var_dump($try2);
//echo '<br>';
//
//$array2 = json_decode($try2, true);
//
//$name = $array2['name'];
//$firstName = $array2['firstName'];
//
//$_SESSION["name"]=$name;
//$_SESSION["firstName"]=$firstName;
//
//var_dump($_SESSION["session"]);
//echo '<br>';
//var_dump($_SESSION["token"]);
//echo '<br>';
//var_dump($_SESSION["name"]);
//echo '<br>';
//var_dump($_SESSION["firstName"]);



