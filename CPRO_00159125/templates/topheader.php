<div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100">
					
					  <div class="col-md-4"><p>We Serve To The <span>Humanity</span></p></div>
					  
					  <div class="col-md-8 p-l-100">
							<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
							
							<?php }else{ ?>
							<form class="form-inline" action="Logincheck.php">
								<div class="col-12 col-md-3">
									<div class="form-group">
										<input type="email" class="form-login border-top-0 border-right-0 border-left-0" name="email" id="email" placeholder="E-mail" required>
									</div>									
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<input type="password" class="form-login border-top-0 border-right-0 border-left-0" name="password" id="password" placeholder="Password" required>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group ">
										<button type="submit" class="btn medilife-btn">Log-In</button>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group ">
										<button type="submit" onclick="location.href='signup.php'" class="btn medilife-btn">Sign-Up</button>
									</div>
								</div>
							</form>
							<?php } ?>
					  </div>
					                   
                </div>
            </div>
        