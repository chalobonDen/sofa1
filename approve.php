<?php
    include "connect.php";
	$Doc_purchase_ID = $_POST['Doc_purchase_ID'];
	$Vendor_ID = $_POST['Vendor_ID'];
	$Employee_ID = $_POST['Employee_ID'];
	$Doc_date = $_POST['Doc_date'];
	$Ship_term = $_POST['Ship_term'];
	$Doc_Description = $_POST['Doc_Description'];
	$Payment_terms = $_POST['Payment_terms'];
	$Grand_total = $_POST['Grand_total'];

    $Query = "UPDATE `document_header_purchase` SET `Status` = 1 , `Grand_total`='$Grand_total'
                WHERE `Status` = 0 AND `Doc_purchase_ID` = $Doc_purchase_ID ";
    $result = mysqli_query($connect, $Query);
        if (!$result)
        {
            die ("Could not successfully run the query $Query ".mysqli_error($connect));
        }
            else
        {
            echo "successfully.<br><b>";
        }

$DayTime = date("Y-m-d H:i:s");
$sql = " INSERT `document_header_purchase` SET 
				`Org_ID`=1,
				`Doc_Type_ID`=2,
				`Vendor_ID`='$Vendor_ID',
				`Employee_ID`='$Employee_ID',
				`Doc_date` = '$DayTime',
				`Ship_term`='$Ship_term',
				`Doc_Description`='$Doc_Description',
				`Ref_ID`='$Doc_purchase_ID',
				`Payment_terms`='$Payment_terms',
				`Grand_total`='$Grand_total'
			";		

	$rs = mysqli_query($connect, $sql);
	header('Location:poList.php');
?>