<?php

$return = new stdClass();
$return->succes = false;

if ($a==$a){
    if($a==$a) {
       $return->succes = true;
    }
}
else{
    $return->message = "Bad password";
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($return);