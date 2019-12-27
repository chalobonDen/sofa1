
<?php 
  
  //$mysqli = NEW MySQLi('127.0.0.1:3307','root','','project_sofa');
  include "connect.php";
  $resultVendor = mysqli_query($connect, "SELECT * FROM vendors");
  $resultEmployee = mysqli_query($connect, "SELECT * FROM employees");
  $resultdocument_type = mysqli_query($connect, "SELECT * FROM document_type");

?>

<html>
<body>
      <table>
          <form method="POST" action="save_pr.php">

                  <td><label>Vendor:</label></td>
                  <td>
                      <select name="vendors">
                          <option value=""><-- Please Select vendor --></option>
                          <?php
                          while($rows = $resultVendor->fetch_assoc())
                          {
                              $Vendor_ID = $rows['Vendor_ID'];
                              $Vendor_name = $rows['Vendor_name']; 
                              echo "<option value='$Vendor_ID'>$Vendor_name</option>";
                          }
                          ?>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td><label>Employee:</label></td>
                  <td>
                      <select name="employees">
                          <option value=""><-- Please Select employee --></option>
                          <?php
                          while($rows = $resultEmployee->fetch_assoc())
                          {
                              $Employee_ID = $rows['Employee_ID'];
                              $Employee_name = $rows['Employee_name']; 
                              echo "<option value='$Employee_ID'>$Employee_name</option>";
                          }
                          ?>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td><label>Payment term :</label></td>
                  <td><input type="text" name="payment" style="width:270px;"></td>
              </tr>
              <tr>
                  <td><label>Ship term :</label></td>
                  <td><input type="text" name="Ship_term" style="width:270px;"></td>
              </tr>
              <tr>
                  <td><label>Description :</label></td>
                  <td><input type="text" name="Doc_Description" style="width:270px;"></td>
              </tr>
              <tr>
                  <td>
                      <button class="genric-btn danger circle arrow">SAVE DOCUMENT<span class="lnr lnr-arrow-right"></span></button>
                  </td>
              </tr>
          </form>
      </table>
  </body>
</html>