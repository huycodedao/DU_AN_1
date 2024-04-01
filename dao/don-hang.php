<?php


require_once 'pdo.php';

function don_hang_select_all(){

    $sql = "SELECT *, kh.ho_ten FROM hoa_don hd JOIN khach_hang kh ON hd.ma_kh=kh.ma_kh";
    return pdo_query($sql);

}




?>