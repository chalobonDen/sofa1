<?php
include "connect.php";
$Doc_sale_ID = $_POST['Doc_sale_ID'];
$Customer_ID = $_POST['Customer_ID'];
$Employee_ID = $_POST['Employee_ID'];
$Doc_date = $_POST['Doc_date'];
$Ship_term = $_POST['Ship_term'];
$Doc_Description = $_POST['Doc_Description'];
$Payment_terms = $_POST['Payment_terms'];
$Grand_total = $_POST['Grand_total'];
$Ref_ID = $_POST['Ref_ID'];
$Delivery_date = $_POST['Delivery_date'];

// Ref_ID = '$Doc_sale_ID' เลขใบ SO 
$insert_doc = " 
        INSERT document_header_sale SET
        Org_ID = 1,
        Doc_type_ID = 8,
        Customer_ID = '$Customer_ID',
        Employee_ID = '$Employee_ID',
        Doc_date = '$Doc_date',
        Delivery_date = '$Delivery_date',
        Payment_terms = '$Payment_terms',
        Ship_term = '$Ship_term',
        Grand_total = '$Grand_total',
        Ref_ID = '$Doc_sale_ID',
        status_c = 0
       ";
$doc = mysqli_query($connect, $insert_doc);


$update_doc = "
        UPDATE document_header_sale 
        SET status_c=1
        WHERE Doc_sale_ID = '$Doc_sale_ID'
           
         ";
mysqli_query($connect, $update_doc) or die(mysqli_error($connect));

$update_doc = "
        SELECT * FROM document_header_sale  
        WHERE Doc_sale_ID = '$Doc_sale_ID'
         ";
$rs = mysqli_query($connect, $update_doc) or die(mysqli_error($connect));
$up_doc = mysqli_fetch_assoc($rs);

$SOdate = $up_doc['Doc_date'];
// $Doc_sale_ID = เลขใบ SO 
$insert_inv = "
                INSERT invoice_to_customers SET 
                Doc_sale_ID = '$Doc_sale_ID',
                Customer_ID = '$Customer_ID',
                SO_date ='$SOdate',
                Payment_total_c = '$Grand_total'
              ";
mysqli_query($connect, $insert_inv) or die(mysqli_error($connect));

//header('Location:soList.php'); 
header("Location:insert_goodissue1.php?id=$Doc_sale_ID"); 

?>