<!DOCTYPE html>
<html lang="en">

<!-- Head  -->
<?php include 'templates/header.php'; 
	
	if(isset($_SESSION['msg'])){
		echo '<script type="text/javascript">alert("' . $_SESSION['msg']. '")</script>';
		unset($_SESSION['msg']);
	}
	
		
	if(isset($_POST['ok'])){		
		
	$okFlag = TRUE;
	$message = '';	
	if(!isset($_REQUEST['date']) || $_REQUEST['date'] == ''){
		$message .= 'Please Select Date.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['time']) || $_REQUEST['time'] == ''){
		$message .= 'Please Select time.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['number']) || $_REQUEST['number'] == ''){
		$message .= 'Please insert Number.\n';
		$okFlag = FALSE;
	}
	if($okFlag){	
		$did			= $_REQUEST['did'];
		$drname			= $_REQUEST['drname'];
		$uname 			= $_SESSION['username'];
		$date	 		= $_REQUEST['date'];
		$time	 		= $_REQUEST['time'];
		$number 		= $_REQUEST['number'];
			
		
		include_once "dbCon.php";
		$conn = connect(); 
		$sql = "SELECT * FROM booking WHERE (did='$did') AND (date='$date') AND (time='$time')"; 
		$result = $conn->query($sql);

		
		
		
		
		if($result->num_rows <= 0){
			$sql = "INSERT INTO booking(`did`, `doctor`, `uname`, `date`, `time`, `number`) VALUES ('$did','$drname','$uname','$date','$time','$number')";
			
			if($conn->query($sql)===true){
				
				
				include_once "mailsender.php";
				
					$name	 		= $_SESSION['username'];
					$to				= $_SESSION['email'];
					$subject		= 'Information about Dr Appointment through Online Doctors';
					$content		= 'Your appointment is booked. Please come on time';
				
				sendMail($to,$name,$subject,$content);
				
				
				
				
				$_SESSION['msg'] = ' Your Appointment is Confirmed & Email has been sent';
				header('location:appointment.php?');
			}else{
				$_SESSION['msg'] = 'Database Error';
				header('location:appointment.php');
			}
		}else{
			$_SESSION['msg'] = 'Appointment is not available, Please Select another Date or time.\n';
			header('location:appointment.php');
		}
	}else{
		$_SESSION['msg'] = $message;
		header('location:booking.php?msg='.$message);
		}	
	
	
	echo $drname;		
		exit();
	
	
	
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


    <!-- ***** Services Area Start ***** -->
	<hr>
	<hr>
	<hr>
	<hr>
	<hr>
	<hr>
    <div class="medilife-services-area section-padding-100-20">
		<div class="container">
			<div class="row-appointment">
			<?php	
			
			include_once 'dbCon.php';
			$con = connect();
			$sql= "SELECT * from doctors WHERE id=($_POST[pid])";
			$resultdata=$con->query($sql);		

			foreach($resultdata as $book){ ?>
			<div class="row">
				<div class="col-md-4">
					<img alt="User Pic" src="<?=BASE_URL?>/img/upload/<?=$book['image']?>" id="profile-image1" style="width:270px" class="img-circle img-responsive"> 
				</div>
				<div class="col-md-8">
					<form class="contact-form" method="post" action="">
						<div class="col-md-6">
							<div class="form-group">
								<input type="hidden" name="did" id="did" class="form-control" value="<?=$book['id']?>">
								<input type="hidden" name="drname" id="drname" class="form-control" value="<?=$book['drname']?>">	
							</div>
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" required="required" value="<?php if(isset($_SESSION['username'])) echo ($_SESSION['username']);?>">
							</div>
							<div class="form-group">
								<label>Date</label>
								<input type="date" name="date" class="form-control" required="required" value="">
							</div>							
							<div class="form-group">
								<label>Time</label>
								<select class="form-control" name="time" required>
									<option value="">Time</option>
									<option value="08:00-08:30">08:00-08:30</option>
									<option value="08:30-09:00">08:30-09:00</option>
									<option value="09:00-09:30">09:00-09:30</option>
									<option value="09:30-10:00">09:30-10:00</option>
									<option value="10:00-10:30">10:00-10:30</option>
									<option value="10:30-11:00">10:30-11:00</option>
									<option value="11:00-11:30">11:00-11:30</option>
									<option value="11:30-12:00">11:30-12:00</option>
									<option value="12:00-12:30">12:00-12:30</option>
									<option value="12:30-13:00">12:30-13:00</option>
									<option value="13:00-13:30">13:00-13:30</option>
									<option value="13:30-14:00">13:30-14:00</option>
									<option value="18:00-18:30">18:00-18:30</option>
									<option value="18:30-19:00">18:30-19:00</option>
									<option value="19:00-19:30">19:00-19:30</option>
									<option value="19:30-20:00">19:30-20:00</option>
									<option value="20:00-20:30">20:00-20:30</option>
									<option value="20:30-21:00">20:30-21:00</option>
								</select> 
							</div>							
						</div>
						<div class="col-md-6">							
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="number" class="form-control" required="required" value="">
							</div>							
							<div class="form-group">
								<button type="submit" name="ok" class="btn medilife-btn" required="required">Confirm your Appointment</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php  } ?>
			</div>
		</div>
    </div>
    <!-- ***** Services Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <?php include 'templates/footer.php'; ?>

</body>

</html>