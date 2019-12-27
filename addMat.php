<?php
session_start();  
include "connect.php";

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
							<h3>Nature <br />Photoshoot</h3>
							<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
							<a class="main_btn" href="productList.php">Our Product</a>
						</div>
					</div>
				</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
		<!--================Home Blog Area =================-->
		
<?php
include "connect.php";
$resultMaterial = mysqli_query($connect, "SELECT * FROM materials");
$resultdocument = mysqli_query($connect, "SELECT * FROM document_header_purchase where `Doc_type_ID` = 1 and status=0 and mod(`Doc_purchase_ID`,2)=1");

?>
<center>
<br><br>
<div class="Add Material">
<h1>Add Material</h1>
<br>
    <table>
        <form method="POST" action="save_pr_mat.php">
			<tr>
                <td><label>PR ID :</label></td>
                <td>
                    <select name="Doc_purchase_ID">
                        <option value=""><-- Please Select PR --></option>
                        <?php
                        while($rows = $resultdocument->fetch_assoc())
                        {
                            $Doc_purchase_ID = $rows['Doc_purchase_ID'];
                            echo "<option value='$Doc_purchase_ID'>$Doc_purchase_ID</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
			
			
		  	<tr>
                <td><label>Material :</label></td>
                <td>
                    <select name="Material_ID">
                        <option value=""><-- Please Select material --></option>
                        <?php
                        while($rows = $resultMaterial->fetch_assoc())
                        {
                            $Material_ID = $rows['Material_ID'];
                            $Material_name = $rows['Material_name']; 
                            echo "<option value='$Material_ID'>$Material_name</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Quatity :</label></td>
                <td><input type="number" name="Quatity" style="width:270px;"></td>
			</tr>
            <tr>
                <td><label>PricePerUnit :</label></td>
                <td><input type="number" name="PricePerUnit" style="width:270px;"></td>
			</tr>
			<tr>
                <td>
                    <button class="genric-btn danger circle arrow">ADD<span class="lnr lnr-arrow-right"></span></button>
                </td>
            </tr>
        </form>
    </table>
</div>	
</center>

        <!--================End Home Blog Area =================-->
        
        <!--================Service Area =================-->
        <section class="service_area p_120">
        	<div class="container box_1620">
        		<div class="main_title">
        			<h2>Services Offered by Us</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="row m0 service_inner">
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-1.jpg" alt="">
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Spreading <br />Peace to world</h4>
        					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-2.jpg" alt="">
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Spreading <br />Peace to world</h4>
        					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Spreading <br />Peace to world</h4>
        					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-3.jpg" alt="">
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Spreading <br />Peace to world</h4>
        					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-4.jpg" alt="">
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Service Area =================-->
        
        <!--================Feedback Area =================-->
        <section class="feedback_area pad_bt">
        	<div class="container">
        		<div class="feedback_inner p_100">
        			<div class="row">
        				<div class="col-lg-5">
        					<div class="feedback_text">
        						<h3>Client’s Feedback</h3>
        						<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderitin.</p>
        					</div>
        				</div>
        				<div class="col-lg-7">
							<div class="testi_slider_inner">
								<div class="testi_slider owl-carousel">
									<div class="item">
										<div class="media">
											<div class="d-flex">
												<img src="img/testimonials/testi-1.jpg" alt="">
											</div>
											<div class="media-body">
												<p>“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware”.</p>
												<h4>Mark Alviro Wiens</h4>
												<h5>CEO at Google</h5>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="media">
											<div class="d-flex">
												<img src="img/testimonials/testi-1.jpg" alt="">
											</div>
											<div class="media-body">
												<p>“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware”.</p>
												<h4>Mark Alviro Wiens</h4>
												<h5>CEO at Google</h5>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="media">
											<div class="d-flex">
												<img src="img/testimonials/testi-1.jpg" alt="">
											</div>
											<div class="media-body">
												<p>“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware”.</p>
												<h4>Mark Alviro Wiens</h4>
												<h5>CEO at Google</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Feedback Area =================-->
        
        <!--================Instagram Area =================-->
        <section class="instagram_area">
        	<div class="container box_1620">
        		<div class="insta_btn">
        			<a class="btn theme_btn" href="#">Follow us on instagram</a>
        		</div>
        		<div class="instagram_image row m0">
        			<a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a>
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
        						<h3>About Me</h3>
        					</div>
        					<p>Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills,</p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
        					<div class="f_title">
        						<h3>Newsletter</h3>
        					</div>
        					<p>Stay updated with our latest trends</p>
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
        						<h3>Follow Me</h3>
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