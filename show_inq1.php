<!DOCTYPE html>
<html>
    <head>
        <title>Inquiry</title>
        <link rel="stylesheet" href="showInfo.css" >
    </head>
        <body>
            <?php 

            // เริ่มทำเอกสาร INQ
            include "connect.php";
            $Doc_sale_ID = $_GET["id"] ;
            $sql1 = "SELECT * FROM `document_header_sale` 
                    JOIN `line_item_sales` USING(`Doc_sale_ID`)
                    JOIN `sofa_finished` USING(`Sofa_ID`)
                    WHERE `Doc_sale_ID` = '{$_GET["id"]}'
                    AND mod(`Doc_sale_ID`,2)=1
                    ORDER BY `Sofa_ID` ";
            $result1 = mysqli_query($connect, $sql1);

                $sql2 = " SELECT * FROM org_data ";
                $result2 = mysqli_query($connect, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $sql3 = "SELECT * FROM `customers` JOIN `document_header_sale` USING(Customer_ID) WHERE `Doc_sale_ID` = '{$_GET["id"]}'";
                $result3 = mysqli_query($connect, $sql3);
                $row3 = mysqli_fetch_assoc($result3);

                $sql4 = "SELECT * FROM `employees` JOIN `document_header_sale` USING(Employee_ID)";
                $result4 = mysqli_query($connect, $sql4);
                $row4 = mysqli_fetch_assoc($result4);

                $sql5 = "SELECT * FROM `document_header_sale` 
                JOIN `line_item_sales` USING(`Doc_sale_ID`)
                JOIN `sofa_finished` USING(`Sofa_ID`)
                WHERE `Doc_sale_ID` = '{$_GET["id"]}'
                AND mod(`Doc_sale_ID`,2)=1";
                $result5 = mysqli_query($connect, $sql5);
                $row5 = mysqli_fetch_assoc($result5);
                
                
?>

<!--================ Web Page =================-->


<body>
    <div class="showInfo">
        <center>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/images.png" style="width:200px; height: :200px;">
                            </td>
                            
                            <td class="r">
                                <br>
                                <h1>Inquiry</h1>
                                <br>
                                <b>Inquiry ID :</b> INQ#00<?=$row5["Doc_sale_ID"]?><br>
                                <b>Created :</b> <?=$row5["Doc_date"]?><br>
                            </td>
                        </tr>
                </td>
            </tr>

            </table>

            <br>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>

                            <td id="Address">
                                <b>Customer :</b><br>
                                <?=$row3["Customer_name"]?><br>
                                <?=$row3["Address_bill"]?><br>
                                <?=$row3["Email_bill"]?><br>
                                Tel. <?=$row3["Telephone_bill"]?>
                            </td>
                            
                            <td class="r" id="Address">
                                <b>To :</b><br>
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
                <th>
                    Delivery Date
                </th>
            </tr>
            
            <tr class="details">
                <td>
                    <?=$row5["Payment_terms"]?>
                </td>
                <td class="r">
                    <?=$row5["Ship_term"]?>
                </td>
                <td class="r">
                    <?=$row5["Delivery_date"]?>
                </td>
            </tr>
            </table>

            <br>

            <table cellpadding="0" cellspacing="0" id="t04" border="1" bordercolor="#ddd">
            <tr class="heading" style="text-align: center;">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product color</th>
                <th>Priduct Description</th>
                <th>Quantity</th>

            </tr>
        
            <?php 
                $cal=0; 
                while ($row1 = mysqli_fetch_assoc($result1)) { 
            ?>
			<tr>
            <tr class="item">
                <td><?=$row1["Sofa_ID"]?></td>
                <td><?=$row1["Sofa_name"]?></td>
                <td><?=$row1["Sofa_color"]?></td>
                <td><?=$row1["Sofa_Des"]?></td>
                <td><?=$row1["Quatity"]?></td>
            </tr>
            <?php 
                $cal+=$row1["Total_price"]; 
                } 
            ?>

<? 
            
            mysqli_close($connect);
?>
           </table>
                    <form method="POST" action="approve_inq.php">
                        <input name="Grand_total" type="hidden" value="<?=$cal?>" readonly>
                        <input name="Doc_sale_ID" type="hidden" value="<?=$Doc_sale_ID?>" readonly>
                        <input name="Customer_ID" type="hidden" value="<?=$row3["Customer_ID"]?>" readonly>
                        <input name="Delivery_date" type="hidden" value="<?=$row5["Delivery_date"]?>" readonly>
                        <input name="Employee_ID" type="hidden" value="<?=$row4["Employee_ID"]?>" readonly>
                        <input name="Ship_term" type="hidden" value="<?=$row5["Ship_term"]?>" readonly>
                        <input name="Doc_Description" type="hidden" value="<?=$row5["Doc_Description"]?>" readonly>
                        <input name="Payment_terms" type="hidden" value="<?=$row5["Payment_terms"]?>" readonly>
                        <br><br>
                        <button>Approve</button>
                    </form>
                <br><br>
                </center>
        </div>
</body>
</html>