<?php		
include('../connect_db.php');
	$xml = new SimpleXMLElement('<xml/>');
	$header = $xml->addChild('header');
	$transaction=$header->addChild('transaction');
	$period=$transaction->addChild('period');
	$period->addAttribute("month","10");
	$period->addAttribute("year","2018");
	$body = $xml->addChild('body');
	$managers= $body->addChild('managers');
	for ($i = 1; $i <= 2; ++$i) 
	{
		$query = mysqli_query($db,"SELECT * FROM manager where kwd = $i");
		$row = mysqli_fetch_assoc($query);
		
		$query2 = mysqli_query($db,"SELECT * FROM katastima where kwd = $i");
		$row2 = mysqli_fetch_assoc($query2);
		
		$amount = 800+0.02*$row2['tziros'];
		
		$manager = $managers->addChild('manager');
		$manager->addChild('Όνομα', "$row[name]");
		$manager->addChild('AMKA', "$row[AMKA]");
		$manager->addChild('AFM', "$row[AFM]");
		$manager->addChild('iban', "$row[Account]");
		$manager->addChild('amount', "$amount");
	}

	Header('Content-type: text/xml');
	print($xml->asXML());
?>