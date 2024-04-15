<?php


require_once 'pdo.php';



function hoa_don_select_by_khach_hang($ma_kh) {
    $sql = "SELECT * FROM hoa_don WHERE ma_kh = ? ORDER BY ngay_nhap DESC";
    return pdo_query($sql, $ma_kh);
}
function hoa_don_delete($ma_hd) {
    $sql = "DELETE FROM hoa_don WHERE ma_hd = ?";
    return pdo_execute($sql, $ma_hd);
}
function hoa_don_select_all()
{
    $sql = "SELECT * FROM hoa_don ORDER BY ma_hd desc";
    return pdo_query($sql);
}
?>