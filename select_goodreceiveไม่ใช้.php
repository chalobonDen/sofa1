<!DOCTYPE html>
<?php
include "connect.php";
$resultdocument = mysqli_query($connect, "SELECT * FROM invoice_from_vendors where `status` is null");
$resultdocument1 = mysqli_query($connect, "SELECT * FROM invoice_from_vendors JOIN document_header_purchase USING(Doc_purchase_ID) where invoice_from_vendors.`status` is null");
?>
<html>
<head>
    <title>Select PO</title>
    <link rel="stylesheet" href="styles2.css" >
</head>
<body>
    <section>
        <center>
            <br><br>
            <div class="ipbox_frame">
            <div class="ipbox">
            <h1>Select Your PO.<br><br><br></h1>
            <br>     
        <form method="POST" action="insert_goodreceive.php">
        <table>
            <tr>
                <td><label><h3>PO ID :</h3></label></td>
                <td>
                    <select name="Invoice_ven_ID" style="border: 7px white solid">
                        <option value="" disabled selected><-- Please Select PO --></option>
                        <?php
                        while($rows = $resultdocument->fetch_assoc())
                        {
                            // $Doc_purchase_ID = PO ID
                            $Invoice_ven_ID = $rows['Invoice_ven_ID'];
                            $Doc_purchase_ID = $rows['Doc_purchase_ID'];
                            echo "<option value='$Invoice_ven_ID'>$Doc_purchase_ID</option>";
                            
                        }
                        ?>
                    </select>
                </td>

                <td>
                    <select name="Ref_ID" style="border: 7px white solid">
                        <option value="" disabled selected><-- Please Select PO --></option>
                        <?php
                        while($rows1 = $resultdocument1->fetch_assoc())
                        {
                            // $Ref_ID = PR ID
                            $Ref_ID = $rows1['Ref_ID'];
                            $Doc_purchase_ID = $rows1['Doc_purchase_ID'];
                            echo "<option value='$Ref_ID'>PR = $Ref_ID | PO = $Doc_purchase_ID</option>";
                            
                        }
                        ?>
                    </select>
                                </td>
                            </tr>
                        </table>             
                        <div class="submit"><center>
                            <button >Select</button></center>
                        </div>                    
                    </form>
            </div>
            </div>
           </center> 
    </section>
</body>
</html>   