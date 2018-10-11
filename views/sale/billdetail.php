<?php 
	include_once 'views/admin/layout/header.php';
?>
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item ">Danh sách hóa đơn</li>
            <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
          </ol>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>FASHE MOBILE</h3>
				<p>Add: </p>
				<p>Hotline: 01292912397</p>
			</div>
			<div class="col-md-6">
				<h3>HÓA ĐƠN BÁN HÀNG</h3>
				<p>MÃ HÓA ĐƠN: <?=$result[0]['MA_HD']?></p>
				<p>NGÀY BÁN: <?=$result[0]['NGAY_BAN']?></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md">
				<p><b>Khách hàng: <?=$result[0]['TEN_KH']?></b></p>
				<p><b>Khách hàng: <?=$result[0]['SDT']?></b></p>
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

		<div class="row">
			<?php 
				if ($data['STATUS']==1) {
			?>
				<div class="col-md-6" style="padding-left: 150px;">
					<a onclick="onprint()" class="btn btn-success">In hóa đơn</a>
				</div>
			<?php
				}else{
			?>
				<div class="col-md-6" style="padding-left: 150px;">
					<a class="btn btn-success" href="?mod=sale&act=checked&MA_HD=<?=$result[0]['MA_HD']?>">Xác nhận</a>
					<a class="btn btn-danger" href="?mod=sale&act=checked_fail&MA_HD=<?=$result[0]['MA_HD']?>" >Hủy bỏ</a>
				</div>
			<?php
				}
			 ?>

			<div class="col-md-6" style="text-align: right; padding-right: 150px;">
				
				<?php 
					if ($data['STATUS']==1) {
				?>
					<p><b>Người bán hàng</b></p>
					<p><?=$result[0]['TEN_NV']?></p>
				<?php
					}
				 ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	  function onprint(){
	  	$('.sidebar').css('display','none');
        $('.navbar').css('display','none');
        $('.card-header').css('margin-top','50px');
        $('.breadcrumb').css('display','none');
	    window.print();
	  }
	  $(document).click(function(){
        $('.sidebar').css('display','inline');
        $('.navbar').css('display','flex');
        $('.card-header').css('margin-top','0px');
    });
	</script>
<?php
	include_once 'views/admin/layout/footer.php';
 ?>
 