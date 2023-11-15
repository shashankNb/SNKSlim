<a href="<?php echo BASE_URL; ?>" class="brand-link">
    <img src="<?php echo BASE_URL. '/assets/dist/img/AdminLTELogo.png'; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?php echo BASE_URL . '/assets/dist/img/user2-160x160.jpg'; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="javascript:void(0)" class="d-block"><?php echo $_SESSION['user_name']; ?></a>
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
            <li class="nav-item <?php echo (isset($_GET['pg']) && $_GET['pg'] == 'dashboard' || !isset($_GET['pg'])) ? 'menu-is-opening menu-open' : '';  ?>">
                <a href="<?php echo BASE_URL; ?>" class="nav-link <?php echo (isset($_GET['pg']) && $_GET['pg'] == 'dashboard' || !isset($_GET['pg'])) ? 'active' : '';  ?>">
                    <i class="nav-icon fa fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?php echo (isset($_GET['pg']) && str_contains($_GET['pg'], 'user')) ? 'menu-is-opening menu-open' : '';  ?>">
                <a href="#" class="nav-link <?php echo (isset($_GET['pg']) && str_contains($_GET['pg'], 'user')) ? 'active' : '';  ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" <?php echo (isset($_GET['pg']) && str_contains($_GET['pg'], 'user')) ? 'style="display: block"' : '';  ?>>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL .'?pg=user'; ?>" class="nav-link <?php echo (isset($_GET['pg']) && $_GET['pg'] == 'user') ? 'active' : '';  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL .'?pg=userManage'; ?>" class="nav-link <?php echo (isset($_GET['pg']) && $_GET['pg'] == 'userManage') ? 'active' : '';  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>