<?php 
include 'connect.php';

$Sofa_ID = $_POST['Sofa_ID'];
$Material_ID = $_POST['Material_ID'];

$SQL = "
		UPDATE material_good SET
		Material_ID = '$Material_ID'
		WHERE Sofa_ID = '$Sofa_ID' AND mod(`mat_good_ID`,15) = 0
	   ";

mysqli_query($connect, $SQL) or die(mysqli_error($connect));


$result = mysqli_query($connect, $SQL);
						
if (!$result)
{
	die ("Could not successfully run the query $SQL ".mysqli_error($connect));
}
else
{
	echo "successfully.<br><b>";
}


header('Location:showUpdateList.php'); 

?>

