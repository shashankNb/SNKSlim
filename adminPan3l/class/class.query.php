<?php
class Query
{
    public function __construct()
    {

    }

    function select($field, $table, $param = '', $cond = '')
    {
        global $con;

        $sql = "	SELECT	$field	FROM	$table";

        if ($param != '')
        {
            $sql .= "	WHERE	$param";

            $stm = $con->prepare($sql);

            $stm->execute($cond);
        }

        else
        {
            $stm = $con->prepare($sql);

            $stm->execute();
        }

        return $stm->fetchAll(PDO::FETCH_CLASS);
    }

    function selectRow($field, $table, $param = '', $cond = '')
    {
        global $con;

        $sql = "	SELECT	$field	FROM	$table";

        if ($param != '')
        {
            $sql .= "	WHERE	$param";

            $stm = $con->prepare($sql);

            $stm->execute($cond);
        }

        else
        {
            $stm = $con->prepare($sql);

            $stm->execute();
        }

        return $stm->fetch(PDO::FETCH_OBJ);
    }

    function cselect($sql, $bind = '')
    {
        global $con;

        $stm = $con->prepare($sql);

        $stm->execute($bind);

        //echo $sql;
        return $stm->fetchAll(PDO::FETCH_CLASS);

    }

    function insert($table, $tbldata)
    {
        global $con;
        //echo '<pre>';
        //print_r($_POST);
        //echo '</pre>';
        $sql = "	INSERT	INTO	$table	(";

        $sql .= join(",", array_keys($tbldata));

        $sql .= ")	VALUES ( ";

        $cn = count($tbldata);

        $param = '?';

        for ($i = 1;$i < $cn;$i++)
        {
            $param .= ',?';
        }
        $sql .= $param . "	)";

        $data = "'";

        $data .= join("','", array_values($tbldata));

        $data .= "'";

        $stm = $con->prepare($sql);

        $data = array(
            $data
        );

        if ($stm->execute((array_values($tbldata)))) return $con->lastInsertId();
        else return false;
    }

    function update($table, $data, $clause, $bind)
    {
        global $con;

        $sql = "	UPDATE 	$table	SET 	";

        $sql .= join(" = ?, ", array_keys($data));

        $sql .= " = ?	WHERE 	$clause";

        //echo $sql;
        $bindData = array_values($data);

        /*$cn = count($bindData);

        $bindData[$cn]=$bindData[$cn-1];

        $bindData[$cn+1] = $bind;

        //$bindData = asort($data);*/

        $ln = count($data);

        $bindData = array_merge($bindData, $bind);

        /*echo '<pre>';
        print_r($bindData);
        echo '</pre>';*/

        $stm = $con->prepare($sql);

        $stm->execute($bindData);
    }

    function rowCount($field, $table, $param = '', $cond = '')
    {
        global $con;

        $sql = "	SELECT	$field	FROM	$table";

        if ($param != '')
        {
            $sql .= "	WHERE	$param";

            $stm = $con->prepare($sql);

            $stm->execute($cond);
        }

        else
        {
            $stm = $con->prepare($sql);

            $stm->execute();
        }

        $count = $stm->rowCount();

        return $count;
    }

    function delete($table, $param, $binds)
    {
        global $con;

        $sql = "	DELETE	FROM	$table WHERE	$param";

        $stm = $con->prepare($sql);

        $stm->execute($binds);
    }

}
?>
