<?php
require 'core/SQL.php';

$conn = new SQLConnection();

for ($k=1; $k<=16; $k++)
{
	$id = $k;
	while(strlen($id)<3)
		$id = "0".$id;
	
	$conn->pquery('INSERT INTO texts (Field,Domain,Subdomain,Date,Name,Route1,Route1_ANN,Route1_CLAWS) VALUES (?,?,?,?,?,?,?,?)',"SC_TECH","MRN","NAT_JNP","2019-04-23","M_NAT_JNP_".$id,"UNTAGGED/M_NAT_JNP/M_NAT_JNP".$k.".txt","TAGGED_ANN/M_NAT_JNP/M_NAT_JNP_".$id."_ANN.txt","TAGGED_CLAWS/M_NAT_JNP/M_NAT_JNP_".$id.".txt");
}
$conn->close();

?>