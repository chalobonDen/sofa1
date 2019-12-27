<?php  
include "connect.php";
// mod(`Doc_purchase_ID`,2)=1 -> condition to show PR_ID is odd because this program create duplicate record (แก้ปัญหาเฉพาะหน้า)
$userQuery = "SELECT `document_header_sale`.Doc_sale_ID , Invoice_cus_ID , Customer_name ,Invoice_date , customers.Customer_ID
                FROM customers JOIN `invoice_to_customers` USING(Customer_ID)
                JOIN document_header_sale USING(Doc_sale_ID)
                JOIN `line_item_sales` ON `line_item_sales`.Doc_sale_ID = `document_header_sale`.Ref_ID
                JOIN sofa_finished USING(Sofa_ID)
                WHERE document_header_sale.`Doc_type_ID` = 6
                GROUP BY Ref_ID
                ORDER BY Invoice_date DESC;
";
$result = mysqli_query($connect, $userQuery);

if (!$result)
{
	die ("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/images.png" type="image/png">
        <title>VIVI sofa maker</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="ListPoPr.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
								<li class="nav-item submenu dropdown active">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Document</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="prList.php">Purchase Requisition</a>
										<li class="nav-item"><a class="nav-link" href="poList.php">Purchase Order</a></li>
										<li class="nav-item"><a class="nav-link" href="inv_list_ven.php">Invoice from vendor</a></li>
										<li class="nav-item"><a class="nav-link" href="inqList.php">Inquiry</a></li>
										<li class="nav-item"><a class="nav-link" href="qaList.php">Quotation</a></li>
										<li class="nav-item"><a class="nav-link" href="soList.php">Sale Order</a></li>
										<li class="nav-item"><a class="nav-link" href="invCusList.php">Invoice to customer</a></li>
									</ul>
								</li> 
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PLM</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="select_bom.php">BOM</a></li>
										<li class="nav-item"><a class="nav-link" href="select_change_mat.php">change material</a></li>
										<li class="nav-item"><a class="nav-link" href="addProduct.php">Add product</a></li>
										<li class="nav-item"><a class="nav-link" href="create_sofa.php">create new product</a></li>
									</ul>
								</li> 
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="matList.php">Material</a></li>
										<li class="nav-item"><a class="nav-link" href="inventory_mat_list.php">Stock of Material</a></li>
										<li class="nav-item"><a class="nav-link" href="inventory_sofa_list.php">Stock of Product</a></li>
										<li class="nav-item"><a class="nav-link" href="venList.php">Vendors</a></li>
										<li class="nav-item"><a class="nav-link" href="cusList.php">Customer</a></li>
										<li class="nav-item"><a class="nav-link" href="empList.php">Employee</a></li>
										<li class="nav-item"><a class="nav-link" href="conList.php">Condition</a></li>
									</ul>
								</li>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G/L</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="payable.php">payable</a></li>
										<li class="nav-item"><a class="nav-link" href="receiveable.php">receiveable</a></li>
										<li class="nav-item"><a class="nav-link" href="status.php">status</a></li>
									</ul>
								</li>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Summary</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="graphProduct.php">Product</a></li>
										<li class="nav-item"><a class="nav-link" href="graphCus.php">Customer</a></li>
									</ul>
								</li> 
								<li class="nav-item"><a class="nav-link" href="member.php">Member</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
           	<div class="box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h3>VIVI <br />Sofa Maker</h3>
							<p>If you want a comfortable sofa with luxury style at a price you can touch. Let's explore VIVI sofa maker.</p>
							<a class="main_btn" href="productList.php">Our Product</a>
						</div>
					</div>
				</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Home Blog Area =================-->

<div class="content">
<center>
<div>
    <br><br><br><br><h1><b>Invioce List</b></h1><br><br>
</div> 
	<table border="0" cellpadding="20" bgcolor="#fff" class="PrPoList" >
<thead> 	
		<tr class="w3-blue">
			<th><center>SO ID</center></th>
			<th><center>Invoice ID</center></th>
			<th><center>Customer ID</center></th>
			<th><center>Customer name</center></th>
			<th><center>Invoice_date</center></th>
			<th><center>View</center></th>
			
		</tr>
</thead> 
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr >
                <td><center>SO#00<?=$row["Doc_sale_ID"]?></center></td>
                <td><center>INV#00<?=$row["Invoice_cus_ID"]?></center></td>
                <td><center><?=$row["Customer_ID"]?></center></td>
                <td><center><?=$row["Customer_name"]?></center></td>
                <td><center><?=$row["Invoice_date"]?></center></td>
                <td><center><a href="show_invoice_cus.php?id=<?=$row["Doc_sale_ID"]?>">
                  <i class="genric-btn danger radius" >View</i>
                  </a></center>
                </td>
		<?php } ?>				
			</tr>
	</table>
</center>
<?php

mysqli_close($connect);
?>
        <!--================End Home Blog Area =================-->
     
      
        <!--================Instagram Area =================-->
		<br><br><br><br>
        <section class="instagram_area">
        	<div class="container box_1620">
        		<div class="insta_btn">
        			<a class="btn theme_btn" href="#">Follow us on instagram</a>
        		</div>
        		<div class="instagram_image row m0">
        			<a href="#"><img src="img/sofa/sofa_1.png" alt=""></a>
        			<a href="#"><img src="img/sofa/sofa_2.png" alt=""></a>
        			<a href="#"><img src="img/sofa/sofa_3.png" alt=""></a>
        			<a href="#"><img src="img/sofa/sofa_4.png" alt=""></a>
        			<a href="#"><img src="img/sofa/sofa_5.png" alt=""></a>
        			<a href="#"><img src="img/sofa/sofa_6.png" alt=""></a>
        		</div>
        	</div>
        </section>
        <!--================End Instagram Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>Contact Us</h3>
        					</div>
        					<p>11600  New Chiang Mai Rd. <br/>Khet Amphoe Mueang<br/>Chiang Mai<br/>50200<br/>Thailand</p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Every sofa is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"><br/>VIVI Sofa maker</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
        					<div class="f_title">
        						<h3>Newsletter</h3>
        					</div>
        					<p>Stay updated with our sofa trends</p>
        					<div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                	<div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>				
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
        				</aside>
        			</div>
        			<div class="col-lg-2">
        				<aside class="f_widget social_widget">
        					<div class="f_title">
        						<h3>Follow Us</h3>
        					</div>
        					<p>Let us be social</p>
        					<ul class="list">
        						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
        						<li><a href="#"><i class="fa fa-behance"></i></a></li>
        					</ul>
        				</aside>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>