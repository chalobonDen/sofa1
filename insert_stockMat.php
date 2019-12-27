<html>
    <head>
        <title>PHP</title>
    </head>
        <body>
            <?php 
            include "connect.php";
            //$Doc_purchase_ID = $_POST['Doc_purchase_ID'];
            $sql1 = "SELECT Material_ID, sum(Qty) as Qty_mat FROM inventory_mat 
                        JOIN stock_material USING(Material_ID) 
                        WHERE mod(`inventoryID`,2)=1
                        GROUP BY Material_ID ";
            $result1 = mysqli_query($connect, $sql1);
 
                while ($row1 = mysqli_fetch_assoc($result1)) { 
        
                    $ud = "
                        UPDATE stock_mat SET holding = $row1[Qty_mat]
                        WHERE Material_ID = $row1[Material_ID]
                          ";
                    $r2 = mysqli_query($connect, $ud);
            
                }
            ?>

<?     
            mysqli_close($connect);
?>




        </body>
</html>