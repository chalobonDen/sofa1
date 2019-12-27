<html>
    <head>
        <title>PHP</title>
    </head>
        <body>
            <?php 
            include "connect.php";
            $Doc_sale_ID = $_GET["id"];
            $sql1 = "SELECT `document_header_sale`.Doc_sale_ID , Invoice_cus_ID , Customer_name, Invoice_date 
                        FROM customers JOIN `invoice_to_customers` USING(Customer_ID)
                        JOIN document_header_sale USING(Doc_sale_ID)
                        JOIN `line_item_sales` ON `line_item_sales`.Doc_sale_ID = `document_header_sale`.Ref_ID
                        JOIN sofa_finished USING(Sofa_ID)
                        WHERE document_header_sale.`Doc_type_ID` = 6
                        AND `document_header_sale`.Doc_sale_ID = '$Doc_sale_ID'
                        GROUP BY Ref_ID
                        ORDER BY Invoice_cus_ID
                    ";
            $result1 = mysqli_query($connect, $sql1);
                //$row1 = mysqli_fetch_assoc($result1);

            $data = "SELECT `document_header_sale`.Doc_sale_ID , Invoice_cus_ID , Customer_name ,Invoice_date , customers.Customer_ID, Address_ship, Telephone_ship, Email_ship
                        FROM customers JOIN `invoice_to_customers` USING(Customer_ID)
                        JOIN document_header_sale USING(Doc_sale_ID)
                        JOIN `line_item_sales` ON `line_item_sales`.Doc_sale_ID = `document_header_sale`.Ref_ID
                        JOIN sofa_finished USING(Sofa_ID)
                        WHERE document_header_sale.`Doc_type_ID` = 6
                        GROUP BY Ref_ID
                        ORDER BY Invoice_cus_ID
                    ";
            $result4 = mysqli_query($connect, $data);
            $row4 = mysqli_fetch_assoc($result4);



                $sql2 = " SELECT * FROM org_data ";
                $result2 = mysqli_query($connect, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $sql3 = "SELECT * FROM `customers` 
                            JOIN `document_header_sale` USING(Customer_ID) 
                            JOIN `employees` USING(Employee_ID)
                            WHERE `Doc_sale_ID` = $Doc_sale_ID ";
                $result3 = mysqli_query($connect, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                
                
?>




<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/images.png" style="width:200px; height: :200px;">
                            </td>
                            
                            <td class="r">
                                <br>
                                <h1>Invoice</h1>
                                <br>
                                <b>Invoice ID :</b> IN#00<?=$row4["Invoice_cus_ID"]?><br>
                                <b>Sale Order ID :</b> SO#00<?=$row4["Doc_sale_ID"]?><br>
                                <b>Created :</b> <?=$row4["Invoice_date"]?><br>
                                <b>Customer ID :</b> <?=$row4["Customer_ID"]?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            </table>

            <table cellpadding="0" cellspacing="0">
            <tr class="address company">
                <td colspan="2">
                    <table>
                        <tr>

                            <td>
                                <?=$row2["Org_name"]?><br>
                                <?=$row2["Address"]?>,<?=$row2["City"]?>,<?=$row2["Country"]?><br>
                                <?=$row2["Email"]?><br>
                                Tel. <?=$row2["Telephone"]?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </table>

            <br>
            <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="r">
                                <b>Ship To :</b><br>
                                <?=$row4["Customer_name"]?><br>
                                <?=$row4["Address_ship"]?>,<?=$row2["City"]?>,<?=$row2["Country"]?><br>
                                <?=$row4["Email_ship"]?><br>
                                Tel. <?=$row4["Telephone_ship"]?>
                            </td>
                            <td class="r">
                                <b>Bill To :</b><br>
                                <?=$row4["Customer_name"]?><br>
                                <?=$row4["Address_ship"]?>,<?=$row2["City"]?>,<?=$row2["Country"]?><br>
                                <?=$row4["Email_ship"]?><br>
                                Tel. <?=$row4["Telephone_ship"]?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </table>
            <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    Payment Term
                </td>
                <td class="r">
                    Ship Term
                </td>
                 <td class="r">
                    Delivery Date
                </td>
                
            </tr>
            
            <tr class="details">
                <td>
                    <?=$row3["Payment_terms"]?>
                </td>
                <td class="r">
                    <?=$row3["Ship_term"]?>
                </td>
                <td class="r">
                    <?=$row3["Delivery_date"]?>
                </td>
            </tr>
            </table>

            <br>


            <table cellpadding="0" cellspacing="0">
            <tr class="heading" style="text-align: center;">
                <td>Sofa ID</td>
                <td>Sofa Name</td>
                <td>Sofa Description</td>
                <td>Quantity</td> 
                <td>Price</td>
                <td>Discount</td>
                <td>Total</td>
            </tr>
            
             <?php
            include "connect.php";
            $mat=0;
            $cal=0;
            $sql4="
                SELECT *
                FROM document_header_sale
                JOIN line_item_sales USING (Doc_sale_ID)
                JOIN sofa_finished USING (Sofa_ID)
                WHERE Doc_sale_ID = '$Doc_sale_ID'
                
              ";
              $tempName = array();
              $result= mysqli_query($connect, $sql4)
                or die(mysqli_error($connect));
              $c=mysqli_num_rows($result);  
                if(mysqli_num_rows($result))
            {
              while($row = mysqli_fetch_assoc($result))
              {
                $adis=$row["Total_price"];
                $tt='-';
                if($row["Condition_ID"]==2){
                    $temp=0;
                    $adis=0;
                    $tt=$row["Total_price"]*0.05;
                    $adis=$row["Total_price"]-$tt;
                    $mat=1;
                    array_push($tempName, $row["Sofa_name"]);
                }
                
?>

            <tr class="item">
                <td><?=$row["Sofa_ID"]?></td>
                <td><?=$row["Sofa_name"]?></td>
                <td><?=$row["Sofa_Des"]?></td>
                <td><?=$row["Quatity"]?></td>
                <td><?=$row["PricePerUnit"]?></td>
                <td><?=$tt?></td>
                <td><?=$adis?></td>
            </tr>

            <?php 
                $cal+=$adis;

            ?>
            
<?php
              }
            }else{
              "<tr><td colspan='3'>data not found</td></tr>";
            }
            mysqli_close($connect);
            
            ?>

        </table>
           <br>

            <table>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="sum">Subtotal</td>
                <td class="sum1 r"><?=$cal?></td>
            </tr>
             <?php
            
                    if($row3["Cus_type"]==2){
                            $discount="Discount 10%";
                            $dis=$cal*0.1;
                            $cal-=$dis;
                    }else if($row3["Cus_type"]==1){
                            $discount="Discount 0%";
                            $dis=0;
                            $cal-=$dis;
                     }   
                ?>
                    
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="sum"><?=$discount?></td>
                <td class="sum1 r"><?=$dis?></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="sum">TAX 7%</td>
                <td class="sum1 r">INCLUDE</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="sum">Shipping Fees</td>
                <td class="sum1 r">INCLUDE</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="sum">GRAND Total</td>
               
                <td class="sum1 r"><?=$cal?></td>
            </tr>

            </table>
            <br>
            
                <?php
                 if($row3["Cus_type"]==2){
                           echo "Our company give you 10% for Member"; 
                    } 
                if($mat==1){
                    echo "<br>Our company give you 5% of each Material";
                }

                     ?>
                <br>
            Our company give you 10% per order <br>



            <br><br>
      
    </div>
    
</body>
</html>