<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="br">
    <head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title></title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="logo/favicon.png">
	
		<!-- Fontfamily -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/plugins/feather/feather.css">
		
		<!-- Pe7 CSS -->
		<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		<script src="https://kit.fontawesome.com/e91000bbff.js" crossorigin="anonymous"></script>


		

		</head>


<div class="main-wrapper login-body">

            <div class="login-wrapper">
           
            	<div class="container">
                
                	<div class="loginbox">
                  
                    	<div class="login-left">
							<img class="img-fluid logo-login" src="logo/FISK.png" alt="Logo">
                        </div>
                        <div class="login-right">
                       
							<div class="login-right-wrap">

								<h2>Login</h2>
								<!-- Form -->
								<form action="./funcoes/login.php" method="post">
                                <?php if(isset($_SESSION['mensagem.erro'])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['mensagem.erro']; ?>
                                        <?php  unset($_SESSION['mensagem.erro']); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
									<div class="input-block">
										<label >Email<span class="login-danger">*</span></label>
										<input class="form-control" name="email" type="text" >
										<span class="profile-views"><i class="fas fa-user-circle"></i></span>
									</div>
									<div class="input-block">
										<label >Senha<span class="login-danger">*</span></label>
										<input class="form-control pass-input" name="senha" type="text" >
										<span class="profile-views feather-eye toggle-password"></span>
									</div>
									<div class="forgotpass">
										<div class="remember-me">
											<label class="custom_check me-2 mb-0 d-inline-flex remember-me"> lembre-me
											<input type="checkbox" name="radio">
											<span class="checkmark"></span>
											</label>
										</div>
										<a href="forgot-password.html">Esqueceu a senha ?</a>
									</div>
									<div class="input-block">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								
								<!-- /Social Login -->
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
require_once('foot/footer.php'); 
?>
    </body>
</html>