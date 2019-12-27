<?php
include "connect.php";
$sql= "
    SELECT * FROM `employees` 
    WHERE Employee_ID = '{$_GET["id"]}'
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
    <h1  align="center"><b>Employee View</b></h1><br><br><br>

<br>
<br>
 <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h3>Employee ID : <?=$ds["Employee_ID"]?></h3>
            <h3>Employee name : <?=$ds["Employee_name"]?></h3> 
          </div>
        </div>
        <div class="w3-container">
          <p><i></i>Gender : <?=$ds["Gender"]?></p>
          <p><i></i></i>Address : <?=$ds["Address"]?></p>
          <p><i></i></i>City : <?=$ds["City"]?></p>
          <p><i></i>Country : <?=$ds["Country"]?></p>
          <p><i></i>Telephone : <?=$ds["Telephone"]?></p>
          <p><i></i></i>Email : <?=$ds["Email"]?></p>
         
          <hr>

      </div>
      

 </div>
 <center><br><br>
 <a href="empList.php" class="genric-btn danger radius"><i style='font-size:27px'></i>BACK</a>
 </center><br><br>
</div>
