<?php
require_once "../../global.php";
require_once "../../dao/thong-ke.php";
//--------------------------------//



if (exist_param("chart")) {
    $VIEW_NAME = "chart.php";
} else {
    $VIEW_NAME = "list.php";
}
$items = thong_ke_hang_hoa();
$prices = thong_ke_tien();
$price=thong_ke_doanh_thu();
require "../layout.php";
?>