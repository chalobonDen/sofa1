<?
//include "connect.php";
// UPDATE ตาราง document_header_purchase ที่ Status=0 เปลี่ยนเป็น=1
//$Doc_purchase_ID = $_POST['Doc_purchase_ID'];

//$SQL1 = " UPDATE `document_header_purchase` SET `Status` = 1 WHERE `Status` = 0 AND `Doc_purchase_ID` = '{$_POST['Doc_purchase_ID']}'   ";
//$sql = "SELECT * FROM `document_header_purchase` JOIN `materials`  where `Doc_purchase_ID` = '$Doc_purchase_ID' "
?>
<html>
    <head>
        <title>PHP</title>
    </head>
        <body>
            <?php 
                include "connect.php";
                $Doc_purchase_ID = $_POST['Doc_purchase_ID'];
                $Query = "UPDATE `document_header_purchase` SET `Status` = 1 
                                WHERE `Status` = 0 AND `Doc_purchase_ID` = $Doc_purchase_ID ";


                $result = mysqli_query($connect, $Query);

                if (!$result)
                {
                    die ("Could not successfully run the query $Query ".mysqli_error($connect));
                }
                else
                {
                    echo "Update successfully.<br><b>";
                    //echo "<a href='display-member.php'>Display member</a><br><br>";
                }



?>
        </body>
</html>