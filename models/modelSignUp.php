<?php
include('model.php');
include('config.php');

//class modelSignUp
//{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $stt = $_POST["stt"];
    $cen = $_POST["cen"];

    if($mysqli->query("INSERT INTO users (fname, lname, email, password,Statut,Centre) VALUES('$fname', '$lname', '$email', '$pwd', '$stt', '$cen')")){
    echo 'Data inserted';
    echo '<br/>';
}

header ("location:../views/viewSignIn.html.php");
//}