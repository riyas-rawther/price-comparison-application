<?php
  #Include the connectnew.php file
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
  // get data and store in a json array
  $query = "SELECT * FROM view_product_low_each_month  where fkProductID=" . $_POST["fkProductID"];

  $result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	  $orders[] = array(
	  'id' => $row['id'],
          'fkProductID' => $row['fkProductID'],
          'ProductName' => $row['ProductName'],
	        'StoreName' => $row['StoreName'],
	        'fkStore' => $row['fkStore'],
	        'price' => $row['price'],
	        
	        'months' => $row['months']
	      );
  }

  echo json_encode($orders);
  
  


?>