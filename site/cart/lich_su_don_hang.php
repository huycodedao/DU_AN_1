<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-top: 5rem; margin-bottom: 0rem">Lịch sử đơn hàng</h5>



<div class="container">

    
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã Đơn</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Giao hàng</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">

                <?php foreach ($lich_su_don_hang as $don_hang): ?>
                <tr>
                    <td>PANDORA-HD<?= $don_hang['ma_hd'] ?></td>
                    <td><?= $don_hang['ngay_nhap'] ?></td>
                    <td><?= number_format($don_hang['tong_gia']) ?> VNĐ</td>
                    <td><?= $don_hang['phuong_thuc_tt'] ?></td>
                    <td><?= $don_hang['giao_hang'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
    
</div>



