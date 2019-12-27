<?php
		include "connect.php";
			       
  $Doc_purchase_ID = $_POST['Doc_purchase_ID'];
  $Vendor_ID = $_POST['Vendor_ID'];
  $Employee_ID = $_POST['Employee_ID'];
  $Payment_terms = $_POST["Payment_terms"];
  $Ship_term = $_POST["Ship_term"];
  $Doc_Description = $_POST["Doc_Description"];
  $Grand_total = $_POST['Grand_total'];
  $Ref_ID = $_POST['Ref_ID']; //เลข PR
  $Doc_date = $_POST['Doc_date'];



// Ref_ID='$Doc_purchase_ID' -> ใบPO ลิ้งไปเอกสารใบinvoice type=3
$new = "
    INSERT document_header_purchase SET 
        Org_ID=1,
        Doc_Type_ID=3,
        Vendor_ID='$Vendor_ID',
        Employee_ID='$Employee_ID',
        Ship_term='$Ship_term',
        Doc_Description='$Doc_Description',
        Ref_ID='$Doc_purchase_ID',
        Payment_terms='$Payment_terms',
        Grand_total='$Grand_total'
      ";

// อัพเดต เอกสารtype=2 ให้สถานะเป็น 1 (ไม่แสดงในลิสPO)
$edit = "
    UPDATE document_header_purchase SET 
        Status = 1 , Grand_total='$Grand_total'

      WHERE Ref_ID = '$Ref_ID' 
        
      "; 

$rs1 = mysqli_query($connect, $new);
$rs2 = mysqli_query($connect, $edit);

$DayTime = date("Y-m-d H:i:s");
$invoice = "
    INSERT invoice_from_vendors SET  
        Doc_purchase_ID = '$Doc_purchase_ID',
        PO_date = '$Doc_date',
        Invoice_date = '$DayTime',
        Payment_total = '$Grand_total'
      ";
$rs3 = mysqli_query($connect, $invoice);

$inv = "SELECT * FROM invoice_from_vendors WHERE Doc_purchase_ID = '$Doc_purchase_ID' ";
$rs4 = mysqli_query($connect, $inv);
$row3 = mysqli_fetch_assoc($rs4);
$Invoice_ven_ID = $row3["Invoice_ven_ID"];

$invdoc = mysqli_query($connect, "SELECT * FROM invoice_from_vendors JOIN document_header_purchase USING(Doc_purchase_ID) where Doc_purchase_ID = '$Doc_purchase_ID' ");
$row1 = mysqli_fetch_assoc($invdoc);
$Ref_ID1 = $row1['Ref_ID'];
header("Location:insert_goodreceive.php?id=$Invoice_ven_ID&Doc=$Ref_ID1"); 
//header('Location:select_goodreceive.php');



//$ds = mysqli_fetch_assoc($rs);


/*


$invoice = "
    INSERT invoice_from_vendors SET  
        Doc_purchase_ID = '$Doc_purchase_ID', 
        Invoice_date = '$DayTime',
        PO_date = '$Doc_date';
        Payment_total = '$Grand_total'
      ";
$rs3 = mysqli_query($connect, $invoice);
*/


/*
  mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  mysqli_query($conn, $sql2) or die(mysqli_error($conn));
  mysqli_query($conn, $sql3) or die(mysqli_error($conn));
  mysqli_query($conn, $sql4) or die(mysqli_error($conn));
  exit("<script>window.location = 'good_receive_insert.php?id=$ref_id';</script>");
*/



/*
$ms = "SELECT * FROM stock_material JOIN materials USING(Material_ID)
        JOIN line_item_purchase USING(Material_ID)
        JOIN document_header_purchase ON `document_header_purchase`.`Ref_ID` = `line_item_purchase`.`Doc_purchase_ID`
        
      ";
$rs4 = mysqli_query($connect, $ms);
$row = mysqli_fetch_assoc($rs4);
$doc_id = $row["Doc_purchase_ID"];
$mat_id = $row["Material_ID"];
$sto_id = $row["Stock_ID"];
$hold = $row["Holding"];
$used = $row["used"];
$line = $row["Line_purchase_ID"];
$qty = $row["Quatity"];


$num = $hold+$qty;

$stock = "
      UPDATE stock_material SET 
      Material_ID = '$mat_id',
      Holding = '$num',
      used = $used

      ";
$rs5 = mysqli_query($connect, $stock);
*/
  ?>