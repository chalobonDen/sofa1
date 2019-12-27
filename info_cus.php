<?php
include "connect.php";
$sql= "
    SELECT * FROM `customers` JOIN cus_type USING(Cus_type)
    WHERE Customer_ID = '{$_GET["id"]}'
  ";
  
$rs = mysqli_query($connect, $sql);
$ds = mysqli_fetch_assoc($rs);
?>

<?php include 'header.php' ?>

<!DOCTYPE html>
<html>
    <head>
        <title>customer</title>
        <link rel="stylesheet" href="info.css" >
    </head>
<body>
  <section>
    <br><br>
        <div class="ipbox_frame">
        <div class="ipbox">

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->

<!-- !LIST! -->

<!-- Header -->
    <h1  align="center"><b>Customer View</b></h1><br><br><br>

<br>
<br>
 <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h3>Customer ID : <?=$ds["Customer_ID"]?></h3>
            <h3>Customer name : <?=$ds["Customer_name"]?></h3><br>
          </div>
        </div>
        <div class="w3-container">
          <p><i></i>Address bill : <?=$ds["Address_bill"]?></p>
          <p><i></i></i>Telephone bill : <?=$ds["Telephone_bill"]?></p>
          <p><i></i>Email bill : <?=$ds["Email_bill"]?></p>
          <p><i></i></i>Address ship : <?=$ds["Address_ship"]?></p>
          <p><i></i>Telephone ship : <?=$ds["Telephone_ship"]?></p>
          <p><i></i></i>Email ship : <?=$ds["Email_ship"]?></p>
          <p><i></i></i>Customer type : <?=$ds["Cus_type_name"]?></p>
         
          <hr>

      </div>
      

 </div>
      <center><br><br>
          <a href="cusList.php" class="genric-btn danger radius"><i style='font-size:27px'></i>BACK</a>
      </center>
</div>
</div>
    <script >
       backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)'
          ],
    </script>
  </section>
</body>
