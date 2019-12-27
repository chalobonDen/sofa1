<!DOCTYPE html>
<?php
include "connect.php";
$resultdocument = mysqli_query($connect, "SELECT * FROM invoice_from_vendors where `status` = 1");

?>
<html>
<head>
<?php include 'header.php' ?> 
    <title>Select Invoice</title>
    <link rel="stylesheet" href="styles2.css" >
</head>
<body>
    <section>
        <center>
            <br><br>
            <div class="ipbox_frame">
            <div class="ipbox">
            <h1>Select Your Invoice.<br><br><br></h1>
            <br>
        <form method="POST" action="show_invoice_ven.php">
        <table>
            <tr>
                <td><label><h3>Invoice ID :</h3></label></td>
                <td>
                    <select name="Doc_purchase_ID" style="border: 7px white solid">
                        <option value="" disabled selected><-- Please Select Invoice --></option>
                        <?php
                        while($rows = $resultdocument->fetch_assoc())
                        {
                            $Doc_purchase_ID = $rows['Doc_purchase_ID'];
                            $Invoice_ven_ID = $rows['Invoice_ven_ID'];
                            echo "<option value='$Doc_purchase_ID'>PO ID = $Doc_purchase_ID | Invoice ID = $Invoice_ven_ID</option>";
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