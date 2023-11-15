<?php

require_once("../../vendor/autoload.php");
include_once("../../database/constants.php");
include_once("./../config/connect.php");
include_once("./../class/class.query.php");
include_once("./../class/class.functions.php");

$obj = new Functions();

$id = $_GET['id'];
$cn = $_GET['cn'];
$reference = $_GET['ref'];
$field = $_GET['div'];
$value = $_GET['val'];

if($value == '1')
{
    $value = '0';
    ?>
    <a href="javascript:void(0)" class="text-dark" onclick="changeStatus('<?php echo $id?>','<?php echo $cn?>','<?php echo $reference; ?>', '<?php echo $field; ?>', <?php echo $value; ?>)">
        <i class="fas fa-lightbulb"></i>
    </a>
    <?php
}
else
{
    $value = '1';
    ?>
    <a href="javascript:void(0)" class="text-success" onclick="changeStatus('<?php echo $id?>','<?php echo $cn?>','<?php echo $reference; ?>', '<?php echo $field; ?>', <?php echo $value; ?>)">
            <i class="fas fa-lightbulb"></i>
    </a>
    <?php
}
$obj->update('tbl_'.$reference ,array( $field => $value), 'id = ?', array($id));