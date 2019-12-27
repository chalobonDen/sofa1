<?php  
include "connect.php";
// mod(`Doc_purchase_ID`,2)=1 -> condition to show PR_ID is odd because this program create duplicate record (แก้ปัญหาเฉพาะหน้า)
$userQuery = "SELECT * FROM `document_header_purchase` JOIN `vendors` using(Vendor_ID)
                where `Doc_type_ID` = 1 and status=0 and mod(`Doc_purchase_ID`,2)=1
                order by Doc_purchase_ID
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
										<li class="nav-item"><a class="nav-link" href="inqList.php">Inquiry</a></li>
										<li class="nav-item"><a class="nav-link" href="qaList.php">Quotation</a></li>
										<li class="nav-item"><a class="nav-link" href="soList.php">Sale Order</a></li>
										<li class="nav-item"><a class="nav-link" href="invCusList.php">Invoice</a></li>
									</ul>
								</li> 
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="matList.php">Material</a></li>
										<li class="nav-item"><a class="nav-link" href="inList.php">Inventory</a></li>
										<li class="nav-item"><a class="nav-link" href="venList.php">Vendors</a></li>
										<li class="nav-item"><a class="nav-link" href="cusList.php">Customer</a></li>
										<li class="nav-item"><a class="nav-link" href="empList.php">Employee</a></li>
										<li class="nav-item"><a class="nav-link" href="conList.php">Condition</a></li>
									</ul>
								</li> 
								<li class="nav-item"><a class="nav-link" href="gl.php">G/L</a></li>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Summary</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="graphMat.php">Material</a></li>
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
							<a class="main_btn" href="#">Explore Gallery</a>
						</div>
					</div>
				</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Home Blog Area =================-->
<?php
if (mysqli_num_rows($result) == 0)
{
	echo "No records were found with query $userQuery";
}
else {
?>
<div class="content">

<form method="post" action="addMat.php">
	<div>
    <h1><b>Purchase Requisition List</b></h1>
    <a href="pr_list_his.php"><h3>Purchase Requisition History</h3></a>
    <a href="create_pr.php"><h3>Create Purchase Requisition</h3></a>
</div> 
	<table border="1" align="center">
		<tr>
			<th>PR ID</th>
			<th>Vendor name</th>
            <th>Add Material</th>
		</tr>
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?=$row['Doc_purchase_ID'];?></td>
				<td><?=$row['Vendor_name'];?></td>
				<td>
					<input type="hidden" name="Doc_purchase_ID" value="<?=$row['Doc_purchase_ID'];?>">
			        <input type="hidden" name="Vendor_name" value="<?=$row['Vendor_name'];?>">
                    <input type="submit" name="submit" value="Add" class="genric-btn primary-border">
				</td>				
			</tr>
			<br>
		<?php } ?>
	</table>
</form>
<?php
}
mysqli_close($connect);
?>
        <section class="home_blog_area pad_top">
        	<div class="container">
        		<div class="home_blog_inner">
        			<div class="row h_blog_item">
        				<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-1.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner left">
									<h4>Spreading <br />Peace to world</h4>
									<p>If you are looking at blank cassette on the web you may be very confused at the difference in price you may see some.</p>
									<a class="main_btn2" href="#">Explore Gallery</a>
								</div>
							</div>
						</div>
        			</div>
        			<div class="row h_blog_item">
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner right">
									<h4>Spreading <br />Peace to world</h4>
									<p>If you are looking at blank cassette on the web you may be very confused at the difference in price you may see some.</p>
									<a class="main_btn2" href="#">Explore Gallery</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-2.jpg" alt="">
							</div>
						</div>
        			</div>
        			<div class="row h_blog_item">
        				<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-3.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner left">
									<h4>Spreading <br />Peace to world</h4>
									<p>If you are looking at blank cassette on the web you may be very confused at the difference in price you may see some.</p>
									<a class="main_btn2" href="#">Explore Gallery</a>
								</div>
							</div>
						</div>
        			</div>
        			<div class="row h_blog_item">
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner right">
									<h4>Spreading <br />Peace to world</h4>
									<p>If you are looking at blank cassette on the web you may be very confused at the difference in price you may see some.</p>
									<a class="main_btn2" href="#">Explore Gallery</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-4.jpg" alt="">
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </section>
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