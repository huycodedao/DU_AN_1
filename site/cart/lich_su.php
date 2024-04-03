<?php
require '../../global.php';
require '../../dao/hoa_don.php'; 

if (isset($_SESSION['user'])) {
    $ma_kh = $_SESSION['user']['ma_kh'];

    $lich_su_don_hang = hoa_don_select_by_khach_hang($ma_kh);

    $VIEW_NAME = "lich_su_don_hang.php";
} else {
    header("Location: $SITE_URL/tai-khoan/dang-nhap.php");
    exit();
}

require '../layout.php'; // Giả sử bạn có một layout chung
