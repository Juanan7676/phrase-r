<?php
require 'core/SQL.php';

$conn = new SQLConnection();

for ($k = 1; $k <= 16; $k++)
	$conn->pquery("INSERT INTO texts (Field,Domain,Subdomain,Genre,Date,Name,Author,Magazine,Words,Route1,Route1_ANN) VALUES('SC_TECH','MAR','NAT_JNP','','2018-09-13',?,'','',0,?,?)","M_NAT_JNP$k","UNTAGGED/M_NAT_JNP/M_NAT_JNP{$k}.txt","M_NAT_JNP/M_NAT_JNP/M_NAT_JNP{$k}_ANN.txt");
$conn->close();



?>