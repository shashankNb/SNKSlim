<?php
include "db_connect.php";

class database_query extends db_connect
{
    public function select($table = NULL, $para = NULL, $value = NULL, $status = NULL)
    {
        $sql = "SELECT * FROM $table ";
        if (isset($para)) {
            $sql = $sql . " WHERE $para = '$value' ";
        }
        if (isset($status)) {
            $sql = $sql . " AND status='1'";
        }
        $conn = $this->database->prepare($sql);
        $conn->execute(array());
        return $conn;
    }

    public function redirect($url)
    {
        ?>
        <script>
            window.location='<?php echo $url ?>';
        </script>
        <?php
    }
}
$obj  = new database_query;
