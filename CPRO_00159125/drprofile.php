<!DOCTYPE html>

<html lang="en">
<!-- Head  -->
<?php include 'templates/header.php'; 
	
	if(isset($_SESSION['msg'])){
		echo '<script type="text/javascript">alert("' . $_SESSION['msg']. '")</script>';
		unset($_SESSION['msg']);
	}	

		include_once "dbCon.php";
		
		$drid = $_SESSION['did'];
		$sql = "SELECT * FROM doctors WHERE `id`='$drid'";
		$conn = connect();		
		$result = $conn->query($sql);
	
	if(isset($_POST['update'])){

		if(isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"] != ''){
			//print_r($_FILES["fileToUpload"]["name"]);exit;
			$target_dir = "img/upload/";
			$newName = date('YmdHis_');
			$newName .= basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir . $newName;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			
			// Check if image file is a actual image or fake image
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			
			// Allow certain file formats
			if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				$okFlag = FALSE;
			// if everything is ok, try to upload file
			} else {
				
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file ". $newName. " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
					$okFlag = FALSE;
				}
			}
			
		}else{
			$newName = $_POST['image'];
			
		}
	
		
		$udrname 		= $_REQUEST['drname'];
		$udegrees 		= $_REQUEST['degrees'];
		$uspeciality	= $_REQUEST['speciality'];		
		$uemail 		= $_REQUEST['email'];
		$umobile 		= $_REQUEST['mobilenumber'];
		$udateofbirth 	= $_REQUEST['dateofbirth'];
		$ugender 		= $_REQUEST['gender'];
		$uaddress 		= $_REQUEST['address'];
		$upassword 		= md5($_REQUEST['password']);
		
		
		$sql = "UPDATE `doctors` SET `drname`='$udrname',`degree`='$udegrees',`speciality`='$uspeciality',`email`='$uemail',`mobile`='$umobile',`dateofbirth`='$udateofbirth',`gender`='$ugender',`address`='$uaddress',`password`='$upassword',`image`='$newName' WHERE `id`='$drid'";
		$resultupdate = $conn->query($sql);		
		$message='Your Information sucessfully Updated.\n';
		
	}if($conn->query($sql)===TRUE){
				
		$_SESSION['msg'] = $message;
		header('location:drprofile.php');
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
										<li class="nav-item active"><a class="nav-link" href="drprofile.php">Profile</a></li>
										
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
	$drname 		= $row['drname'];
	$degrees 		= $row['degree'];
	$speciality		= $row['speciality'];		
	$email 			= $row['email'];
	$mobile 		= $row['mobile'];
	$dateofbirth 	= $row['dateofbirth'];
	$gender 		= $row['gender'];
	$address 		= $row['address'];
	$image			= $row['image'];
								
	}
	?>
	
	<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?=BASE_URL?>/img/upload/<?=$row['image']?>" width="250px" height="250px" class="avatar img-circle" alt="avatar">          
        </div>
      </div> 
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Personal info</h3>
        
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
          <div class="form-group">            
            <div class="col-lg-8">
              <input class="form-control text-dark" name="drname" type="text" value="<?php if(isset($drname)) echo $drname; ?>" placeholder="Dr Name:" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-8">
              <input class="form-control text-dark" name="degrees" type="text" value="<?php if(isset($degrees)) echo $degrees; ?>" placeholder="Degrees:" required>
            </div>
          </div>
		  <div class="form-group">            
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="speciality" class="form-control text-dark" value="<?php if(isset($speciality)) echo $speciality; ?>" placeholder="Speciality:" required>
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
              <input type="file" name="fileToUpload" class="form-control text-dark">
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