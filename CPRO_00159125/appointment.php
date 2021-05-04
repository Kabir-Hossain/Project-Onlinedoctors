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
										
                                        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
										
                                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
										
										
										
										<?php if(isset($_SESSION['did']) && $_SESSION['did'] == true){?>										
										<li class="nav-item"><a class="nav-link" href="drprofile.php">Profile</a></li>
										
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php
										}else{?>
																			
										<li class="nav-item active"><a class="nav-link" href="appointment.php">Appointment</a></li>

										<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
										
										<li class="nav-item"><a class="nav-link" href="logout.php"><?=$_SESSION['username']?>-Logout</a></li>
										<?php
										}
										}} else{?>
										
										<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>		
                                        
										<li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
										
                                        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
										
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
                        <h3 class="breadcumb-title">Appointment</h3>
                        <p>Showing All Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->
	
	<?php
			include_once 'dbCon.php';
			$con = connect();
			$sql= "SELECT * from doctors WHERE `checked`= 1";
			$result=$con->query($sql);
					
	?>

    <!-- ***** Services Area Start ***** -->
    <div class="medilife-services-area section-padding-100-20">
        <div class="container">
			<?php foreach($result as $row){ ?>
			<div class="row-appointment">
				<div class="row">				
				<div class="col-md-4">
					<img alt="User Pic" src="<?=BASE_URL?>/img/upload/<?=$row['image']?>" id="profile-image1" style="width:270px" class="img-circle img-responsive"> 
				</div>
				<div class="col-md-8" >
					<div class="container" >
						<div class="row">
						  <div class="col-md-8"><h3><?=$row['drname']?></h3></div>
						  <div class="col-md-4"><p>Speciality - <?=$row['speciality']?></p></div>
						  <div class="w-100"></div>
						  <div class="col-md-8"><h6><?=$row['degree']?></h6></div>
						  <div class="col-md-4"><p>Address - <?=$row['address']?></p></div>
						</div>
						
						
					</div>
						<hr>
						<ul class="container details" >
							<div class="row">
							  <div class="col"><h2><li><p><i class="fa fa-envelope" aria-hidden="true"></i>  <?=$row['email']?></p></li></h2></div>							  
							  <div class="col">
								<form action="booking.php" method="post">
									<input type="hidden" name="pid" id="" class="form-control" value="<?=$row['id']?>">			
									<button type="submit" name="submit" class="btn medilife-btn">Make an Appointment</button>
								</form>
							  </div>
							</div>						
						</ul>
						<hr>						
				</div>
				
				</div>
			</div>
			<?php  } ?>
        </div>
    </div>
    <!-- ***** Services Area End ***** -->
    
    

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