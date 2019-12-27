<?php
    include "connect.php";
    date_default_timezone_set('Asia/Bangkok');
	$Doc_sale_ID = $_POST['Doc_sale_ID']; // เลข inq
	$Customer_ID = $_POST['Customer_ID'];
	$Employee_ID = $_POST['Employee_ID'];
	$Delivery_date = $_POST['Delivery_date'];
	$Ship_term = $_POST['Ship_term'];
	$Doc_Description = $_POST['Doc_Description'];
	$Payment_terms = $_POST['Payment_terms'];
	$Grand_total = $_POST['Grand_total'];
    $DayTime = date("Y-m-d H:i:s");


$DayTime = date("Y-m-d H:i:s");
$sql = " INSERT `document_header_sale` SET 
				`Org_ID`=1,
				`Doc_Type_ID`=5,
				`Customer_ID`='$Customer_ID',
				`Employee_ID`='$Employee_ID',
                `Doc_date` = '$DayTime',
				`Delivery_date` = '$Delivery_date',
                `Doc_Description`='$Doc_Description',
                `Payment_terms`='$Payment_terms',
				`Ship_term`='$Ship_term',
				`Ref_ID`='$Doc_sale_ID'
				
			";		

    $rs = mysqli_query($connect, $sql);
    

    if (!$rs)
{
	die ("Could not successfully run the query $sql ".mysqli_error($connect));
}
else
{
    // Check
	echo "successfully.,$Doc_sale_ID,$Payment_terms,$Ship_term,$Delivery_date<br><b>";
}

    $Query = "UPDATE `document_header_sale` SET `status_c` = 1 
                WHERE `status_c` = 0 AND `Doc_sale_ID` = '$Doc_sale_ID' ";
    $result = mysqli_query($connect, $Query);
        if (!$result)
        {
            die ("Could not successfully run the query $Query ".mysqli_error($connect));
        }
            else
        {
            echo "successfully.<br><b>";
        }
        
	header('Location:qaList.php');
?>