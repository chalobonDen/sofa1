<?php 
include 'connect.php';
$PricePerUnit = $_POST['PricePerUnit'];
$Quatity = $_POST['Quatity'];
$Material_ID = $_POST['Material_ID'];
$Total_price = $Quatity * $PricePerUnit;
$Doc_purchase_ID = $_POST['Doc_purchase_ID'];

$SQL1 = "INSERT INTO `line_item_purchase` 
		(`Line_purchase_ID`, `Doc_purchase_ID`, `Material_ID`, `Quatity`, 
		`PricePerUnit`, `Total_price`) 
		
		VALUES (null, '$Doc_purchase_ID', '$Material_ID', '$Quatity', '$PricePerUnit', '$Total_price')";

mysqli_query($connect, $SQL1) or die(mysqli_error($connect));



$result = mysqli_query($connect, $SQL1);
						
if (!$result)
{
	die ("Could not successfully run the query $SQL1 ".mysqli_error($connect));
}
else
{
	echo "successfully.<br><b>";
	header('Location:prList.php');
}

?>