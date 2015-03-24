<?php
require("Geocode.php");
use kamranahmedse\Geocode;

$address  = "2323 Smith Street, Houston, TX, United States";
$address  = preg_replace("/[\s_]/", "+", $address);
$address  = str_replace(",+United+States", "", $address);
$geocode  = new Geocode($address);
$postcode = $geocode->getPostCode();
$url   = "http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=APIKEY&address=$address&citystatezip=$postcode";
$json  = json_encode(simplexml_load_string(file_get_contents($url)));
$jsond = json_decode($json);
echo $jsond->response->results->result->zestimate->amount;

?>