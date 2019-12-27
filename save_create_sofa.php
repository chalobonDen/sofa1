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
	//header('Location:prList.php');
}

// บัค mat ไม่ครบ แต่สร้างได้ 

$rs = mysqli_query($connect, "SELECT holding-used FROM stock_material");
$a = array(); while($row = mysqli_fetch_assoc($rs)) $a[] = $row['holding-used']; //holding-used คือ column ที่ต้องการข้อมูลมาใส่ใน array
/* check array
var_dump($a);
echo $a[0];
echo $a[1];
*/

if($a[0] && $a[1] && $a[2] && $a[3] && $a[4] && $a[5] && $a[6] && $a[7] && $a[8] && $a[9] && $a[10] && $a[11] && $a[12] && $a[13] && $a[14] && $a[15] >= $Qty) {
$updateSM = "
        UPDATE stock_material s,
        (SELECT Material_ID FROM materials JOIN material_good USING(Material_ID)
        JOIN sofa_finished USING(Sofa_ID) WHERE Sofa_ID = 1 ) AS i
        SET s.used = s.used+$Qty
        WHERE s.holding > $Qty
        AND s.Material_ID = i.Material_ID
     ";
mysqli_query($connect, $updateSM);

$updateSS = "
        UPDATE stock_sofa s,
        (SELECT * FROM inventory_sofa WHERE mod(`inventory_sofaID`,2)=1 GROUP BY Sofa_ID) AS i
        SET s.holding = s.holding+$Qty
        WHERE s.Sofa_ID = $Sofa_ID
        ";
mysqli_query($connect, $updateSS);    
header('Location:inventory_sofa_list.php');  

}
else {
        header('Location:mat_not_enough.php');
        //echo "material not enough";
}

// ถ้า holding-used  > Qty จะไม่สามารถเพิ่มproductได้ เพราะmaterialไม่พอ



?>