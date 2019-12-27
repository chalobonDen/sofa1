<?php 
include 'connect.php';
date_default_timezone_set('Asia/Bangkok');
// insert to document_header_purchase
$Customer_ID = $_POST["Customer_ID"];
$Employee_ID = $_POST["employees"];
$Payment_terms = $_POST["Payment_terms"];
$Ship_term = $_POST["Ship_term"];
$Doc_Description = $_POST["Doc_Description"];
$DayTime = date("Y-m-d H:i:s");
$Delivery_date = $_POST['Delivery_date'];
$SQL = "
        INSERT `document_header_sale` SET
        Org_ID = 1,
        Doc_type_ID = 4,
        Customer_ID = '$Customer_ID',
        Employee_ID = '$Employee_ID',
        Doc_date = '$DayTime',
        Delivery_date = '$Delivery_date',
        Doc_description = '$Doc_description',
        Payment_terms = '$Payment_terms',
        Ship_term = '$Ship_term'
        ";

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


header('Location:inqList.php'); 

?>