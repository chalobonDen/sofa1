<!DOCTYPE html>
<html>
    <head>
        <title>INVOICE</title>
        <link rel="stylesheet" href="showInfo.css" >
    </head>
        <body>

            <?php 
            include "connect.php";
            $Doc_purchase_ID = $_POST['Doc_purchase_ID'];
            $sql1 = "SELECT * FROM `invoice_from_vendors` `inv` JOIN `document_header_purchase` `doc` 
                        USING(Doc_purchase_ID) 
                        JOIN line_item_purchase `l` ON `doc`.Ref_ID = `l`.Doc_purchase_ID
                        JOIN `materials` USING(`Material_ID`)
                        WHERE `inv`.`Doc_purchase_ID` = $Doc_purchase_ID
                        AND mod(`Line_purchase_ID`,2)=1
                        ORDER BY `Material_ID`";
            $result1 = mysqli_query($connect, $sql1);
                //$row1 = mysqli_fetch_assoc($result1);

            $data = "SELECT * FROM `invoice_from_vendors` `inv` JOIN `document_header_purchase` `doc` 
                USING(Doc_purchase_ID) 
                JOIN line_item_purchase `l` ON `doc`.Ref_ID = `l`.Doc_purchase_ID
                JOIN `materials` USING(`Material_ID`)
                WHERE `inv`.`Doc_purchase_ID` = $Doc_purchase_ID
                AND mod(`Line_purchase_ID`,2)=1
                ORDER BY `Material_ID`";
            $result4 = mysqli_query($connect, $data);
            $row4 = mysqli_fetch_assoc($result4);



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
    <br><br>
    <div class="showInfo">
        <center>
            <tr class="top">
                <td colspan="2">
                    <br>
                    <table id="t01">
                        <tr>
                            <td class="title">
                                <img src="img/images.png" style="width:200px; height: :200px;">
                            </td>
                            
                            <td class="r">
                                <br>
                                <h1>Invoice</h1>
                                <br>
                                <b>Invoice ID :</b> IN#00<?=$row4["Invoice_ven_ID"]?><br>
                                <b>Purchase Order ID :</b> PO#00<?=$row4["Ref_ID"]?><br>
                                <b>Created :</b> <?=$row4["Invoice_date"]?><br>
                                <b>Customer ID :</b>529
                            </td>
                        </tr>
                </td>
            </tr>

            </table>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>

                            <td id="Address">
                                <?=$row3["Vendor_name"]?><br>
                                <?=$row3["Address"]?>,<?=$row3["City"]?><br>
                                <?=$row3["Email"]?><br>
                                Tel. <?=$row3["Telephone"]?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </table>

            <br>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="r" id="Address">
                                <b>Ship To :</b><br>
                                <?=$row2["Org_name"]?><br>
                                <?=$row2["Address"]?>,<?=$row2["City"]?>,<?=$row2["Country"]?><br>
                                <?=$row2["Email"]?><br>
                                Tel. <?=$row2["Telephone"]?>
                            </td>
                            <td class="r" id="Address">
                                <b>Bill To :</b><br>
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

            <table  id="t03" border="1" bordercolor="#ddd">
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
            <br><br>
            </div>
        </center>
    </div><br><br>
</body>
</html>