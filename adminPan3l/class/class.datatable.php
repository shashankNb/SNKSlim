<?php

use Carbon\Carbon as Carbon;

class DataTable {

    public function createTable($columns, $data) {
        include "commons/dataTable.php";
    }

    public function dataTransform($colType, $value)
    {
        $tableVal = strlen($value) > 15 ? substr($value, 0, 15) . '...' : $value;

        switch ($colType) {
            case 'INTEGER':
                echo '<span class="float-end">' . number_format($tableVal). '</span>';
                break;
            case 'FLOAT':
                echo '<span class="float-end">' . number_format($tableVal, 2). '</span>';
                break;
            case 'DOLLAR':
                echo '<span class="float-end">' . '$' . number_format($tableVal, 2). '</span>';
                break;
            case 'STRING':
                echo '<span class="float-start">' . $tableVal . '</span>';
                break;
            case 'DATE':
                echo '<span class="float-end">' . Carbon::parse(date('Y-m-d H:i:s'))->toFormattedDateString() . '</span>';
                break;
            default:
                echo $tableVal;
                break;
        }
    }
}
