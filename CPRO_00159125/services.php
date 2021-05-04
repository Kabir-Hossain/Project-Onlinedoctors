<!DOCTYPE html>
<html lang="en">

<!-- Head  -->
<?php include 'templates/header.php'; 
	
	if(isset($_SESSION['msg'])){
		echo '<script type="text/javascript">alert("' . $_SESSION['msg']. '")</script>';
		unset($_SESSION['msg']);
	}
?>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medilife-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
    <!-- Top Header Area -->
        <?php include 'templates/topheader.php';?>

    <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="index.html"><img src="img/core-img/logo1.png" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
										
										<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true){?>
										<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0){?>										
										<li class="nav-item"><a class="nav-link" href="admin/showdr.php">Show Doctors</a></li>

										<li class="nav-item"><a class="nav-link" href="admin/showbookings.php">Show Bookings</a></li>
                                        
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php }else{?>
										
										<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>		
                                        
										<li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
										
                                        <li class="nav-item active"><a class="nav-link" href="services.php">Services</a></li>
										
                                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
										
										
										
										<?php if(isset($_SESSION['did']) && $_SESSION['did'] == true){?>										
										<li class="nav-item"><a class="nav-link" href="drprofile.php">Profile</a></li>
										
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php
										}else{?>
																			
										<li class="nav-item"><a class="nav-link" href="appointment.php">Appointment</a></li>

										<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
										
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php
										}
										}} else{?>
										
										<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>		
                                        
										<li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
										
                                        <li class="nav-item active"><a class="nav-link" href="services.php">Services</a></li>
										
                                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
									
										<?php
										}?>
                                    </ul>
                                    <!-- Appointment Button -->
                                    
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Services</h3>
                        <p>We provide the best services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Services Area Start ***** -->
    <div class="medilife-services-area section-padding-100-20">
        <div class="container">
            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex">
                        <div class="service-icon">
                            <i class="icon-doctor"></i>
                        </div>
                        <div class="service-content">
                            <h5>The Best Doctors</h5>
                            <p>Best Doctors is committed to helping you make the right medical decision with confidence.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex">
                        <div class="service-icon">
                            <i class="icon-blood-donation-1"></i>
                        </div>
                        <div class="service-content">
                            <h5>Baby Nursery</h5>
                            <p>The children who are appreciated for what they are will grow up with confidences in themselves happy.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex">
                        <div class="service-icon">
                            <i class="icon-helicopter"></i>
                        </div>
                        <div class="service-content">
                            <h5>Helicopters</h5>
                            <p>We have launched helicopter service recently. In order to facilitate the movement safely and comfortably.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex">
                        <div class="service-icon">
                            <i class="icon-flask"></i>
                        </div>
                        <div class="service-content">
                            <h5>Laboratory</h5>
                            <p>We are a privately owned and operated laboratory which enables us to provide customized services.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex">
                        <div class="service-icon">
                            <i class="icon-emergency-call-1"></i>
                        </div>
                        <div class="service-content">
                            <h5>Emergency Room</h5>
                            <p>We provides a comprehensive, highly integrated system of crisis evaluation and treatment services.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex">
                        <div class="service-icon">
                            <i class="icon-blood-donation-2"></i>
                        </div>
                        <div class="service-content">
                            <h5>Cardiology</h5>
                            <p>Our cardiologists and cardiac surgeons offer you the latest diagnostic tests.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Services Area End ***** -->

    <div class="medilife-services-area clearfix">
        <!-- Single Services Area -->
        <div class="singleServiceArea equalize d-flex">
            <div class="singleServiceIcon">
                <i class="icon-hospital-4"></i>
            </div>
            <div class="singleServiceText">
                <h2>A new way of running things</h2>
                <p>Best Doctors creates a collaborative environment where physicians work together to improve outcomes. We do this by creating a report that not only supports the member, but also the treating team, which supports decision making and helps ensure better outcomes.</p>
            </div>
        </div>

        <!-- Single Services Area -->
        <div class="singleServiceArea equalize bg-img" style="background-image: url(img/bg-img/about1.jpg);"></div>

        <!-- Single Services Area -->
        <div class="singleServiceArea equalize d-flex">
            <div class="singleServiceIcon">
                <i class="icon-clinic-history-2"></i>
            </div>
            <div class="singleServiceText">
                <h2>All Equipments are high tech</h2>
                <p>Best Doctors creates a collaborative environment where physicians work together to improve outcomes. We do this by creating a report that not only supports the member, but also the treating team, which supports decision making and helps ensure better outcomes.</p>
            </div>
        </div>
    </div>

    <section class="medilife-benefits-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>We always put <br>our pacients first</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    <div class="single-benefits-area mb-50 text-right">
                        <div class="single-benefits-title d-flex align-items-end row-reverse">
                            <i class="icon-teeth"></i>
                            <h5>Safe tests</h5>
                        </div>
                        <p></p>
                    </div>
                    <div class="single-benefits-area mb-50 text-right">
                        <div class="single-benefits-title d-flex align-items-end row-reverse">
                            <i class="icon-hospital-bed-1"></i>
                            <h5>Online results</h5>
                        </div>
                        <p></p>
                    </div>
                    <div class="single-benefits-area mb-50 text-right">
                        <div class="single-benefits-title d-flex align-items-end row-reverse">
                            <i class="icon-hospital-2"></i>
                            <h5>Imagistic tests</h5>
                        </div>
                        <p></p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-benefits-thumb">
                        <img src="img/bg-img/benefits.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-benefits-area mb-50">
                        <div class="single-benefits-title d-flex align-items-end">
                            <i class="icon-flask-1"></i>
                            <h5>Safe tests</h5>
                        </div>
                        <p></p>
                    </div>
                    <div class="single-benefits-area mb-50">
                        <div class="single-benefits-title d-flex align-items-end">
                            <i class="icon-smartphone-1"></i>
                            <h5>Online results</h5>
                        </div>
                        <p></p>
                    </div>
                    <div class="single-benefits-area mb-50">
                        <div class="single-benefits-title d-flex align-items-end">
                            <i class="icon-nuclear"></i>
                            <h5>Imagistic tests</h5>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** CTA Area Start ***** -->
    <div class="medilife-cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content">
                        <i class="icon-smartphone"></i>
                        <h2>For Emergency calls</h2>
                        <h3>+999</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <?php include 'templates/footer.php'; ?>

</body>

</html>