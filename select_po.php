<!DOCTYPE html>
<?php
include "connect.php";
$resultdocument = mysqli_query($connect, "SELECT * FROM document_header_purchase where `Doc_type_ID` = 2 and status=0 and mod(`Ref_ID`,2)=1");

?>
<html>
<head>
<?php include 'header.php' ?>
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
        <form method="POST" action="show_po.php">
		<table>
            <tr>
                <td><label><h3>PO ID :</h3></label></td>
                <td>
                    <select name="Doc_purchase_ID" style="border: 7px white solid">
                        <option value="" disabled selected><-- Please Select PO --></option>
                        <?php
                        while($rows = $resultdocument->fetch_assoc())
                        {
                            // $Doc_purchase_ID = PO ID
                            $Doc_purchase_ID = $rows['Doc_purchase_ID'];
                            echo "<option value='$Doc_purchase_ID'>$Doc_purchase_ID</option>";
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