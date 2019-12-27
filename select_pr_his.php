<?
/*
// UPDATE ตาราง document_header_purchase ที่ Status=0 เปลี่ยนเป็น=1
$SQL1 = " UPDATE `document_header_purchase` SET `Status` = 0 WHERE `Status` = 1 ";
*/
?>
<!DOCTYPE html>
<?php
include "connect.php";
$resultdocument = mysqli_query($connect, "SELECT * FROM document_header_purchase where `Doc_type_ID` = 1 and status=1 and mod(`Doc_purchase_ID`,2)=1");

?>
<html>
<head>
<?php include 'header.php' ?> 
      <title> Select PR </title>
      <link rel="stylesheet" href="styles2.css" >
</head>
<body>
  <section>
    <center>
      <br><br>
          <div class="ipbox_frame">
          <div class="ipbox">
          <h1>Select Your PR.<br><br><br></h1>
          <br>
        <form method="POST" action="show_pr_his.php">
            <table>
                <tr>
                    <td><label><h3>PR ID :</h3></label></td>
                    <td>
                    <select name="Doc_purchase_ID">
                        <option value="" disabled selected><-- Please Select PR --></option>
                        <?php
                        while($rows = $resultdocument->fetch_assoc())
                        {
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