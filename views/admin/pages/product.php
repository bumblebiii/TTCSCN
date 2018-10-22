<?php 
	include_once 'views/admin/layout/header.php';
?>
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item active">Quản lý sản phẩm</li>
          </ol>
	<div class="container">
		<center><h1>Danh sách sản phẩm</h1></center>
		<a href="?mod=product&act=add" class="btn btn-info">Thêm mới</a>
		<table class="table table-bordered" style="text-align: center;" id="dataTable">
			<thead>
				<td><b>STT</b></td>
				<td><b>MÃ SP</b></td>
				<td><b>TÊN SP</b></td>
				<td><b>SỐ LƯỢNG</b></td>
				<td><b>GIÁ BÁN</b></td>
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
 						<td><?=$value['MA_SP']?></td>
 						<td><?=$value['TEN_SP']?></td>
 						<td><?=$value['SO_LUONG']?></td>
 						<td><?=$value['GIA_BAN']?></td>
 						<td>
 							<a href="?mod=product&act=edit&MA_SP=<?=$value['MA_SP']?>" class="btn btn-secondary">Edit</a>
 							<a href="?mod=product&act=detail&MA_SP=<?=$value['MA_SP']?>" class="btn btn-primary">Detail</a>
 							<a href="?mod=product&act=delete&MA_SP=<?=$value['MA_SP']?>" class="btn btn-danger delete">Delete</a>
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