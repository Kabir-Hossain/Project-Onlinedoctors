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
										
										
										
										<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0){?>										
										<li class="nav-item"><a class="nav-link" href="admin/showdr.php">Show Doctors</a></li>		
                                        
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php }else{?>
										
										<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>		
                                        
										<li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
										
                                        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
																			
                                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
										
										<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
										<li class="nav-item"><a class="nav-link" href="appointment.php">Appointment</a></li>
										
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php }
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
                        <h3 class="breadcumb-title">News</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="medilife-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    <img src="img/blog-img/1.jpg" alt="">
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">Jan 23, 2018</a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="img/blog-img/p1.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">New drog release soon</a>
                                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    <a href="#" class="comments">3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    <img src="img/blog-img/2.jpg" alt="">
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">Jan 23, 2018</a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="img/blog-img/p2.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">Free dental care</a>
                                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    <a href="#" class="comments">3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    <img src="img/blog-img/3.jpg" alt="">
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">Jan 23, 2018</a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="img/blog-img/p3.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">Good news for the pacients</a>
                                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    <a href="#" class="comments">3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    <img src="img/blog-img/1.jpg" alt="">
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">Jan 23, 2018</a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="img/blog-img/p1.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">New drog release soon</a>
                                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    <a href="#" class="comments">3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    <img src="img/blog-img/2.jpg" alt="">
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">Jan 23, 2018</a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="img/blog-img/p2.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">Free dental care</a>
                                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    <a href="#" class="comments">3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    <img src="img/blog-img/3.jpg" alt="">
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">Jan 23, 2018</a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="img/blog-img/p3.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">Good news for the pacients</a>
                                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    <a href="#" class="comments">3 Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="medilife-blog-sidebar-area">

                        <!-- Search Widget -->
                        <div class="search-widget-area mb-50">
                            <form action="#" method="get">
                                <input type="search" placeholder="Type Any Keywords">
                                <input type="submit" value="Search">
                            </form>
                        </div>

                        <!-- Catagories Widget -->
                        <div class="medilife-catagories-card mb-50">
                            <h5>Categories</h5>
                            <ul class="catagories-menu">
                                <li><a href="#">Radiology</a></li>
                                <li><a href="#">Cardiology</a></li>
                                <li><a href="#">Gastroenterology</a></li>
                                <li><a href="#">Neurology</a></li>
                                <li><a href="#">General surgery</a></li>
                            </ul>
                        </div>

                        <!-- Latest News -->
                        <div class="latest-news-widget-area mb-50">
                            <h5>Latest News</h5>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="img/blog-img/ln1.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">A big discovery for medicine</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="img/blog-img/ln2.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Dentistry for everybody</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="img/blog-img/ln3.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">When it’s time to take pills</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- medilife Emergency Card -->
                        <div class="medilife-emergency-card bg-img bg-overlay" style="background-image: url(img/bg-img/about1.jpg);">
                            <i class="icon-smartphone"></i>
                            <h2>For Emergency calls</h2>
                            <h3>+12-823-611-8721</h3>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Pagination Area -->
                    <div class="pagination-area mt-50">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">01</a></li>
                                <li class="page-item active"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <?php include 'templates/footer.php'; ?>

</body>

</html>