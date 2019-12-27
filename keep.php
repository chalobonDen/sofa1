<html>
    <head>
        <title></title>
    </head>
        <body>
<?php 
            include "connect.php";
            $Sofa_ID = $_POST['Sofa_ID'];
            $sql1 = "SELECT * FROM sofa_finished JOIN material_good USING(Sofa_ID) 
                        JOIN materials USING(Material_ID) WHERE `sofa_finished`.`Sofa_ID` = '$Sofa_ID'
                        AND materials.`Type_Mat` = 'External' ";
            $result1 = mysqli_query($connect, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT * FROM materials WHERE Type_Mat = 'External' ";
            $result2 = mysqli_query($connect, $sql2);
           // $row2 = mysqli_fetch_assoc($result2);
                         
?>

<body>
    <div class="invoice-box">
        <form method="POST" action="save_change_mat.php">
            <tr class="top">
                <td colspan="2">
                
                    <table>
                        <tr>                           
                            <td class="r">
                                <br>
                                <h1>Change Product</h1>
                                <br>
                                <input type="hidden" name="Sofa_ID" value="<?=$row1["Sofa_ID"]?>">
                                <b>Sofa ID :</b> <?=$row1["Sofa_ID"]?><br>
                                <b>Sofa Name :</b> <?=$row1["Sofa_name"]?><br>
                                <b>Sofa color :</b> <?=$row1["Sofa_color"]?><br>
                                <b>Material :</b> <?=$row1["Material_name"]?><br>
                            </td>
                        </tr>
                        
                    </table>
                    <table>
                    <tr>
                            <td><b><label>Change Material :</label><b></td>
                            <td>
                                <select name="Material_ID">
                                <option value=""><-- Please Select Material --></option>
                                
                                <?php
                                    while($row2 = $result2->fetch_assoc())
                                    {
                                        $Material_ID = $row2['Material_ID'];
                                        $Material_name = $row2['Material_name'];
                                        echo "<option value='$Material_ID'>$Material_name</option>";
                                    }
                                ?>
                                </select>
                            </td>
                    </tr>
                    </table>
                </td>
            </tr>
			<tr>
                <td>
                <input type="submit" value="Change Material">
                </td>
            </tr>
        </form>
<? 
            
            mysqli_close($connect);
?>


        </body>
</html>