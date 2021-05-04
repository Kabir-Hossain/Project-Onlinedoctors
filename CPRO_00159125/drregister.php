<?php 
	session_start();
	
	$okFlag = TRUE;
	$message = '';
	if(!isset($_REQUEST['drname']) || $_REQUEST['drname'] == ''){
		$message .= 'Please type your Name.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['degrees']) || $_REQUEST['degrees'] == ''){
		$message .= 'Please type your Name.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['speciality']) || $_REQUEST['speciality'] == ''){
		$message .= 'Please type your Name.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['email']) || $_REQUEST['email'] == ''){
		$message .= 'Please type your E-mail.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['mobilenumber']) || $_REQUEST['mobilenumber'] == ''){
		$message .= 'Please type your Mobile Number.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['dateofbirth']) || $_REQUEST['dateofbirth'] == ''){
		$message .= 'Please type your Date of Birth.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['gender']) || $_REQUEST['gender'] == ''){
		$message .= 'Please select Gender.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['address']) || $_REQUEST['address'] == ''){
		$message .= 'Please type your Address.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['password']) || $_REQUEST['password'] == ''){
		$message .= 'Please type your Password.\n';
		$okFlag = FALSE;
	}
	
	if(isset($_REQUEST['password']) && isset($_REQUEST['confirm-password'])){
		if($_REQUEST['password'] != $_REQUEST['confirm-password']){
			$message .= 'Password didn\'t match.\n';
			$okFlag = FALSE;
		}
	}
	
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
	
	if($okFlag){
		
		
		$drname 		= $_REQUEST['drname'];
		$degrees 		= $_REQUEST['degrees'];
		$speciality		= $_REQUEST['speciality'];		
		$email 			= $_REQUEST['email'];
		$mobile 		= $_REQUEST['mobilenumber'];
		$dateofbirth 	= $_REQUEST['dateofbirth'];
		$gender 		= $_REQUEST['gender'];
		$address 		= $_REQUEST['address'];
		$password 		= md5($_REQUEST['password']);
		
		
			
		
		include_once "dbCon.php";
		$conn = connect();
		$sql = "SELECT * FROM doctors WHERE email='$email'";
		$result = $conn->query($sql);
		
		
		
		
		if($result->num_rows <= 0){
			$sql = "INSERT INTO doctors(drname, degree, speciality, email, mobile, dateofbirth, gender, address, password, image) VALUES ('$drname','$degrees','$speciality','$email','$mobile','$dateofbirth','$gender','$address','$password','$newName')";
			
			if($conn->query($sql)){
				$_SESSION['msg'] = 'Successfully Registered';
				header('location:index.php?');
			}else{
				$_SESSION['msg'] = 'Database Error';
				header('location:index.php');
			}
		}else{
			$_SESSION['msg'] = 'email already exist.\n';
			header('location:index.php');
		}
	}else{
		$_SESSION['msg'] = $message;
		header('location:index.php?msg='.$message);
	}