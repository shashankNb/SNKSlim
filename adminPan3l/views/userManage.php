<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users
        <small>Manage users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">View Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box box-primary">
        <div class="box-header with-border">Users</div>
        <div class="box-body">
            <?php
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
            ?>
            <?php echo $pagination->output ; ?>
        </div>
    </div>
</section>
<!-- /.content -->







