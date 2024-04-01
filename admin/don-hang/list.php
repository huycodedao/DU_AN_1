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
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($items as $item){
                                extract($item);
                        ?>
                        <tr>
                            <td><?= 'Pandora-HD'.$ma_hd ?></td>
                            <td><?= $ho_ten ?></td>
                            <td><?= $ngay_nhap ?></td>
                            <td><?= $ghi_chu ?></td>
                            <td><?php
                                if($phuong_thuc_tt=="tiền mặt"){
                                    echo "đã thanh toán";
                                }
                                else{
                                    echo "chưa thanh toán";
                                }
                            ?></td>
                            <td><a href="in.php?id=">in hóa đơn</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>

                </table>

                
            </form>
        </div>
    </div>
</div>