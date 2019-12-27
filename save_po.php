<?php 
include 'connect.php';
date_default_timezone_set('Asia/Bangkok');
// insert to document_header_purchase
$Vendor_ID = $_POST["vendors"];
$Employee_ID = $_POST["employees"];
$Payment_terms = $_POST["Payment_terms"];
$Ship_term = $_POST["Ship_term"];
$Doc_Description = $_POST["Doc_Description"];
$DayTime = date("Y-m-d H:i:s");
$SQL = "INSERT INTO `document_header_purchase` 
		(`Doc_purchase_ID`, `Org_ID`, `Doc_type_ID`, `Vendor_ID`, 
		`Employee_ID`, `Doc_date`, `Doc_Description`, `Payment_terms`, 
		`Ship_term`, `Grand_total`, `Ref_ID`) 
		
		VALUES (null, '1', '1', '$Vendor_ID', '$Employee_ID', '$DayTime', '$Doc_Description', 
				'$Payment_terms', '$Ship_term', '0', '1')";

mysqli_query($connect, $SQL) or die(mysqli_error($connect));



$result = mysqli_query($connect, $SQL);
						
if (!$result)
{
	die ("Could not successfully run the query $SQL ".mysqli_error($connect));
}
else
{
	echo "Login successfully.<br><b>";
}

header('Location:index.php');

?>