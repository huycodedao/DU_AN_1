<?php
require_once "../../dao/pdo.php";
require_once "../../dao/don-hang.php";
require "../../global.php";




extract($_REQUEST);
if (exist_param("btn_list")) {

    //show dữ liệu
    $items = don_hang_select_all();
    $VIEW_NAME = "list.php";
} 
require "../layout.php";


?>
