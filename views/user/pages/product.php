<?php 
	include_once 'views/user/layout/header.php';
?>
		<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="?" class="s-text16">
			Trang chủ
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
		<a href="?" class="s-text16">
			Sản phẩm
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
	</div>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="?mod=index&act=product" class="s-text13 active1">
									All
								</a>
							</li>

							<li class="p-t-4">
								<a href="?mod=index&act=product&NSX=1&LSP=1" class="s-text13">
									Iphone
								</a>
							</li>

							<li class="p-t-4">
								<a href="?mod=index&act=product&NSX=2&LSP=1" class="s-text13">
									Samsung
								</a>
							</li>

							<li class="p-t-4">
								<a href="?mod=index&act=product&NSX=3&LSP=1" class="s-text13">
									Oppo
								</a>
							</li>

							<li class="p-t-4">
								<a href="?mod=index&act=product&NSX=4&LSP=1" class="s-text13">
									Xiaomi
								</a>
							</li>

							<li class="p-t-4">
								<a href="?mod=index&act=product&LSP=2" class="s-text13">
									Máy tính bảng
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–<?php $a=($total_sp>9)? 9 : $total_sp; echo "$a";  ?> of <?=$total_sp?> results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
						<?php 
							foreach ($data1 as $value) {
						?>
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative <?= ($value['khuyen_mai']!=0)? 'block2-labelsale': '';?>">
									<img src="public/user/images/uploads/<?=$value['ANH2']?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">

										<div class="block2-btn-addcart w-size1 trans-0-4" style="color: white">
											<ul>
												<li><b><h5>THÔNG TIN SẢN PHẨM</h5></b></li>
												<li>Bộ nhớ: <?=$value['BO_NHO_TRONG']?> </li>
												<li>RAM: <?=$value['RAM']?></li>
												<li>Camera: <?=$value['CAMERA']?></li>
												<li><a href="?mod=index&act=productdetail&MA_SP=<?=$value['MA_SP']?>" style="color: red">Xem chi tiết</a></li>
											</ul>
											<!-- Button -->
											<a href="?mod=index&act=add2cart&MA_SP=<?=$value['MA_SP']?>" class="btn-addcart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addcart">
												Add to Cart
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="?mod=index&act=productdetail&MA_SP=<?=$value['MA_SP']?>" class="block2-name dis-block s-text3 p-b-5">
										<b><?=$value['TEN_SP']?></b>
									</a>

									<?php 
										if ($value['khuyen_mai']!=0) {
									?>
										<span class="block2-price m-text6 p-r-5" style="color: red; font-weight: bold;">
											<?php 
												$gia= ($value['GIA_BAN'] *(100 - $value['khuyen_mai']))/100;
											    echo number_format($gia);
											    ?> VNĐ
										</span>
										<span class="price-cost"><?=number_format($value['GIA_BAN'])?> VNĐ</span>
									<?php
										}else{
									?>
										<span class="block2-price m-text6 p-r-5" style="color: red; font-weight: bold;">
											<?=number_format($value['GIA_BAN'])?> VNĐ
										</span>
									<?php
										}
									 ?>
								</div>
							</div>
						</div>
						<?php
							}
						 ?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<?php 
							if (isset($total_page)) {
								for ($i=1; $i <= $total_page ; $i++) { 
									if ($i == $current_page) {
										echo '<a href="?mod=index&act=product&page='.$i.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}else{
										echo '<a href="?mod=index&act=product&page='.$i.'" class="item-pagination flex-c-m trans-0-4">'.$i.'</a>';
									}
								}
							}
							if (isset($total_page1)) {
								for ($i=1; $i <= $total_page1 ; $i++) { 
									if ($i == $current_page1) {
										echo '<a href="?mod=index&act=product&LSP=1&page1='.$i.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}else{
										echo '<a href="?mod=index&act=product&LSP=1&page1='.$i.'" class="item-pagination flex-c-m trans-0-4">'.$i.'</a>';
									}
								}
							}
						 ?>
						<!-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a> -->
						<!-- <a href="#" class="item-pagination flex-c-m trans-0-4">2</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	include_once 'views/user/layout/footer.php';
 ?>