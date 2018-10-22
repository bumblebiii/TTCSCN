<?php 
	include_once 'views/admin/layout/header.php';
?>
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item active">Danh sách hóa đơn</li>
          </ol>
	<div class="container">
		<center><h1>Danh sách hóa đơn</h1></center>
		<table class="table table-bordered" style="text-align: center;" id="dataTable">
			<thead>
				<td><b>STT</b></td>
				<td><b>MÃ HÓA ĐƠN</b></td>
				<td><b>KHÁCH HÀNG</b></td>
				<td><b>NHÂN VIÊN</b></td>
				<td><b>NGÀY BÁN</b></td>
				<td><b>TỔNG TIỀN</b></td>
				<td><b>#</b></td>
			</thead>
			<tbody>
				<?php 
					$i=0;
 					foreach ($data as $value) {
 						$i++;
 				?>
 					<tr>
 						<td><?=$i?></td>
 						<td><?=$value['MA_HD']?></td>
 						<td><?=$value['MA_KH']?></td>
 						<td><?=$value['MA_NV']?></td>
 						<td><?=$value['NGAY_BAN']?></td>
 						<td><?=number_format($value['TONG_TIEN'])?></td>
 						<td>
 							<?php 
								if ($value['STATUS']==1) {
							?>
								<a href="?mod=sale&act=billDetail&MA_HD=<?= $value['MA_HD']?>" class="btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i></a>
							<?php
								}else{
							?>
								<a href="?mod=sale&act=billDetail&MA_HD=<?= $value['MA_HD']?>" class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></a>
							<?php
								}
							 ?>
 						</td>
 					</tr>
 				<?php
 					}
				 ?>
			</tbody>
		</table>
	</div>
<?php
	include_once 'views/admin/layout/footer.php';
 ?>