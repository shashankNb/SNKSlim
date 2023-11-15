<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo BASE_URL . '/assets/dist/img/user2-160x160.jpg'; ?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"><?php echo $_SESSION['user_name']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

            <li class="user-header bg-primary">
                <img src="<?php echo BASE_URL . '/assets/dist/img/user2-160x160.jpg'; ?>" class="img-circle elevation-2" alt="User Image">
                <p>
                    <?php echo $_SESSION['user_name']; ?> - Web Developer
                    <small>Member since Nov. 2012</small>
                </p>
            </li>

            <li class="user-footer">
<!--                <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                <a href="<?php echo BASE_URL.'/logout.php'; ?>" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
        </ul>
    </li>
</ul>