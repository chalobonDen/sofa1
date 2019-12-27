<!DOCTYPE html>
<?php
include "connect.php";
$result = mysqli_query($connect, "SELECT * FROM materials JOIN material_good USING(Material_ID) JOIN sofa_finished USING(Sofa_ID) GROUP BY Sofa_ID");

?>
<html>
<head>
<?php include 'header.php' ?>
    <title>Select BOM Of Product</title>
    <link rel="stylesheet" href="styles2.css" >
</head>
<body>
    <section>
        <center>
            <br><br>
            <div class="ipbox_frame">
            <div class="ipbox">
            <h1>Select BOM Of Product.<br><br><br></h1>
            <br>
        <form method="POST" action="show_bom.php">
        <table>
			<tr>
                <td><label><h3>Product :</h3></label></td>
                <td>
                    <select name="Sofa_ID" style="border: 7px white solid">
                        <option value="" disabled selected><-- Please Select Product --></option>
                        <?php
                        while($rows = $result->fetch_assoc())
                        {
                            // $Doc_purchase_ID = PO ID
                            $Sofa_ID = $rows['Sofa_ID'];
                            $Sofa_name = $rows['Sofa_name'];
                            echo "<option value='$Sofa_ID'>$Sofa_name</option>";
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