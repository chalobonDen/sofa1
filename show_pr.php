<?
//include "connect.php";
// UPDATE ตาราง document_header_purchase ที่ Status=0 เปลี่ยนเป็น=1
//$Doc_purchase_ID = $_POST['Doc_purchase_ID'];

//$SQL1 = " UPDATE `document_header_purchase` SET `Status` = 1 WHERE `Status` = 0 AND `Doc_purchase_ID` = '{$_POST['Doc_purchase_ID']}'   ";
//$sql = "SELECT * FROM `document_header_purchase` JOIN `materials`  where `Doc_purchase_ID` = '$Doc_purchase_ID' "
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Show PR.</title>
        <link rel="stylesheet" href="showInfo.css" >
    </head>
        <body>
            <?php 
            // การเปลี่ยนสถานะจาก 0 เป็น 1  -  UPDATE ตาราง document_header_purchase ที่ Status=0 เปลี่ยนเป็น=1
            // ต้องเอาไปไว้หลังจาก กด อนุมัติ
            /*
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
            */ 
            // ---------------------------------------------------------------------------------

            // เริ่มทำเอกสาร PR
            include "connect.php";
            $Doc_purchase_ID = $_POST['Doc_purchase_ID'];
            $sql1 = "SELECT * FROM `document_header_purchase` 
                    JOIN `line_item_purchase` USING(`Doc_purchase_ID`)
                    JOIN `materials` USING(`Material_ID`)
                    WHERE `Doc_purchase_ID` = $Doc_purchase_ID
                    AND mod(`Line_purchase_ID`,2)=1
                    ORDER BY `Material_ID` ";
            $result1 = mysqli_query($connect, $sql1);
                //$row1 = mysqli_fetch_assoc($result1);

                $sql2 = " SELECT * FROM org_data ";
                $result2 = mysqli_query($connect, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $sql3 = "SELECT * FROM `vendors` 
                            JOIN `document_header_purchase` USING(Vendor_ID) 
                            JOIN `employees` USING(Employee_ID)
                            WHERE `Doc_purchase_ID` = $Doc_purchase_ID ";
                $result3 = mysqli_query($connect, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                
                
?>

<!--================ Web Page =================-->
<body>
    <div class="showInfo">
        <center>
            <tr class="top">
                <td colspan="2">
                    <table id="t01">
                        <tr>
                            <td class="title">
                                <img src="img/images.png" style="width:200px; height: :200px;">
                            </td>
                            
                            <td class="r">
                                <br>
                                <h1>Purchase Requisition</h1>
                                <br>
                                <b>Purchase Requisition ID :</b> PR#00<?=$row3["Doc_purchase_ID"]?><br>
                                <b>Created :</b> <?=$row3["Doc_date"]?><br>
                                <b>Vendor ID :</b> <?=$row3["Vendor_ID"]?>
                            </td>
                        </tr>             
                </td>
            </tr>
                </table>

            <br>
            <tr class="information">
                <td colspan="2">
                    <table id="t02">
                        <tr>
                            <td id="Address">
                                <b>Vendor :</b><br>
                                <?=$row3["Vendor_name"]?><br>
                                <?=$row3["Address"]?>,<?=$row3["City"]?><br>
                                <?=$row3["Email"]?><br>
                                Tel. <?=$row3["Telephone"]?>
                            </td>
                            
                            <td class="r" id="Address">
                                <b>Ship To :</b><br>
                                <?=$row2["Org_name"]?><br>
                                <?=$row2["Address"]?>,<?=$row2["City"]?>,<?=$row2["Country"]?><br>
                                <?=$row2["Email"]?><br>
                                Tel. <?=$row2["Telephone"]?>
                            </td>
                        </tr>
                    
                </td>
            </tr>
            </table>
            <br>

            <table id="t03" border="1" bordercolor="#ddd">
            <tr class="heading">
                <th>
                    Payment Term
                </th>
                <th class="r">
                    Ship Term
                </th>
            </tr>
            
            <tr class="details">
                <td>
                    <?=$row3["Payment_terms"]?>
                </td>
                <td class="r">
                    <?=$row3["Ship_term"]?>
                </td>
            </tr>
            </table>

            <br>

            <table cellpadding="0" cellspacing="0" id="t04" border="1" bordercolor="#ddd">
            <tr class="heading" style="text-align: center;">
                <th>Material ID</th>
                <th>Material Name</th>
                <th>Material Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        
            <?php 
                $cal=0; 
                while ($row1 = mysqli_fetch_assoc($result1)) { 
            ?>
			<tr>
            <tr class="item">
                <td><?=$row1["Material_ID"]?></td>
                <td><?=$row1["Material_name"]?></td>
                <td><?=$row1["Material_Des"]?></td>
                <td><?=$row1["Quatity"]?></td>
                <td><?=$row1["PricePerUnit"]?></td>
                <td><?=$row1["Total_price"]?></td>
            </tr>
            <?php 
                $cal+=$row1["Total_price"]; 
                } 
            ?>

<? 
            
            mysqli_close($connect);
?>

            </table>
                    <br>
                    <div class="tableSum">
                    <table id="t05" border="1" bordercolor="#ddd">
                        <tr>        
                            <th class="sum">Subtotal</th>
                            <td class="sum1 r"><?=$cal?></td>
                        </tr>
                        
                        <tr>
                            <th class="sum">Discount</th>
                            <td class="sum1 r">0</td>
                        </tr>

                        <tr>
                            <th class="sum">TAX 7%</th>
                            <td class="sum1 r">INCLUDE</td>
                        </tr>

                        <tr>
                            <th class="sum">Shipping Fees</th>
                            <td class="sum1 r">INCLUDE</td>
                        </tr>

                        <tr>
                            <th class="sum">GRAND Total</th>
                            <td class="sum1 r"><?=$cal?></td>
                        </tr>

        </table>
        </div>


        <form method="POST" action="approve.php">
            <input name="Grand_total" type="hidden" value="<?=$cal?>" readonly>
            <input name="Doc_purchase_ID" type="hidden" value="<?=$row3["Doc_purchase_ID"]?>" readonly>
            <input name="Vendor_ID" type="hidden" value="<?=$row3["Vendor_ID"]?>" readonly>
            <input name="Employee_ID" type="hidden" value="<?=$row3["Employee_ID"]?>" readonly>
            <input name="Doc_date" type="hidden" value="<?=$row3["Doc_date"]?>" readonly>
            <input name="Ship_term" type="hidden" value="<?=$row3["Ship_term"]?>" readonly>
            <input name="Doc_Description" type="hidden" value="<?=$row3["Doc_Description"]?>" readonly>
            <input name="Payment_terms" type="hidden" value="<?=$row3["Payment_terms"]?>" readonly>
            <br><br>
            <button></i>Approve</button>
        </form>
        <br><br>
        </center>
    </div>
</body>
</html>