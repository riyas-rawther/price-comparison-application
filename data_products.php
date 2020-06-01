<?php
#Include the connect.php file
include ('app/connectnew.php');

// Connect to the database
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
	$query = "SELECT idProducts, ProductName FROM products";
	// SELECT COMMAND
	
	$result = $mysqli->prepare($query);
	$result->execute();
	/* bind result variables */
	$result->bind_result($idProducts, $ProductName);
	/* fetch values */
	while ($result->fetch())
		{
		$employees[] = array(
			'idProducts' => $idProducts,
			'ProductName' => $ProductName
		);}
	echo json_encode($employees);
	?>