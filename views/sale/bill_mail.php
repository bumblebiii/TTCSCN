<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>NGUYỄN VĂN LUÂN</h3>
				<p>Add: </p>
				<p>Hotline: 01292912397</p>
			</div>
			<div class="col-md-6">
				<h3>HÓA ĐƠN BÁN HÀNG</h3>
				<p>MÃ HÓA ĐƠN: <?=$result[0]['MA_HD']?></p>
				<p>NGÀY BÁN: <?=$result[0]['NGAY']?></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md">
				<p><b>Khách hàng: <?=$result[0]['TEN_SP']?></b></p>
				<p><b>Số điện thoại: <?=$result[0]['SDT']?></b></p>
				<p><b>Địa chỉ: <?=$result[0]['ADDRESS']?></b></p>
			</div>
		</div>

		<table class="table table-bordered" style="text-align: center;">
			<thead>
				<td><b>STT</b></td>
				<td><b>Mã SP</b></td>
				<td><b>Tên SP</b></td>
				<td><b>SL</b></td>
				<td><b>Đơn giá</b></td>
				<td><b>Thành tiền</b></td>
			</thead>
			<tbody>
				<?php 
					$i=0;
					$tong = 0;
					foreach ($result as $value) {
						$i++;
						$tong += $value['THANH_TIEN'];
				?>
					<tr>
						<td><?=$i?></td>
						<td><?=$value['MA_SP']?></td>
						<td><?=$value['TEN_SP']?></td>
						<td><?=$value['SO_LUONG']?></td>
						<td><?=number_format($value['GIA_BAN'])?></td>
						<td style="text-align: right;"><?=number_format($value['THANH_TIEN'])?></td>
					</tr>
				<?php
					}
				 ?>
			</tbody>
				<tr>
					<td colspan="5" style="text-align: right"><b>TỔNG TIỀN</b></td>
					<td style="text-align: right"><?=number_format($tong)?></td>
				</tr>
		</table>
	</div>
</body>
</html>