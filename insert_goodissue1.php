<?php
include "connect.php";
// $Doc_sale_ID = $_GET["id"]; เลขใบ SO
$Doc_sale_ID = $_GET["id"];

$doc = " SELECT * FROM document_header_sale WHERE Doc_sale_ID = '$Doc_sale_ID' ";
$doc1 = mysqli_query($connect, $doc);
$doc2 = mysqli_fetch_assoc($doc1);
$Ref_ID = $doc2["Ref_ID"];

$insertGI = "
            insert into goods_issue (Invoice_cus_ID)
            select 
                Invoice_cus_ID
            from invoice_to_customers WHERE Doc_sale_ID = '$Doc_sale_ID'
      ";
mysqli_query($connect, $insertGI);


$GI="
    SELECT * FROM goods_issue JOIN invoice_to_customers USING(Invoice_cus_ID) 
    WHERE Doc_sale_ID = '$Doc_sale_ID' ;
    ";
$rs1 = mysqli_query($connect, $GI) or die(mysqli_error($connect));
$r1=mysqli_num_rows($rs1);    

$LI="
    SELECT *
    FROM line_item_sales
    where Doc_sale_ID = '$Ref_ID' ;
            ";
$rs2 = mysqli_query($connect, $LI) or die(mysqli_error($connect));
$r2=mysqli_num_rows($rs2);
echo "$r1,$r2";
//---------------------------------
for($i=0;$i<$r1;$i++){
    $gi1 = mysqli_fetch_assoc($rs1);
    $Goods_issue_ID[$i]=$gi1["Goods_issue_ID"]; 
    $Invoice_cus_ID[$i]=$gi1["Invoice_cus_ID"];  
}

for($j=0;$j<$r2;$j++){
    $li1 = mysqli_fetch_assoc($rs2);
    $Sofa_ID[$j]=$li1["Sofa_ID"]; 
    $Quatity[$j]=$li1["Quatity"];
}


/*
for($i=0;$i<$r2;$i++){
//    echo $Goods_receipt_ID[0];
//    echo $Material_ID[$i];

$InventoryDate = date("Y-m-d");
$in = "
    INSERT inventory_sofa SET  
        Sofa_ID = '$Sofa_ID[$i]',
        Goods_issue_ID = '$Goods_issue_ID[0]',
        InventoryDate = '$InventoryDate',
        Qty = '$Quatity[$i]'
      ";
mysqli_query($connect, $in);


}
// เอา sofa เข้า stock 
$stsofa = "
        UPDATE stock_sofa s,
        (SELECT Sofa_ID,sum(Qty) AS Qty FROM inventory_sofa WHERE Goods_issue_ID is not null GROUP BY Sofa_ID ) AS i
        SET s.Selling = i.Qty
        WHERE s.Sofa_ID = i.Sofa_ID
         ";
mysqli_query($connect, $stsofa);   
header('Location:inventory_sofa_list.php'); 
*/

// ------------------------------------------------------------
// ถ้าของไม่พอ ไม่ตัดstock 
$rs = mysqli_query($connect, "SELECT holding-Selling FROM stock_sofa");
$a = array(); while($row = mysqli_fetch_assoc($rs)) $a[] = $row['holding-Selling']; //holding-Selling คือ column ที่ต้องการข้อมูลมาใส่ใน array
/* check array
var_dump($a);
echo $a[0];
echo $a[1];
*/
for($i=0;$i<$r2;$i++){
    //    echo $Goods_receipt_ID[0];
    //    echo $Material_ID[$i];
if($a[0] && $a[1] && $a[2] && $a[3] && $a[4] >= $Quatity[$i]) {    
    $InventoryDate = date("Y-m-d");
    $in = "
        INSERT inventory_sofa SET  
            Sofa_ID = '$Sofa_ID[$i]',
            Goods_issue_ID = '$Goods_issue_ID[0]',
            InventoryDate = '$InventoryDate',
            Qty = '$Quatity[$i]'
          ";
    mysqli_query($connect, $in);

$stsofa = "
    UPDATE stock_sofa s,
    (SELECT Sofa_ID,sum(Qty) AS Qty FROM inventory_sofa WHERE Goods_issue_ID is not null GROUP BY Sofa_ID ) AS i
    SET s.Selling = i.Qty
    WHERE s.Sofa_ID = i.Sofa_ID
     ";
mysqli_query($connect, $stsofa);   


}
else if($a[0] || $a[1] || $a[2] || $a[3] || $a[4] < $Quatity[$i]) {
        header('Location:mat_not_enough.php');
        //echo "material not enough";
}


}

header('Location:inventory_sofa_list.php'); 

?>


