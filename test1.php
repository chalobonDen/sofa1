<?php 
    include "connect.php";
    $sql1 = "SELECT Sofa_ID FROM sofa_finished WHERE Sofa_ID = (SELECT MAX(Sofa_ID) FROM sofa_finished)";
    $result1 = mysqli_query($connect, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $Sofa_ID = $row1["Sofa_ID"];
    echo $Sofa_ID;
                
                
?>



<? 
            
            mysqli_close($connect);
?>
