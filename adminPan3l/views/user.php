<?php $err = $_GET['err'] ?? '';?>
<?php $id = $_GET['id'] ?? '';?>

<?php

if (isset($_POST['submit'])) {

    if (!empty($_POST['password'])) {
        $_POST['password'] = hash('sha512', $_POST['password']);
        $_POST['salt'] = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        $_POST['password'] = hash('sha512', $_POST['password'] . $_POST['salt']);
    } else {
        unset($_POST['password']);
    }

    if (!isset($_POST['id'])) {
        array_pop($_POST);
        $id = $obj->insert('tbl_users', $_POST);
        $obj->redirect("?pg=user&err=0");
    } else {
        unset($_POST['submit']);
        $obj->update('tbl_users', $_POST, 'id = ?', [$_POST['id']]);
        $obj->redirect("?pg=user&id=".$_POST['id'].'&err=0');
    }
}


?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <?php
                    if($id !='')
                    {
                        $data = $obj->selectRow('*','tbl_users','id = ?', [$id]);
                    }
                    ?>
                    <div class="card-header">
                        <h5 class="m-0"><?php echo $id ? 'Update ' : 'Add ';?> User</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Fill the details below to <?php echo $id ? 'update' : 'add'; ?> the new user.</p>
                        <?php if($err=='0') {echo '<p class="alert alert-default-success rounded-0"><i class="fa fa-check-circle"></i> Item Saved</p>';}?>
                        <form action="#" method="POST" class="form-horizontal">
                            <?php if($id) $obj->hidden('id', 'id', $id); ?>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control rounded-0"
                                           placeholder="Enter Full Name" value="<?php echo $data->name; ?>" />
                                    <span class="error invalid-feedback"> Enter name</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" class="form-control rounded-0"
                                           placeholder="Enter Email" value="<?php echo $data->email; ?>" />
                                    <span class="error invalid-feedback"> Enter email</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" id="password" name="password" class="form-control rounded-0"
                                           id="password" onkeyup="confirmPasswordCheck()" placeholder="Enter Password" />
                                    <span class="error invalid-feedback"> Enter password</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password"  id="confirm_password" class="form-control rounded-0"
                                           onkeyup="confirmPasswordCheck()" placeholder="Enter Password" />
                                    <span class="error invalid-feedback"> Both password and Confirm password should match with each other</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="access" class="col-sm-2 col-form-label">Access</label>
                                <div class="col-sm-10">
                                    <select name="access" id="access" class="form-control">
                                        <option value="0" <?php echo $data->access == 1 ? 'selected' : ''; ?>>Admin</option>
                                        <option value="1" <?php echo $data->access == 2 ? 'selected' : ''; ?>>Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" <?php echo $data->status == 0 ? 'selected' : ''; ?>>Inactive</option>
                                        <option value="1" <?php echo $data->status == 1 ? 'selected' : ''; ?>>Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary" <?php echo !$id ? 'disabled' : ''; ?> id="usrSubBtn"><?php echo $id ? 'Update ' : 'Add '; ?> User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->