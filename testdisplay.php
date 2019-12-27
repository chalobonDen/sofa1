<?php
require_once "connect.php";

$userQuery = "SELECT * FROM `document_header_purchase` JOIN `vendors` using(Vendor_ID)
                where `Doc_type_ID` = 1 and status=1
                order by Doc_purchase_ID ";
$result = mysqli_query($connect, $userQuery);

if (!$result)
{
 die ("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

if (mysqli_num_rows($result) == 0)
{
 echo "No records were found with query $userQuery";
}

else {
	echo "";
	echo "<table border = \"1\">";
	echo "<tr><th>PR ID</th><th>Vendor name</th><th>Add Material</th></tr>";
	while ($row = mysqli_fetch_assoc($result))
	{
	echo "<tr><td>".$row['Doc_purchase_ID']."</td><td>"
	.$row['Vendor_name']."</td><td>"
	;
	}
	echo "</table>";
	}
mysqli_close($connect); 

?>