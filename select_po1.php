<?
/*
// UPDATE ตาราง document_header_purchase ที่ Status=0 เปลี่ยนเป็น=1
$SQL1 = " UPDATE `document_header_purchase` SET `Status` = 0 WHERE `Status` = 1 ";
*/
?>

<?php
include "connect.php";
$resultdocument = mysqli_query($connect, "SELECT * FROM document_header_purchase where `Doc_type_ID` = 2 and status=0 and mod(`Ref_ID`,2)=1");

?>

<center>
<br><br>
<div>
<h1>Select Your PO</h1>
<br>
    <table>
        <form method="POST" action="show_po.php">
			<tr>
                <td><label>PO ID :</label></td>
                <td>
                    <select name="Doc_purchase_ID">
                        <option value=""><-- Please Select PO --></option>
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
			<tr>
                <td>
                    <button class="genric-btn danger circle arrow">Select<span class="lnr lnr-arrow-right"></span></button>
                </td>
            </tr>
        </form>
    </table>
</div>	
</center>