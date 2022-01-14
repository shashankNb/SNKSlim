<h2>Manage Users</h2>

<?php
    $queryString = ['page' => 'user', 'id' => 'id'];
    $elementType = 'BUTTON';
    $html_attributes = ['class' => 'btn btn-primary'];
    $icon = 'fas fa-users';
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
    $pagination = new pagination(20, $rowCount, '?pg=userManage');
    $users = $obj->select($col,"tbl_users ORDER BY name LIMIT {$pagination->limit["first"]}, {$pagination->limit["second"]}");

    $dataTable = new DataTable();
    $dataTable->createTable($columns, $users);
?>
<?php echo $pagination->output ; ?>







