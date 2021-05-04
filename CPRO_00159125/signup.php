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
                                <a class="navbar-brand" href="index.php"><img src="img/core-img/logo1.png" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">                                        
										
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

    <!-- ***** Hero Area Start ***** -->
    
    <!-- ***** Hero Area End ***** -->

    

    <!-- ***** About Us Area Start ***** -->
    <section class="medica-about-us-area section-padding-100-20">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <!-- Single Service Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="">
                                    <i class=""></i>
                                </div>
                                <div class="service-content">
                                    <h5></h5>
                                    
                                </div>
                            </div>
                        </div>
                                                
                        <!-- Single Service Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="">
                                    <i class=""></i>
                                </div>
                                <div class="service-content">
                                    <h5></h5>
                                    
                                </div>
                            </div>
                        </div>
						<!-- Single Service Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="">
                                    <i class=""></i>
                                </div>
                                <div class="service-content">
                                    <h5></h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->
	
	<!-- ***** Book An Appoinment Area Start ***** -->
    <div class="medilife-book-an-appoinment-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="appointment-form-content">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 col-lg-9">
								<ul class="nav nav-tabs tm-white-bg" role="tablist" id="hotelCarTabs">
									<li role="presentation">
										<a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">Users Registration</a>
									</li>
									<li role="presentation">
										<a href="#car" aria-controls="car" role="tab" data-toggle="tab">Doctors Registration</a>
									</li>
								</ul>
                                <div class="medilife-appointment-form">
                                    <!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
												<div class="tm-search-box effect2">
													<form action="register.php" method="post" class="hotel-search-form" >
														<div class="tm-form-inner">
															<div class="form-group">
																<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="" required>
															</div>										
															<div class="form-group">
																<input type="text" name="email" id="email" tabindex="2" class="form-control" placeholder="Email Address" value="" required>
															</div>
															<div class="form-group">
																<input type="text" name="mobilenumber" id="mobilenumber" tabindex="3" class="form-control" placeholder="Mobile Number" value="" required>
															</div>
															
															<div class="form-group">
																<input type="date" name="dateofbirth" id="dateofbirth" tabindex="5" class="form-control" placeholder="Date Of Birth" required>
															</div>
															<div class="form-group">
																<select class="form-control" id="gender" name="gender" required>
																	<option value="">Gender </option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>												
																</select> 
															</div>
															<div class="form-group">
																<input type="address" name="address" id="address" tabindex="5" class="form-control" placeholder="Address" required>
															</div>
															<div class="form-group">
																<input type="password" name="password" id="password" tabindex="7" class="form-control" placeholder="Password" required>
															</div>
															<div class="form-group">
																<input type="password" name="confirm-password" id="confirm-password" tabindex="8" class="form-control" placeholder="Confirm Password" required>
															</div>
														</div>							
															<div class="form-group tm-yellow-gradient-bg text-center">
																<button type="submit" name="submit" tabindex="9" class="btn medilife-btn">Registration</button>
															</div>  
													</form>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade tm-white-bg" id="car">
												<div class="tm-search-box effect2">
													<form action="drregister.php" method="post" class="hotel-search-form" enctype="multipart/form-data">
														<div class="tm-form-inner">
															<div class="form-group">
																<input type="text" name="drname" id="drname" tabindex="1" class="form-control" placeholder="Dr. Name"  value="" required>
															</div>
															<div class="form-group">
																<input type="text" name="degrees" id="degrees" tabindex="2" class="form-control" placeholder="Degrees" value="" required>
															</div>
															<div class="form-group">
																 <select class="form-control" id="speciality" tabindex="3" name="speciality" required>
																	<option value="">Speciality</option>
																	<option value="Cardiologist">Cardiologist</option>
																	<option value="Medicine">Medicine</option>
																	<option value="Dermatologist">Dermatologist</option>
																	<option value="Gastroenterologist">Gastroenterologist</option>
																	<option value="Hematologist">Hematologist</option>
																	<option value="Neurologist">Neurologist</option>
																	<option value="Neurosurgeon ">Neurosurgeon </option>
																	<option value="Nephrologist ">Nephrologist </option>
																	<option value="Gynecologist ">Gynecologist </option>
																	<option value="Orthopaedic Surgeon">Orthopaedic Surgeon</option>
																	<option value="Psychiatrist">Psychiatrist</option>
																	<option value="Pediatrician">Pediatrician</option>
																	<option value="Rheumatologist ">Rheumatologist </option>
																	<option value="Urologist ">Urologist </option>																	
																</select> 
															</div>
															<div class="form-group">
																<input type="text" name="email" id="email" tabindex="4" class="form-control" placeholder="Email Address" value="" required>
															</div>
															<div class="form-group">
																<input type="text" name="mobilenumber" id="mobilenumber" tabindex="5" class="form-control" placeholder="Mobile Number" value="" required>
															</div>
															
															<div class="form-group">
																<input type="date" name="dateofbirth" id="dateofbirth" tabindex="5" class="form-control" placeholder="Date Of Birth" required>
															</div>
															<div class="form-group">
																 <select class="form-control" id="gender" tabindex="5" name="gender" required>
																	<option value="">Gender </option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>												
																</select> 
															</div>
															<div class="form-group">
																<input type="address" name="address" id="address" tabindex="5" class="form-control" placeholder="Address" required>
															</div>
															<div class="form-group">
																<input type="password" name="password" id="password" tabindex="7" class="form-control" placeholder="Password" required>
															</div>
															<div class="form-group">
																<input type="password" name="confirm-password" id="confirm-password" tabindex="8" class="form-control" placeholder="Confirm Password" required>
															</div>
															<div class="form-group">
																<input type="file" name="fileToUpload"  class="form-control">
															</div>
														</div>							
															<div class="form-group tm-yellow-gradient-bg text-center">
																<button type="submit" name="submit" tabindex="9" class="btn medilife-btn">Registration</button>
															</div>  
													</form>								
												</div>
											</div>				    
										</div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Book An Appoinment Area End ***** -->			
	
	<section class="medica-about-us-area section-padding-100-20">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <!-- Single Service Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="">
                                    <i class=""></i>
                                </div>
                                <div class="service-content">
                                    <h5></h5>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Single Service Area -->
                        
                        <!-- Single Service Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="">
                                    <i class=></i>
                                </div>
                                <div class="service-content">
                                    <h5></h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- ***** Footer Area Start ***** -->
		<?php include 'templates/footer.php'; ?>

</body>

</html>