<?
include "connect.php";
$rs = " SELECT * FROM invoice_to_customers WHERE Doc_sale_ID = '{$_GET["id"]}' ";
$select_inv = mysqli_query($connect, $rs) or die(mysqli_error($connect));
$si = mysqli_fetch_assoc($select_inv);

$Invoice_cus_ID = $si["Invoice_cus_ID"];

$rs2 = "
        INSERT goods_issue SET
        Invoice_cus_ID = '$Invoice_cus_ID'
       ";
mysqli_query($connect, $rs2) or die(mysqli_error($connect));
header("Location:insert_inventory_goodissue.php?id={$_GET["id"]}"); 
?>