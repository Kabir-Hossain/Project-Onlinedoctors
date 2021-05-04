<!DOCTYPE html>

<html lang="en">
<!-- Head  -->
<?php include 'templates/header.php'; 
	
	if(isset($_SESSION['msg'])){
		echo '<script type="text/javascript">alert("' . $_SESSION['msg']. '")</script>';
		unset($_SESSION['msg']);
	}	

		include_once "dbCon.php";
		
		$uid = $_SESSION['uid'];
		$sql = "SELECT * FROM users WHERE `id`='$uid'";
		$conn = connect();		
		$result = $conn->query($sql);
	
	if(isset($_POST['update'])){
		
		$uname 			= $_REQUEST['uname'];		
		$uemail 		= $_REQUEST['email'];
		$umobile 		= $_REQUEST['mobilenumber'];
		$udateofbirth 	= $_REQUEST['dateofbirth'];
		$ugender 		= $_REQUEST['gender'];
		$uaddress 		= $_REQUEST['address'];
		$upassword 		= md5($_REQUEST['password']);
		
		
		$sql = "UPDATE `users` SET `name`='$uname',`email`='$uemail',`mobile`='$umobile',`date`='$udateofbirth',`gender`='$ugender',`address`='$uaddress',`pass`='$upassword' WHERE `id`='$uid'";
		$resultupdate = $conn->query($sql);		
		$message='Your Information sucessfully Updated.\n';
		
	}if($conn->query($sql)===TRUE){
				
		$_SESSION['msg'] = $message;
		header('location:profile.php');
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
																			
										<li class="nav-item"><a class="nav-link" href="appointment.php">Appointment</a></li>

										<li class="nav-item active"><a class="nav-link" href="profile.php">Profile</a></li>
										
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
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(../img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Profile</h3>
                        <p>Showing Profile Information</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->
	
	  
	<?php	
  
	foreach($result as $row){
	$name 			= $row['name'];		
	$email 			= $row['email'];
	$mobile 		= $row['mobile'];
	$dateofbirth 	= $row['date'];
	$gender 		= $row['gender'];
	$address 		= $row['address'];	
								
	}
	?>
	
	<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
                    
        </div>
      </div> 
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Personal info</h3>
        
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
          <div class="form-group">            
            <div class="col-lg-8">
              <input class="form-control text-dark" name="uname" type="text" value="<?php if(isset($name)) echo $name; ?>" placeholder="User Name:" required>
            </div>
          </div>          
          <div class="form-group">            
            <div class="col-lg-8">
              <input class="form-control text-dark" name="email" type="text" value="<?php if(isset($email)) echo $email; ?>" placeholder="Email Address:" required>
            </div>
          </div>
          <div class="form-group">            
            <div class="col-lg-8">
              <input class="form-control text-dark" name="mobilenumber" type="text" value="<?php if(isset($mobile)) echo $mobile; ?>" placeholder="Mobile Number:" required>
            </div>
          </div>          
          <div class="form-group">            
            <div class="col-md-8">
              <input class="form-control text-dark" name="dateofbirth" type="date" value="<?php if(isset($dateofbirth)) echo $dateofbirth; ?>" placeholder="Date of Birth:" required>
            </div>
          </div>
		  <div class="form-group">            
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="gender" class="form-control text-dark" value="<?php if(isset($gender)) echo $gender; ?>" required>
					<option value="">Gender </option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <input class="form-control text-dark" name="address" type="text" value="<?php if(isset($address)) echo $address; ?>" placeholder="Address:" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <input class="form-control text-dark" name="password" type="password" value="" placeholder="Password:" required>
            </div>
          </div>
		  <div class="form-group">
            <div class="col-md-8">
              <input class="form-control text-dark" name="confirmpassword" type="password" value="" placeholder="Confirm Password:" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <button type="submit" name="update" class="btn medilife-btn">Updated</button>       
            </div>
          </div>
        </form>
      </div>
	</div>
	</div>
	<hr>

    
    <!-- ***** Footer Area Start ***** -->
    
		<?php include 'templates/footer.php'; ?>
        

</body>

</html>