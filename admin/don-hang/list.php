<?php

if (!isset($items) || !is_array($items)) {
    $items = []; 
}

?>
<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách đơn hàng</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã Đơn</th>
                            <th>Tên Khách hàng</th>
                            <th>Ngày tạo</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th>Giao hàng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $item): ?>
                        <tr>
                            <td><?= 'Pandora-HD'.$item['ma_hd'] ?></td>
                            <td><?= $item['ho_ten'] ?></td>
                            <td><?= $item['ngay_nhap'] ?></td>
                            <td><?= $item['ghi_chu'] ?></td>
                            <td><?php
                                echo $item['phuong_thuc_tt'] == "tiền mặt" ? "đã thanh toán" : "chưa thanh toán";
                            ?></td>
                            <td>
                                <form action="cap_nhat.php" method="post">
                                    <input type="hidden" name="ma_hd" value="<?= $item['ma_hd'] ?>">
                                    <select name="trang_thai_giao_hang" onchange="this.form.submit()">
                                        <option value="chưa giao" <?= $item['giao_hang'] == 'chưa giao' ? 'selected' : '' ?>>Chưa giao</option>
                                        <option value="đang giao" <?= $item['giao_hang'] == 'đang giao' ? 'selected' : '' ?>>Đang giao</option>
                                        <option value="đã giao" <?= $item['giao_hang'] == 'đã giao' ? 'selected' : '' ?>>Đã giao</option>
                                    </select>
                                </form>
                            </td>
                            <td><a href="in.php?id=<?= $item['ma_hd'] ?>">In hóa đơn</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
