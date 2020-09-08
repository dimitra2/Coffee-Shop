<?php

include("../connect_db.php");

$myquery = mysqli_query($db,"UPDATE deliv SET `distance`=distance+'$_GET[distance]'");
$myquery2 = mysqli_query($db,"UPDATE efood SET `state`='delivered' where id='$_GET[kwd]'");
$myquery3 = mysqli_query($db,"UPDATE deliv SET `current_adr`='$_GET[end]'");
?>