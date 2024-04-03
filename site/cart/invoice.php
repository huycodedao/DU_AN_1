<?php
require '../../global.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Nếu giỏ hàng trống, xử lý tại đây hoặc chuyển hướng người dùng đến trang giỏ hàng trước.
    header("Location: $SITE_URL/cart/list-cart.php");
    exit;
}

if (isset($_POST['btn_thanh_toan'])) {
    // Lấy thông tin từ form
    $ho_ten = $_POST['ho_ten'];
    $ma_kh = $_POST['ma_kh'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];
    $phuong_thuc_tt = $_POST['phuong_thuc_tt'];
    $trang_thai = $_POST['trang_thai']; 
    $ghi_chu = $_POST['ghi_chu'];

    try {
        // Kết nối đến cơ sở dữ liệu bằng PDO
        $dbh = new PDO('mysql:host=localhost;dbname=du_an1', 'root', '');

        // Đặt chế độ lấy lỗi PDO ra ngoài để có thể bắt lỗi nếu cần
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Chuẩn bị câu truy vấn SQL để chèn thông tin hóa đơn vào bảng cơ sở dữ liệu
        $sql = "INSERT INTO hoa_don (ma_kh, tong_gia, ghi_chu, phuong_thuc_tt, ngay_nhap, dia_chi)
                VALUES (:ma_kh, :tong_gia, :ghi_chu, :phuong_thuc_tt, NOW(), :dia_chi)";

        // Tạo đối tượng truy vấn SQL
        $stmt = $dbh->prepare($sql);

        // Bắt đầu một giao dịch
        $dbh->beginTransaction();

        // Tính tổng giá từ giỏ hàng
        $tong_gia = 0;
        foreach ($_SESSION['cart'] as $item) {
            $tong_gia += ($item['don_gia'] - $item['giam_gia']) * $item['sl'];
        }

        // Thực thi truy vấn với dữ liệu thay thế
        $stmt->execute([
            ':ma_kh' => $ma_kh,
            ':tong_gia' => $tong_gia,
            ':ghi_chu' => $ghi_chu,
            ':phuong_thuc_tt' => $phuong_thuc_tt,
            ':dia_chi' => $dia_chi
        ]);

        // Kết thúc giao dịch và lưu các thay đổi vào cơ sở dữ liệu
        $dbh->commit();

        // Đóng kết nối PDO
        $dbh = null;

        // Xóa giỏ hàng sau khi đã đặt hàng
        unset($_SESSION['cart']);
        unset($_SESSION['total_cart']);
        unset($_SESSION['tien']);

        //chuyển hướng 
        header("location: $SITE_URL/hang-hoa/liet-ke.php");
        // exit;
    } catch (PDOException $e) {
        // Xảy ra lỗi, hủy bỏ giao dịch và in ra thông báo lỗi
        $dbh->rollBack();
        echo "Lỗi: " . $e->getMessage();
    }
}
?>