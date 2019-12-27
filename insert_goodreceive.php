<?php
include "connect.php";
date_default_timezone_set('Asia/Bangkok');
$Ref_ID = $_GET["Doc"];
$Invoice_ven_ID = $_GET["id"];

//$Invoice_ven_ID = $_POST['Invoice_ven_ID'];
//$Ref_ID = $_POST['Ref_ID'];
$GR_date = date("Y-m-d H:i:s");

//$invoiceUpdate = "UPDATE invoice_from_vendors SET `status` = 1 WHERE Invoice_ven_ID = '$Invoice_ven_ID' ";
$invoiceUpdate = mysqli_query($connect, "UPDATE invoice_from_vendors SET `status` = 1 WHERE Invoice_ven_ID = '$Invoice_ven_ID' ");

$insertGR = "
    INSERT goods_receipt SET  
        Invoice_ven_ID = '$Invoice_ven_ID',
        GR_date = '$GR_date'
      ";
mysqli_query($connect, $insertGR);


$GR="
    SELECT *
    FROM goods_receipt
    JOIN invoice_from_vendors USING(Invoice_ven_ID)
    ";

// $Ref_ID คือ ใบ PR 
$LI="
    SELECT *
    FROM line_item_purchase
    where Doc_purchase_ID = '$Ref_ID' ;
            ";

$rs1 = mysqli_query($connect, $GR) or die(mysqli_error($connect));
$rs2 = mysqli_query($connect, $LI) or die(mysqli_error($connect));
$r1=mysqli_num_rows($rs1);
$r2=mysqli_num_rows($rs2);

for($i=0;$i<$r1;$i++){
    $gr1 = mysqli_fetch_assoc($rs1);
    $Goods_receipt_ID[$i]=$gr1["Goods_receipt_ID"]; 
    $Invoice_ven_ID[$i]=$gr1["Invoice_ven_ID"];  
}

for($j=0;$j<$r2;$j++){
    $li1 = mysqli_fetch_assoc($rs2);
    $Material_ID[$j]=$li1["Material_ID"]; 
    $Quatity[$j]=$li1["Quatity"];
}

for($i=0;$i<$r2;$i++){
//    echo $Goods_receipt_ID[0];
//    echo $Material_ID[$i];


$InventoryDate = date("Y-m-d");
$in = "
    INSERT inventory_mat SET  
        Material_ID = '$Material_ID[$i]',
        Goods_receipt_ID = '$Goods_receipt_ID[0]',
        InventoryDate = '$InventoryDate',
        Qty = '$Quatity[$i]'
      ";
mysqli_query($connect, $in);


}
// เอา mat เข้า stock 

$stmat = "
        UPDATE stock_material s,
        (SELECT Material_ID,sum(Qty) AS Qty FROM inventory_mat WHERE mod(`inventoryID`,2)=1 GROUP BY Material_ID ) AS i
        SET s.holding = i.Qty
        WHERE s.Material_ID = i.Material_ID
         ";
mysqli_query($connect, $stmat);   




header('Location:inventory_mat_list.php'); 


?>


