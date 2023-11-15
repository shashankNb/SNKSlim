<?php $err = $_GET['err'] ?? ''; ?>

<?php

if (isset($_GET['id'])) {
    if ($_SESSION['user_ko_access'] == 1) {
        $obj->delete('tbl_users', 'id = ?', array($_GET['id']));
        $obj->redirect("?pg=userManage&err=1");
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
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Manage Users</h5>
                    </div>
                    <div class="card-body">
                        <?php if($err=='0'): ?> <p class="alert alert-default-success rounded-0"><i class="fa fa-check-circle"></i> Item Saved</p> <?php endif; ?>
                        <?php if($err=='1'): ?> <p class="alert alert-default-danger rounded-0"><i class="fa fa-check-circle"></i> Item Deleted</p> <?php endif; ?>
                        <?php

                        /* ========== ADDED FOR AUTO DATATABLES ======================
                        $queryString = ['page' => 'user', 'id' => 'id'];
                        $elementType = 'BUTTON';
                        $html_attributes = ['class' => 'btn btn-primary'];
                        $icon = 'fa fa-users';
                        $label = 'Download';
                        $params = new Params($queryString, $elementType, $html_attributes, $icon, $label, true);

                        $columns = [
                            'id' => new Column('id', 'ID', 'ID', 'INTEGER'),
                            'name' => new Column('name', 'Full Name', 'Name'),
                            'email' => new Column('email', 'Email Address', 'E-Mail', 'STRING'),
                            'password' => new Column('password', 'Password', 'Key', 'STRING'),
                            'status' => new Column('status', 'Status', 'Active', 'DOLLAR'),
                            'access'=> new Column('access', 'Access', 'Acc', 'STRING', $params)
                        ];

                        $col = implode(',', array_map(function ($item) { return $item->name; }, $columns));
                        $rowCount = $obj->rowCount($col, 'tbl_users');
                        $pagination = new Pagination(10, $rowCount, '?pg=userManage');
                        $users = $obj->select($col,"tbl_users ORDER BY name LIMIT {$pagination->limit["first"]}, {$pagination->limit["second"]}");

                        $dataTable = new DataTable();
                        $dataTable->createTable($columns, $users);

                        ==============================================  */

                        $count = $obj->rowCount('*','tbl_users');
                        $pagination = new pagination(20, $count,"?pg=userManage");
                        $user_data = $obj->select('id, name, email, status, access', "tbl_users order by id DESC LIMIT {$pagination->limit['first']}, {$pagination->limit['second']}");
                        ?>
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Access</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($user_data as $i => $data): ?>
                                <tr>
                                    <td><?php echo $data->id; ?></td>
                                    <td><?php echo $data->email; ?></td>
                                    <td><?php echo $data->name; ?></td>
                                    <td>
                                        <span id="status-<?php echo $i; ?>">
                                            <a href="javascript:void(0)" class="text-<?php echo $data->status == 1 ? 'success' : 'dark'; ?>" onclick="changeStatus('<?php echo $data->id?>','<?php echo $i; ?>','users','status','<?php echo $data->status?>')">
                                                <i class="fas fa-lightbulb"></i>
                                            </a>
                                        </span>
                                    </td>
                                    <td><?php echo $data->access == 1 ? 'Admin' : 'Staff'; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL. '?pg=user&id='.$data->id; ?>" class="btn btn-default btn-sm btn-flat"><i class="fa fa-pencil-alt"></i> Edit</a>
                                        <?php if ($_SESSION['user_ko_access'] == 1): ?>
                                        <a data-toggle="confirmation" data-placement="bottom" data-title="Delete ?" href="<?php echo BASE_URL. '?pg=userManage&id='.$data->id; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i> Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="float-right">
                                <?php echo $pagination->output ; ?>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->







