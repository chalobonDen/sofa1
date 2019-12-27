<?php
	include "connect.php";
	$Doc_sale_ID = $_POST['Doc_sale_ID'];
	$Sofa_ID = $_POST['Sofa_ID'];
	$Quatity = $_POST['Quatity'];

    $sql4 = " SELECT * FROM `sofa_finished` JOIN line_item_sales USING(Sofa_ID) WHERE Doc_sale_ID = '$Doc_sale_ID' AND `sofa_finished`.Sofa_ID = $Sofa_ID";
    $resultSql4 = mysqli_query($connect, $sql4);
    $p = mysqli_fetch_assoc($resultSql4);
    switch ($Sofa_ID) {
        case "1":
            $Price = 5000;
            break;
        case "2":
            $Price = 5500;
            break;
        case "3":
            $Price = 8000;
            break;
        case "4":
            $Price = 9900;
            break;
        case "5":
            $Price = 15000;
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!";
    }


    $Condition_ID = $_POST['Condition_ID'];
    $PricePerUnit = $Price;
    $Total_price = $PricePerUnit*$Quatity;

$sql = "
		INSERT line_item_sales SET 
                Doc_sale_ID='$Doc_sale_ID',
				Sofa_ID='$Sofa_ID',
				Quatity='$Quatity',
				PricePerUnit='$PricePerUnit',
				Condition_ID='$Condition_ID',
				Total_price='$Total_price'

			";		

mysqli_query($connect, $sql) or die(mysqli_error($connect));

exit("<script>window.location = 'qaList.php';</script>");
?>