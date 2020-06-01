<?php
#Include the connect.php file
include('connectnew.php');
#Connect to the database
//connection String
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//select database
mysql_select_db($database, $connect);
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False){
	print "can't find $database";
}
// get data and store in a json array ---- products
$query = "SELECT * FROM stores";

$from = 0; 
$to = 3000;
$query .= " LIMIT ".$from.",".$to;


$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$stores[] = array(
        'idStores' => $row['idStores'],
        'StoreName' => $row['StoreName']
      );
}

echo json_encode($stores);




?>