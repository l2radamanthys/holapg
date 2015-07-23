<?php
include("lib/nusoap.php");
//MPI PC23
#$server_address = "http://127.0.0.1:90/test/server.php?wsdl";
//CASA
$server_address = "http://127.0.0.1/proyectos/SimpleSOAPServer/server.php?wsdl";
$client = new soapclient($server_address);
$result    =    $client->gethelloworld("rICARDO");
echo "<pre>";
print_r($result);
echo "</pre>";
?>