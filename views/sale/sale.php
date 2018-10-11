<?php 
include_once 'views/admin/layout/header.php';
?>
<div class="row">
	<div class="col-md-5">
		<h2 align="center">DANH SÁCH SẢN PHẨM</h2>
		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add">Thêm mới</button> -->
		<table class="table table-bordered" style="text-align: center;" id="dataTable">
			<thead>
				<tr>
					<td align="center"><b>Mã sản phẩm</b></td>
					<td align="center"><b>Tên sản phẩm</b></td>
					<td align="center"><b>Đơn giá</b></td>
					<td align="center"><b>Action</b></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $row) { ?>
					<tr>
						<td><?= $row['MA_SP'] ?></td>
						<td><?= $row['TEN_SP'] ?></td>
						<td><?= number_format($row['GIA_BAN']) ?></td>
						<td>
							<?php 
								if ($row['SO_LUONG']>=1) {
							?>
								<a href="?mod=sale&act=add2cart&MA_SP=<?= $row['MA_SP'] ?>" class="btn btn-success"><i class="fas fa-cart-plus"></i></a> 
							<?php
								}
							 ?>

						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-7">
		<h2 align="center">HÓA ĐƠN BÁN HÀNG</h2>
		<table class="table table-bordered">
			<tr>
				<ul>
					<li><b>Mã KH:</b> <?=$customer['MA_KH']?> </li>
					<li><b>Tên KH:</b> <?=$customer['TEN_KH']?> </li>
					<li><b>Số điện thoại:</b> <?=$customer['SDT']?> </li>
					<li><b>Địa chỉ:</b> <?=$customer['ADDRESS']?> </li>
				</ul>
			</tr>
			<thead>
				<td align="center"><b>STT</b></td>
				<td align="center"><b>MÃ SP</b></td>
				<td align="center"><b>TÊN SP</b></td>
				<td align="center"><b>SỐ LƯỢNG</b></td>
				<td align="center"><b>ĐƠN GIÁ</b></td>
				<td align="center"><b>THÀNH TIỀN</b></td>
			</thead>
			<tbody>
				<?php 
							$i=0;
							$tong = 0;
							foreach ($cart as $sanpham) {
								$i++;
								$tong += $sanpham['SO_LUONG']*$sanpham['GIA_BAN'];	
				?>
							<tr>
								<td><?= $i;?></td>
								<td><?= $sanpham['MA_SP'];?></td>
								<td><?= $sanpham['TEN_SP'];?></td>
								<td>
									<a class=" btn-sm btn-danger" href="?mod=sale&act=remove_product&MA_SP=<?= $sanpham['MA_SP'] ?>">-</a>
									<?= $sanpham['SO_LUONG'];?>
									<a class=" btn-success btn-sm" href="?mod=sale&act=add2cart&MA_SP=<?= $sanpham['MA_SP'] ?>">+</a>	
								</td>
								<td><?= number_format($sanpham['GIA_BAN']);?></td>
								<td style="text-align: right;"><?= number_format($sanpham['SO_LUONG']*$sanpham['GIA_BAN']);?></td>
							</tr>
				<?php
					}
				?>
							<tr>
						 		<td colspan="5"><b>TỔNG TIỀN</b></td>
						 		<td style="text-align:right;"><b><?= number_format($tong);?></b></td>
						 	</tr>
				
			</tbody>
		</table>
		<?php 
			if (isset($_SESSION['cart'])) {
				if (!empty($_SESSION['cart'])) {
		?>
			<a href="?mod=sale&act=payment" class="btn btn-warning">Xác nhận mua hàng</a>
			<a href="?mod=sale&act=deletecart" class="btn btn-danger delete">Xóa toàn bộ giỏ hàng</a>
		<?php
				}
			}
		 ?>
	</div>
</div>
<?php
include_once 'views/admin/layout/footer.php';
?>