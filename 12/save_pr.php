<?php 
include 'connect.php';
session_start();
// insert to document_header_purchase
$Vendor_ID = $_POST["vendors"];
$Employee_ID = $_POST["employees"];
$Payment_terms = $_POST["Payment_terms"];
$Ship_term = $_POST["Ship_term"];
$Doc_Description = $_POST["Doc_Description"];

$SQL = "INSERT INTO `document_header_purchase` 
		(`Doc_purchase_ID`, `Org_ID`, `Doc_type_ID`, `Vendor_ID`, 
		`Employee_ID`, `Doc_Description`, `Payment_terms`, 
		`Ship_term`, `Grand_total`, `Ref_ID`) 
		
		VALUES (null, '1', '1', '$Vendor_ID', '$Employee_ID', '$Doc_Description', 
				'$Payment_terms', '$Ship_term', '0', '1')";

mysqli_query($connect, $SQL) or die(mysqli_error($connect));



$result = mysqli_query($connect, $SQL);
						
if (!$result)
{
	die ("Could not successfully run the query $SQL ".mysqli_error($connect));
}
else
{
	echo "successfully.<br><b>";
}

// insert to materials
$PricePerUnit = $_POST['PricePerUnit'];
$Quatity = $_POST['Quatity'];
$Material_ID = $_POST['Material_ID'];
$Total_price = $Quatity * $PricePerUnit;

$Doc_purchase_ID = "SELECT `Doc_purchase_ID` FROM `document_header_purchase` JOIN `line_item_purchase` USING(`Doc_purchase_ID`) ";

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
}


?>