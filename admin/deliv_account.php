<?php
include("../connect_db.php");

$xml = new SimpleXMLElement('<xml/>');

$query = mysqli_query($db,"SELECT * FROM deliv");
while($row = mysqli_fetch_assoc($query))
{
    $delivery = $xml->addChild('delivery');
    $delivery->addChild('Όνομα', "$row[name]");
	$delivery->addChild('iban', "$row[account]");
	$delivery->addChild('AFM', "$row[AFM]");
	$delivery->addChild('AMKA', "$row[AMKA]");
	$delivery->addChild('amount', "$row[profit]");
}

Header('Content-type: text/xml');
print($xml->asXML());
?>