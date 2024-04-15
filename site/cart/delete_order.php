<?php
require '../../global.php';
require '../../dao/hoa_don.php';

session_start();

// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user'])) {
    header("Location: $SITE_URL/tai-khoan/dang-nhap.php");
    exit();
}

// Kiểm tra mã hóa đơn được cung cấp qua GET
if (isset($_GET['ma_hd'])) {
    $ma_hd = $_GET['ma_hd'];

    // Thực hiện hàm xóa hóa đơn
    hoa_don_delete($ma_hd);

    // Gửi thông báo xóa thành công
    $_SESSION['flash_message'] = 'Đơn hàng đã được xóa thành công.';
    header("Location: $SITE_URL/cart/lich_su.php"); // Chỉnh sửa lại đường dẫn phù hợp
    exit();
} else {
    // Trả về lỗi nếu không có mã hóa đơn
    $_SESSION['error_message'] = 'Không tìm thấy đơn hàng để xóa.';
    header("Location: $SITE_URL/cart/lich_su.php"); // Chỉnh sửa lại đường dẫn phù hợp
    exit();
}
?>
