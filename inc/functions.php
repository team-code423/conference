<?php

function select_all($table, $where = null, $col = null, $eq = null)
{

    // $con = mysqli_connect("localhost","root","","notify");
    //mysqli_set_charset($con,"utf-8");

    if (!is_null($where) && !is_null($col) && !is_null($eq)) {
        $sql = "select * from $table $where $col = $eq";

    } else {
        $sql = "select * from $table";
    }
    $query = mysqli_query($GLOBALS['connect'], $sql);
    if ($query) {

        return $query;

    }
}
