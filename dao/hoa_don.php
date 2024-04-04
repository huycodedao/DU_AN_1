<?php


require_once 'pdo.php';



function hoa_don_select_by_khach_hang($ma_kh) {
    $sql = "SELECT * FROM hoa_don WHERE ma_kh = ? ORDER BY ngay_nhap DESC";
    return pdo_query($sql, $ma_kh);
}


?>