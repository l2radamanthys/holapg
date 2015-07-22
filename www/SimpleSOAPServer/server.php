<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}

require_once("lib/nusoap.php");


function getHelloWorld($name) {
	$myname = "My Name Is <b>".$name . "</b>";
	return $myname;
}


function uploadFile($name, $data) 
{
	$filename = __DIR__."\\".$name;
	//$file = file_get_contents($filename);
	$file = base64_decode($data);	
	file_put_contents($filename, $file);
	if ($name != "") 
	{
		return "archivo subido";
	}
	else
	{
		return "error de subida";
	}
}


$server = new soap_server();
$server->configureWSDL("Testing SOAP WSDL","urn:Testing WSDL ");
 
$server->register("getHelloWorld",
	array("name" => "xsd:string"),
	array("return" => "xsd:string"),
	"urn:helloworld",
	"urn:helloworld#getHelloWorld"
);

$server->register("uploadFile",
	array(
		"name" => "xsd:string", 
		"data" => "xsd:base64Binary"
	),
	array("return" => "xsd:string"),
	"urn:uploadfile",
	"urn:uploadfile#uploadFile"
);
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>