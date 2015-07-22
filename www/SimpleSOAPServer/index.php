<?php
include("lib/nusoap.php");
$client = new soapclient("http://localhost:90/test/server.php?wsdl");
$result    =    $client->gethelloworld("rICARDO");
echo "<pre>";
print_r($result);
echo "</pre>";
?>