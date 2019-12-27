<?php 
include 'connect.php';
$Sofa_name = $_POST['Sofa_name'];
$Sofa_color = $_POST['Sofa_color'];
$Types = $_POST['Types'];
$Material_ID = $_POST['Material_ID'];
$Price = $_POST['Price'];
$Sofa_Des = $_POST['Sofa_Des'];

$sofa = "
INSERT sofa_finished SET 
Sofa_name = '$Sofa_name',
Sofa_color = '$Sofa_color',
Types = '$Types',
Price = '$Price',
Sofa_Des = '$Sofa_Des'
  ";
mysqli_query($connect, $sofa) or die(mysqli_error($connect));



$sql1 = "SELECT Sofa_ID FROM sofa_finished WHERE Sofa_ID = (SELECT MAX(Sofa_ID) FROM sofa_finished)";
$result1 = mysqli_query($connect, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$Sofa_ID = $row1["Sofa_ID"];
/*
for($i=1;$i<15;$i++) {
}
*/
    $mg1 = "
     INSERT material_good SET 
     Sofa_ID = '$Sofa_ID',
     Material_ID = '1'
       ";
 mysqli_query($connect, $mg1);
 
 $mg2 = "
 INSERT material_good SET 
 Sofa_ID = '$Sofa_ID',
 Material_ID = '2'
   ";
mysqli_query($connect, $mg2);

$mg3 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '3'
  ";
mysqli_query($connect, $mg3);

$mg4 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '4'
  ";
mysqli_query($connect, $mg4);

$mg5 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '5'
  ";
mysqli_query($connect, $mg5);

$mg6 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '6'
  ";
mysqli_query($connect, $mg6);

$mg7 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '7'
  ";
mysqli_query($connect, $mg7);

$mg8 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '8'
  ";
mysqli_query($connect, $mg8);

$mg9 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '9'
  ";
mysqli_query($connect, $mg9);

$mg10 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '10'
  ";
mysqli_query($connect, $mg10);

$mg11 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '11'
  ";
mysqli_query($connect, $mg11);

$mg12 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '12'
  ";
mysqli_query($connect, $mg12);

$mg13 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '13'
  ";
mysqli_query($connect, $mg13);

$mg14 = "
INSERT material_good SET 
Sofa_ID = '$Sofa_ID',
Material_ID = '14'
  ";
mysqli_query($connect, $mg14);


// เลือก materials ว่าทำด้วยหนังหรือผ้า
 $mg15 = "
 INSERT material_good SET 
 Sofa_ID = '$Sofa_ID',
 Material_ID = '$Material_ID'
   ";
 mysqli_query($connect, $mg15);

header('Location:showInsertNewSofa.php'); 
?>