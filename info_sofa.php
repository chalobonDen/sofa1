<?php
include "connect.php";
$sql= "
    SELECT * FROM sofa_finished JOIN material_good USING(Sofa_ID) 
    JOIN materials USING(Material_ID)
    WHERE Sofa_ID = '{$_GET["id"]}' AND `Type_Mat` = 'External'
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
    <h1  align="center"><b>Sofa View</b></h1><br><br><br>

<br>
<br>
 <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h3>Sofa ID : <?=$ds["Sofa_ID"]?></h3>
            <h3>Sofa Name : <?=$ds["Sofa_name"]?></h3> 
          </div>
        </div>
        <div class="w3-container">
          <p><i></i>Description : <?=$ds["Sofa_Des"]?></p>
          <p><i></i></i>Type : <?=$ds["Types"]?></p>
          <p><i></i></i>Material : <?=$ds["Material_name"]?></p>
          <hr>
        </div>
     
      

 </div>
 <center><br><br>
 <a href="productList.php" class="genric-btn danger radius"><i style='font-size:27px'></i>BACK</a>
 <br> <br> <br> <br>
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

