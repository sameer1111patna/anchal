 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>

    
    <!--<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $admin_base_url; ?>/exec/logout_exec.php">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $admin_base_url; ?>/" class="brand-link">
      <img src="<?php echo $admin_base_url; ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Anchal Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $admin_base_url; ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='admin'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         


          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/manageactivity.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='manageactivity'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Activity
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/manageslider.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='manageslider'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Slider
              </p>
            </a>
          </li>
 <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/managegallery.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='manageslider'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Gallery
              </p>
            </a>
          </li>

      
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/managedonation.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='managedonation'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Donation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/manageabout.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='manageabout'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage About
              </p>
            </a>
          </li>

      
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/managecontactus.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='managecontactus'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Manage Contact Us
              </p>
            </a>
          </li>

      
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/managejoinus.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='managejoinus'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Manage Join Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $admin_base_url; ?>/manageteam.php" class="nav-link <?php if(basename($_SERVER['REQUEST_URI'])=='manageteam'){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Manage Team
              </p>
            </a>
          </li>

      
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>