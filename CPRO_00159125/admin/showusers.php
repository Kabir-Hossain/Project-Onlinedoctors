<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php';

	if(isset($_SESSION['msg'])){
		echo '<script type="text/javascript">alert("' . $_SESSION['msg']. '")</script>';
		unset($_SESSION['msg']);	
	}

	include_once '../dbCon.php';
		$con = connect();
		$sql= "SELECT * from users";
		$result=$con->query($sql);
		
	if(isset($_GET['uid'])){
		$uid = $_GET['uid'];		
		
		$con= connect();
		$sql= "DELETE FROM `users` WHERE `id`= '$uid'";
		$resultData=$con->query($sql);
		$msg1 ='User has been deleted successfully.\n';
		$message=$msg1;
			$_SESSION['msg'] = $message;
			header('location:showusers.php');
		
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
        <?php include '../templates/topheader.php';?>

    <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="index.html"><img src="../img/core-img/logo1.png" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
										
										<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true){?>
										<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0){?>										
										<li class="nav-item"><a class="nav-link" href="showdr.php">Show Doctors</a></li>

										<li class="nav-item"><a class="nav-link" href="showbookings.php">Show Bookings</a></li>
										
										<li class="nav-item active"><a class="nav-link" href="showusers.php">Show Users</a></li>
                                        
										<li class="nav-item"><a class="nav-link" href="../logout.php"><?=$_SESSION['username']?>-Logout</a></li>
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
	
	<?php
			
	?>

    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(../img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Users</h3>
                        <p>Showing all Users</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->
	
	
	
	

    <!-- ***** Services Area Start ***** -->
		
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th></th>
					<th>User Name</th>
					<th>Email</th>
					<th>Mobile Number</th>
					<th>Date of Birth</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Delete</th>
				</tr>
				<?php
					foreach($result as $row){ ?>
				<tr>
					<td></td>
					<td><?=$row['name']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['mobile']?></td>
					<td><?=$row['date']?></td>
					<td><?=$row['gender']?></td>
					<td><?=$row['address']?></td>
					<td><a href="<?=BASE_URL?>/admin/showusers.php?uid=<?=$row['id']?>" class="btn btn-primary">Delete</a></td>
				</tr>
				<?php  } ?>				
			</table>
		</div>
		
    <!-- ***** Footer Area Start ***** -->
		<?php include '../templates/footer.php'; ?>

</body>

</html>