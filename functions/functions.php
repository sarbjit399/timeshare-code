<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * 
 * for print array
 */
function pr($arr, $die = false) {
    echo '<pre>';
    print_r($arr);
    if ($die)
        die;
    echo '</pre>';
}
/**
 * 
 * base64 encode
 */
function encode($id) {
    return base64_encode($id);
}
/**
 * 
 * base64 decode
 */
function decode($id) {
    return base64_decode($id);
}

/**
 * 
 *Get latitude logitude of zipcode
 */
function getLntByZip($zip, $country = null) {
   
    

     $zip = str_replace(' ', '+', $zip);
    $search = trim($zip . ",+" . $country);
    $url = GOOGLE_API_ZIPCODE_LOCATION_URL . $search . "&sensor=false";
// $url = “http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&amp;sensor=false";
    $ch = curl_init();


    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_a = json_decode($response);
// pr($response_a, 1);
    if (isset($response_a->results[0])) {
        $lng = $response_a->results[0]->geometry->location->lng;
        $lat = $response_a->results[0]->geometry->location->lat;

        $data = array("lng" => $lng, "lat" => $lat);
    }
    if (isset($lat)) {
        return $data;
    } else {
        return array("lng" => '00.0000', "lat" => '00.0000');
    }
}

