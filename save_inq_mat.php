<?php 
    include "connect.php";
    $Doc_sale_ID = $_POST['Doc_sale_ID'];
	$Sofa_ID = $_POST['Sofa_ID'];
    
    $sql4 = " SELECT * FROM `sofa_finished` JOIN line_item_sales USING(Sofa_ID) WHERE Doc_sale_ID = '$Doc_sale_ID' AND `sofa_finished`.Sofa_ID = $Sofa_ID ";
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


	$Quatity = $_POST['Quatity'];
    $Condition_ID = $_POST['Condition_ID'];
    $total_price = $Price * $Quatity;

$SQL = "
		INSERT line_item_sales SET 
                Doc_sale_ID='$Doc_sale_ID',
                Sofa_ID='$Sofa_ID',
                Condition_ID = '$Condition_ID',
                Quatity='$Quatity',
                PricePerUnit = '$Price',
                Total_price = '$total_price'
			";		

$result = mysqli_query($connect, $SQL);
						
if (!$result)
{
	die ("Could not successfully run the query $SQL ".mysqli_error($connect));
}
else
{
    // Check
	echo "Login successfully.<br><b> $total_price , $Price , $Condition_ID, $Quatity ";
}


header('Location:inqList.php'); 

?>