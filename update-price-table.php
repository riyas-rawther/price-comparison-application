<?php
$con=mysqli_connect("localhost","root","","price");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$product = mysqli_real_escape_string($con, $_POST['productvalue']);
$store = mysqli_real_escape_string($con, $_POST['suppliervalue']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$pricedate = mysqli_real_escape_string($con, $_POST['pdate']);
$Spec_ID = mysqli_real_escape_string($con, $_POST['specvalue']);
$color_value = mysqli_real_escape_string($con, $_POST['color_value']);
$network = mysqli_real_escape_string($con, $_POST['network_value']);

$memory= mysqli_real_escape_string($con, $_POST['memory_value']);


$sql="INSERT INTO prices (fkProductID, fkStore, Price, PriceDate, Spec_ID, color, network, memory)
VALUES ('$product', '$store', '$price', '$pricedate', '$Spec_ID', '$color_value', '$network', '$memory')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added"; echo "<br />";
echo "Product Name Added was ";echo $product;
echo "<br />";
echo "Supplier value Added was "; echo $store;
echo "<br />";
echo "Price was "; echo $price;
echo "<br />";
echo "Date was ";echo $pricedate;
echo "<br />";
echo "Spec Value Added was "; echo $Spec_ID;
echo "<br />";
echo $color_value;
echo "<br />";
echo $network;
echo "<br />";
echo $memory;
echo "<br />";

//echo $_POST["color_value"];

mysqli_close($con);
?>