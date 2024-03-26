
    <body>
		
		<!-- Main Wrapper -->
        <div class="main-wrapper">
          <div class="header">
			
            <!-- Logo -->
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="logo/logo-fisk.png" alt="Logo">
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="logo/logo-fisk.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->
            
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            
            <!-- Search Bar -->
            <div class="top-nav-search">
            <h6 style="padding-top:15px;"></h6> 
            </div>
            <!-- /Search Bar -->
            
            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->
            
            <!-- Header Right Menu -->
            <ul class="nav user-menu">
        
            <li  class="nav-item dropdown language-drop me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img width="50%" src="img/logos/empresa2.png" alt="">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href=""> <img width="20%" src="img/logos/empresa2.png" alt="">Administrador</a>
                    </div>
                </li>
             
           
                
                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="logo/user.png" width="31" alt="Ryan Taylor">
                            <div class="user-text">
                                <h6><?= $_SESSION['nome']; ?></h6>
                                <p class="text-muted mb-0"></p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="logo/icone.png" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?=  $_SESSION['nome']; ?></h6>
                                <p class="text-muted mb-0"></p>
                            </div>
                        </div>
                                           
                        <a class="dropdown-item" href="./logout.php">Sair</a>
                    </div>
                </li>
                <!-- /User Menu -->
                
            </ul>
            <!-- /Header Right Menu -->
           
        </div>
        