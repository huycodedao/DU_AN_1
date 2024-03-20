<?php

require_once 'pdo.php';

function danhmuctintuc_select_all($order = 'DESC')
{
    $sql = "SELECT * FROM danhmuctintuc ORDER BY id_danhmuc $order";
    return pdo_query($sql);
}

?>