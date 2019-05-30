<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/progress/progress-1.png" type="image/png">
        <title>Vinay & Sowmya</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <style>
        .error {color: #FF0000;}
        </style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
                                <li class="nav-item"><a class="nav-link" href="advice.php">Give Us Advice </a></li>
                                <li class="nav-item"><a class="nav-link" href="accomodation.html">Accomodation</a></li>
                                <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Our Family</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="vinaypaternal.html">Vinay's Paternal</a></li>
                                        <li class="nav-item"><a class="nav-link" href="vinaymaternal.html">Vinay's Maternal</a></li>
                                        <li class="nav-item"><a class="nav-link" href="sowmyapaternal.html">Sowmya's Paternal</a></li>
                                        <li class="nav-item"><a class="nav-link" href="sowmyamaternal.html">Sowmya's Maternal</a></li>
                                    </ul>
                                </li> 
                            </ul>
                        </div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner banner_box d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Give Us Advice!</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="advice.php">Give Us Advice</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Advice Area =================-->
        <section class="love_journey_area p_120">
        	<div class="container">
        		<div class="love_inner">
        			<div class="main_title">
        				<h2>Advice</h2>
        				<p>As we start our journey, we would love to hear what you learned through your experiences. Please give us advice for our own marriage!</p>
        			</div>
                      <?php
                     if(isset($_POST['add'])) {
                        $dbserver = 'fdb25.awardspace.net';
                        $dbuser = '3011642_sowmya';
                        $dbpass = 'sowmya0627';
                        $dbname = '3011642_sowmya';
                        $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
                        
                        if(! $conn ) {
                           die('Could not connect: ' . mysqli_connect_error());
                        }
                        
                        if(! get_magic_quotes_gpc() ) {
                           $name = addslashes ($_POST['name']);
                           $advice = addslashes ($_POST['advice']);
                        }else {
                           $name = $_POST['name'];
                           $advice = $_POST['advice'];
                        }
                        
                        $sql = "INSERT INTO advice (name,advice) VALUES('$name','$advice')";
                        $retval = mysqli_query($conn, $sql);
                        
                        if(! $retval ) {
                           die('Could not enter data: ' . mysqli_error());
                        }
                        
                        echo "Entered data successfully\n";
                        
                        mysqli_close($conn);
                        }else {
                    ?>
                 <div class="comment-form">
                <form action="<?php $_PHP_SELF ?>" method="post">
                <div class="form-group form-inline">
                    <div class="form-group col-lg-6 col-md-6 name">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
               <div class="form-group col-lg-6 col-md-6 email">
                    <input type="text" class="form-control" id="relation" name="relation" placeholder="Enter Your Relationship Type (aunt,friend,etc.)">
                </div>                                        
                </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                </div>
                    <div class="form-group">
                    <textarea class="form-control mb-10" rows="5" name="advice" placeholder="Advice" id = "advice" required=""></textarea>
                    </div>
                    <input class="primary-btn submit_btn" type="submit" name="submit" id="submit" value="Submit"> <!--don't submit form if empty -->
                </form>
                </div>
                </div>
                <?php
                }
                ?>
                <div class="main_title">
                    <h2>Advice Given to Us</h2>
                </div>
                <div class="comment-list">
                </div>
        		
                <!-- Display submitted advice -->
        	</div>
        </section>
        <!--================End Advice Area =================-->
 
        <!--================Footer Area =================-->
        <footer class="footer_area">
       				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>