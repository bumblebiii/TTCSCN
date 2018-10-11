<?php 
	include_once 'views/admin/layout/header.php';
?>
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item active">Quản lý khách hàng</li>
          </ol>
	<div class="container">
		<center><h1>Danh sách khách hàng</h1></center>
		<button data-toggle="modal" data-target="#add" class="btn btn-info">Thêm mới</button>
		<table class="table table-bordered" style="text-align: center;" id="dataTable">
			<thead>
				<td><b>STT</b></td>
				<td><b>MÃ KH</b></td>
				<td><b>TÊN KH</b></td>
				<td><b>EMAIL</b></td>
				<td><b>ĐỊA CHỈ</b></td>
				<td><b>SỐ ĐIỆN THOẠI</b></td>
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
 						<td><?=$value['MA_KH']?></td>
 						<td><?=$value['TEN_KH']?></td>
 						<td><?=$value['EMAIL']?></td>
 						<td><?=$value['ADDRESS']?></td>
 						<td><?=$value['SDT']?></td>
 						<td>
 							<a href="?mod=sale&act=purchase&MA_KH=<?=$value['MA_KH']?>" class="btn btn-secondary">Tạo hóa đơn</a>
 						</td>
 					</tr>
 				<?php
 					}
				 ?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <?php 
	                include("views/customer/add.php");
	             ?>
	        </div>
	      </div>
	  </div>
<?php
	include_once 'views/admin/layout/footer.php';
 ?>