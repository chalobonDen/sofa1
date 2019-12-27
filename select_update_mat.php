<?php
include "connect.php";
$userQuery = "SELECT * FROM `materials`";
$result = mysqli_query($connect, $userQuery);
if (!$result)
{
	die ("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

?>
<center>
<br><br>
<div>
<h1>Select Your Invoice</h1>
<br>
    <table>
        <form method="POST" action="show_invoice_ven.php">
			<tr>
                <td><label>Invoice ID :</label></td>
                <td>
                    <select name="Doc_purchase_ID">
                        <option value=""><-- Please Select Invoice --></option>
                        <?php
                        while($rows = $result->fetch_assoc())
                        {
                            $Doc_purchase_ID = $rows['Doc_purchase_ID'];
                            $Invoice_ven_ID = $rows['Invoice_ven_ID'];
                            echo "<option value='$Doc_purchase_ID'>PO ID = $Doc_purchase_ID | Invoice ID = $Invoice_ven_ID</option>";
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