<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <link rel="stylesheet" href="show_bom.css" >
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    </head>
        <body>
            <?php 
            include "connect.php";
            $Sofa_ID = $_POST['Sofa_ID'];
            $sql1 = "SELECT * FROM materials 
                    JOIN material_good USING(Material_ID) 
                    JOIN sofa_finished USING(Sofa_ID)
                    WHERE `material_good`.`Sofa_ID` = $Sofa_ID
                    ORDER BY `Material_ID` ";
            $result1 = mysqli_query($connect, $sql1);
                //$row1 = mysqli_fetch_assoc($result1);
  
?>

<!--================ Web Page =================-->
<br><br>
    <center>
            <td class="title">
                <img src="img/logoNew.png" style="width:350px; height: :350px;">
            </td>

    <table  bgcolor="#fff" class="Head">
        <thead>
    		<tr>
    			<th>ITEM NO</th>
    			<th>MATERIAL NAME</th>
    			<th>DESCRIPTION</th>
    			<th>QTY</th>
                <th>TYPE</th>
    		</tr>
        </thead>
        <tbody>
    		<?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>

    			<tr><div class="showBom">
    				<td><?=$row1['Material_ID'];?></td>
    				<td><?=$row1['Material_name'];?></td>
    				<td><?=$row1['Material_Des'];?></td>
                    <td>1</td>
    				<td><?=$row1['Type_Mat'];?></td>
    		<?php } ?>		
    		    </tr>
    		<br>
        </tbody>
    	</table>
    </center>
    </div> 
    <br><br>
<?php

mysqli_close($connect);
?>