<?php
require_once "../../dao/pdo.php";
require_once "../../dao/don-hang.php"; 
require "../../global.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_hd = isset($_POST['ma_hd']) ? $_POST['ma_hd'] : '';
    $trang_thai_giao_hang = isset($_POST['trang_thai_giao_hang']) ? $_POST['trang_thai_giao_hang'] : '';

    if ($ma_hd !== '' && $trang_thai_giao_hang !== '') {
        $sql = "UPDATE hoa_don SET giao_hang = ? WHERE ma_hd = ?";
        try {
            pdo_execute($sql, $trang_thai_giao_hang, $ma_hd);
        } catch (PDOException $e) {
            die("Lỗi cập nhật trạng thái: " . $e->getMessage());
        }
    } else {
        echo "Dữ liệu không hợp lệ.";
    }
}

header('Location: index.php?btn_list');
?>