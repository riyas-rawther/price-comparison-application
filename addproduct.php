<?php
$con=mysqli_connect("localhost","clickpic_99oopp","99oopp00","clickpic_pricecompare");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$productname = mysqli_real_escape_string($con, $_POST['productname']);
$category = mysqli_real_escape_string($con, $_POST['category']);
$ProImage = mysqli_real_escape_string($con, $_POST['ProImage']);


$sql="INSERT INTO products (ProductName, fkCategory, ProImage)
VALUES ('$productname', '$category', '$ProImage')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?>