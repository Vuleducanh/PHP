<link rel="stylesheet"  href="./assets/css/admin.css">
<link rel="stylesheet"  href="./assets/css/edit.css">
<link rel="stylesheet"  href="./assets/css/sweetalert2.min.css">
<link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<div id="content">
			    <h1 id="seen-detail">Click vào id để xem chi tiết đơn hàng</h1>
                <div id="div-table">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th class="id">ID</th>
                                <th class="phone">Phone</th>
                                <th class="email">Email</th>
                                <th class="address center-text">Địa chỉ</th>
                                <th class="TotalQuanty">Số lượng</th>
                                <th class="dateOrder">Ngày đặt</th>
                                <th class="TotalAmount">Giá</th>
                                <th class="style1">Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($dataBill) && is_array($dataBill['dataBill'])): ?>
                            <?php foreach ($dataBill['dataBill'] as $bill): ?>
                            <tr>
                                <td><a href="http://localhost:8008/PHP/index.php?controller=admin&action=billDetailAdminPage&idBill=<?php echo $bill->getIdBill();?>" class="input-cell click_id" type="text"><?php echo $bill->getIdBill(); ?></a></td>
                                <td><a class="input-cell" type="text"><?php echo $bill->getPhone(); ?></a></td>
                                <td><a class="input-cell" type="text"><?php echo $bill->getEmail(); ?></a></td>
                                <td><textarea class="input-cell" id="input-address" rows="4" cols="50"><?php echo $bill->getAddress();  ?></textarea></td>
                                <td><a class="input-cell" type="text"><?php echo $bill->getTotalQuanty(); ?></a></td>
                                <td><a class="input-cell" type="text"><?php echo $bill->getOrderDate(); ?></a></td>
                                <td><a class="input-cell" type="text"><?php echo $bill->getTotalPrice(); ?></a></td>
                                <td><a class="input-cell" type="text"><?php echo $bill->getStatus(); ?></a></td>
                               	<td id="button-check">
                               		<a href="http://localhost:8008/PHP/index.php?controller=admin&action=confirmBill&idBill=<?php echo $bill->getIdBill();?>"><button type="button" class="confirm">Xác nhận</button></a>
                                    <a href="http://localhost:8008/PHP/index.php?controller=admin&action=cancelBill&idBill=<?php echo $bill->getIdBill();?>"><button type="button" class="cancel">Hủy</button></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                                <tr>
                                    <td colspan="12">Không có sản phẩm nào được tìm thấy.</td>
                                </tr>
                        <?php endif; ?>
                   
                            <!-- Thêm các dòng khác tương tự cho các sản phẩm khác -->
                        </tbody>
                    </table>
                </div>
</div>

<script src="./assets/JavaScript/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>