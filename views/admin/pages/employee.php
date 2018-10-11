<?php 
	include_once 'views/admin/layout/header.php';
?>
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item active">Quản lý nhân viên</li>
          </ol>
	<div class="container">
		<center><h1>Danh sách nhân viên</h1></center>
		<button class="btn btn-info" data-toggle="modal" data-target="#add">Thêm mới</button>
		<table class="table table-bordered" style="text-align: center;" id="dataTable">
			<thead>
				<td><b>STT</b></td>
				<td><b>MÃ NV</b></td>
				<td><b>TÊN NV</b></td>
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
 						<td><?=$value['MA_NV']?></td>
 						<td><?=$value['TEN_NV']?></td>
 						<td><?=$value['EMAIL']?></td>
 						<td><?=$value['ADDRESS']?></td>
 						<td><?=$value['SDT']?></td>
 						<td>
 							<a href="?mod=employee&act=edit&MA_NV=<?=$value['MA_NV']?>" class="btn btn-secondary">Edit</a>
 							<a href="?mod=employee&act=detail&MA_NV=<?=$value['MA_NV']?>" class="btn btn-primary">Detail</a>
 							<a href="?mod=employee&act=delete&MA_NV=<?=$value['MA_NV']?>" class="btn btn-danger">Delete</a>
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
	                include("views/employee/add.php");
	             ?>
	        </div>
	      </div>
	  </div>
<?php

	include_once 'views/admin/layout/footer.php';
 ?>