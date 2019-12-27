<?php 
include 'connect.php';
$Sofa_ID = $_POST['Sofa_ID'];
$Qty = $_POST['Qty'];
$InventoryDate = date("Y-m-d H:i:s");

$SQL1 = "INSERT INTO `inventory_sofa` 
		(`inventory_sofaID`, `Sofa_ID`, `InventoryDate`, `Qty`) 
		VALUES (null, '$Sofa_ID', '$InventoryDate', '$Qty')";

mysqli_query($connect, $SQL1) or die(mysqli_error($connect));


$result = mysqli_query($connect, $SQL1);
						
if (!$result)
{
	die ("Could not successfully run the query $SQL1 ".mysqli_error($connect));
}
else
{
	echo "successfully.<br><b>";
	//header('Location:prList.php');
}

// บัค mat ไม่ครบ แต่สร้างได้ 
$updateSM = "
            UPDATE stock_material s,
            (SELECT Material_ID FROM materials JOIN material_good USING(Material_ID)
            JOIN sofa_finished USING(Sofa_ID) WHERE Sofa_ID = 1 ) AS i
            SET s.used = $Qty
            WHERE s.holding > $Qty
            AND s.Material_ID = i.Material_ID
         ";
mysqli_query($connect, $updateSM);



$updateSS = "
            UPDATE stock_sofa s,
            (SELECT * FROM inventory_sofa WHERE mod(`inventory_sofaID`,2)=1 GROUP BY Sofa_ID) AS i
            SET s.holding = $Qty
            WHERE s.Sofa_ID = $Sofa_ID
            ";
mysqli_query($connect, $updateSS);




?>