<?php
$url = "https://maps.googleapis.com/maps/api/geocode/json";
$data = array(
        "address" => "Oxford University, uk",
        "sensor" => "false"
        );
$query_url = sprintf("%s?%s", $url, http_build_query($data));
header('Content-type: application/json');
echo file_get_contents($query_url);