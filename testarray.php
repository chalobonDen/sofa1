/*
<?php
include 'connect.php';
$strSql="SELECT holding-used FROM stock_material";
$query = mysqli_query($connect,$strSql);
while($Array = mysqli_fetch_array($query))
{
$array_a = $Array[0];
}
echo "$array_a";
?>
*/

<?php
$rs = mysqli_query($connect, "SELECT holding-used FROM stock_material");
$a = array(); while($row = mysqli_fetch_assoc($rs)) $a[] = $row['holding-used']; //title คือชื่อ column ที่ต้องการข้อมูลมาใส่ใน array

var_dump($a);
echo $a[0];
echo $a[1];
?>