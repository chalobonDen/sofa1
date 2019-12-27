<?
$doc = " SELECT * FROM document_header_sale WHERE Doc_sale_ID = '{$_GET["id"]}' ";
$select_doc = mysqli_query($connect, $doc) or die(mysqli_error($connect));
$doc_sale = mysqli_fetch_assoc($select_doc);

$sale = " SELECT line_item_sales WHERE Doc_sale_ID = '{$_GET["id"]}' ";
$select_sale = mysqli_query($connect, $sale) or die(mysqli_error($connect));


$stock = " SELECT * FROM stock_sofa ";
$select_stock = mysqli_query($connect, $stock) or die(mysqli_error($connect));




mysqli_data_seek ($select_sale, 0);
mysqli_data_seek ($select_stock, 0);


$selectSale=mysqli_num_rows($select_sale);
$selectStock=mysqli_num_rows($select_stock);

for($i=0;$i<$selectStock;$i++){
    $ds2 = mysqli_fetch_assoc($rs2);
    $Material_id_Line[$i]=$ds2["Material_id"]; 
    $Quatity[$i]=$ds2["Quatity"];
}       
    for($j=0;$j<$selectStock;$j++){
      $ds3 = mysqli_fetch_assoc($rs3);
      $Material_id_St[$j]=$ds3["Material_id"]; 
      $holding[$j]=$ds3["holding"];
      $selling[$j]=$ds3["selling"];
}


for($i=0;$i<$selectStock;$i++){
      
    for($j=0;$j<$selectStock;$j++){
      
     if($Material_id_Line[$i]==$Material_id_St[$j]){
            
            $sum[$j]=$Quatity[$i]+$selling[$j];
            $cut[$j]=$holding[$j]-$Quatity[$i];
          $sql1 = "
                    UPDATE stock SET 
                      holding= '$cut[$j]',
                      selling= '$sum[$j]'
                      where Material_id = '$Material_id_Line[$i]'
                      ";  
                      
          mysqli_query($conn, $sql1) or die(mysqli_error($conn)); 
} 
         
  }
}
?>