<?php
include ('app/connectnew.php');
  $mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
	//$fkProductID = 1719; //$_GET['fkProductID'];
	$fkProductID = $_GET['fkProductID'];
	// $query = "SELECT price, months, StoreName, ProductName, fkProductID, id FROM view_product_low_each_month WHERE fkProductID = 1719";
	// $query = 'SELECT price, months, StoreName, ProductName, fkProductID, id FROM view_product_low_each_month WHERE fkProductID = "$fkProductID"';
$query = "SELECT price, months, StoreName, ProductName, fkProductID, id FROM view_product_low_each_month WHERE fkProductID = '".$fkProductID."'"; 	
	
	// SELECT COMMAND
	
	$result = $mysqli->prepare($query);
	$result->execute();
	/* bind result variables */
	$result->bind_result(
	$price
	,$ProductName
	,$months
	,$StoreName
	,$fkProductID
	,$id
	);
	/* fetch values */
	while ($result->fetch())
		{
		$chart[] = array(
			'price' => $price,
			'ProductName' => $ProductName,
			'months' => $months,
			'StoreName' => $StoreName,
			'fkProductID' => $fkProductID,
			'id' => $id
		);}
	echo json_encode($chart);


?>