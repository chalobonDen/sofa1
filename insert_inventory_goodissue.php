<?
include "connect.php";
$rs = " SELECT goods_issue JOIN invoice_to_customers USING(Invoice_cus_ID) WHERE Doc_sale_ID = '{$_GET["id"]}' ";
$select_gi = mysqli_query($connect, $rs) or die(mysqli_error($connect));
//$gi = mysqli_fetch_assoc($select_gi);
$gi=mysqli_num_rows($select_gi);

$rs1 = " SELECT line_item_sales WHERE Doc_sale_ID = '{$_GET["id"]}' ";
$select_li = mysqli_query($connect, $rs1) or die(mysqli_error($connect));
//$li = mysqli_fetch_assoc($select_li);
$li=mysqli_num_rows($select_li);





for($i=0;$i<$li;$i++){
    $gi1 = mysqli_fetch_assoc($select_gi);
    $Goods_issue_ID[$i]=$gi1["Goods_issue_ID"]; 
    $Invoice_cus_ID[$i]=$gi1["Invoice_cus_ID"];  
}

for($j=0;$j<$li;$j++){
    $li1 = mysqli_fetch_assoc($select_li);
    $Sofa_ID[$j]=$li1["Sofa_ID"]; 
    $Quatity[$j]=$li1["Quatity"];
}

for($i=0;$i<$li;$i++){
    
    $sql1 = "
    INSERT inventory_sofa SET  
        Sofa_ID = '$Sofa_ID[$i]',
        Goods_issue_ID = '$Goods_issue_ID[0]',
        Qty = '$Quatity[$i]'
      ";
mysqli_query($connect, $sql1) or die(mysqli_error($connect));
header("Location:update_stock_sofa.php?id={$_GET["id"]}"); 
}
?>