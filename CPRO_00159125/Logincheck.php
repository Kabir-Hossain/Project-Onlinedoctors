<?php 

//Login Checker
	session_start();
	$okFlag = TRUE;
	$message = '';
	
	if(!isset($_REQUEST['email']) || $_REQUEST['email'] == ''){
		$message .= 'Please type your email.\n';
		$okFlag = FALSE;
	}
	if(!isset($_REQUEST['password']) || $_REQUEST['password'] == ''){
		$message .= 'Please type your password.\n';
		$okFlag = FALSE;
	}
	
	if($okFlag){
		$email 		= $_REQUEST['email'];
		$password 	= md5($_REQUEST['password']);
		
		if(!isset($_SESSION['login_counter']))
			$_SESSION['login_counter'] = 0;
		
		$sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";		
		include_once 'dbCon.php';
		$conn = connect();		
		$result = $conn->query($sql);
		
		$sql = "SELECT * FROM doctors WHERE email='$email' AND password='$password'";		
		$result1 = $conn->query($sql);
		
		
		
		if($result->num_rows > 0 || $result1->num_rows > 0){
			$_SESSION['isLoggedIn'] = TRUE;

			if ($result->num_rows > 0){
				
			foreach($result as $row){
				$_SESSION['uid'] = $row['id'];
				$_SESSION['username'] = $row['name'];
				$_SESSION['user_role'] = $row['role'];
				$_SESSION['email'] = $row['email'];
			}
			}elseif($result1->num_rows > 0){
				
				foreach($result1 as $row){
				$_SESSION['username'] = $row['drname'];				
				$_SESSION['did'] = $row['id'];			
				}
			}
			header('location:index.php');
		}else{
			
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = $conn->query($sql);
			
			
			$sql = "SELECT * FROM doctors WHERE email='$email'";
			$result1 = $conn->query($sql);
			
			//Checking if the email is in database
			
			if($result->num_rows <= 0){
								
				if($result1->num_rows <= 0){	
				$message .='Please Register.\n';
				
			}else{
				$_SESSION['email'] = $email;
				$message .='Password didn\'t match.\n';
			
			}
				
			}else{
				$_SESSION['email'] = $email;
				$message .='Password didn\'t match.\n';
			
			}
						
			$_SESSION['msg'] = $message;			
			header('location:index.php');
		}
	}else{
		$_SESSION['msg'] = $message;
		header('location:index.php');
	}