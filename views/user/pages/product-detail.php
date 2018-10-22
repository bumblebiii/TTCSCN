<?php 
	include_once 'views/user/layout/header.php';
?>
		<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="?" class="s-text16">
			Trang chủ
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="?mod=index&act=product" class="s-text16">
			<?php 
				if ($data['MA_LOAI_SP']==1) {
					echo "Điện thoại";
				}else{
					echo "Máy tính bảng";
				}
			 ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			<?php 
				if ($data['MA_NSX']==1) {
					echo "Apple";
				}else if ($data['MA_NSX']==2) {
					echo "Samsung";
				}else if ($data['MA_NSX']==3) {
					echo "Oppo";
				}else if ($data['MA_NSX']==4) {
					echo "Xiaomi";
				}
			 ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?=$data['TEN_SP']?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="public/user/images/uploads/<?=$data['ANH0']?>">
							<div class="wrap-pic-w">
								<img src="public/user/images/uploads/<?=$data['ANH0']?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="public/user/images/uploads/<?=$data['ANH1']?>">
							<div class="wrap-pic-w">
								<img src="public/user/images/uploads/<?=$data['ANH1']?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="public/user/images/uploads/<?=$data['ANH2']?>">
							<div class="wrap-pic-w">
								<img src="public/user/images/uploads/<?=$data['ANH2']?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
				<div class="fb-comments" data-href="http://ttcscn.vn/index.php?mod=index&amp;act=productdetail&MA_SP=<?=$data['TEN_SP']?>" data-numposts="8"></div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<b><?=$data['TEN_SP']?></b>
				</h4>

				<?php 
				if ($data['khuyen_mai']!=0) {
					?>
					<span class="m-text17" style="color: red; font-weight: bold;">
						<?php 
						$gia= ($data['GIA_BAN'] *(100 - $data['khuyen_mai']))/100;
						echo number_format($gia);
						?> VNĐ
					</span>
					<span class="m-text17" style="text-decoration:  line-through;"><?=number_format($data['GIA_BAN'])?> VNĐ</span>
					<?php
				}else{
					?>
					<span class="block2-price m-text6 p-r-5" style="color: red; font-weight: bold;">
						<?=number_format($data['GIA_BAN'])?> VNĐ
					</span>
					<?php
				}
				?>

				<p class="s-text8 p-t-10">
					Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
				</p>

				<p class="s-text8 p-t-10">
					<center><h3>THÔNG TIN SẢN PHẨM</h3></center>
					<table class="table table-bordered">
						<tr>
							<td><b>Bộ nhớ trong</b></td>
							<td><?=$data['BO_NHO_TRONG']?></td>
						</tr>
						<tr>
							<td><b>RAM</b></td>
							<td><?=$data['RAM']?></td>
						</tr>
						<tr>
							<td><b>Camera</b></td>
							<td><?=$data['CAMERA']?></td>
						</tr>
					</table>
					<button class="btn btn-info" data-toggle="modal" data-target="#detail">Xem chi tiết</button>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<a style="color: white" href="?mod=index&act=add2cart&MA_SP=<?=$data['MA_SP']?> " class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm tương tự
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					<?php 
						foreach ($rate_product as $rate_value) {
					?>
						<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative <?= ($rate_value['khuyen_mai']!=0)? 'block2-labelsale': '';?>">
								<img src="public/user/images/uploads/<?=$rate_value['ANH2']?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4" style="color: white">
										<ul>
											<li><b><h5>THÔNG TIN SẢN PHẨM</h5></b></li>
											<li>Bộ nhớ: <?=$rate_value['BO_NHO_TRONG']?> </li>
											<li>RAM: <?=$rate_value['RAM']?></li>
											<li>Camera: <?=$rate_value['CAMERA']?></li>
											<li><a href="?mod=index&act=productdetail&MA_SP=<?=$rate_value['MA_SP']?>" style="color: red">Xem chi tiết</a></li>
										</ul>
										<!-- Button -->
										<a href="?mod=index&act=add2cart&MA_SP=<?=$rate_value['MA_SP']?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="?mod=index&act=productdetail&MA_SP=<?=$rate_value['MA_SP']?>" class="block2-name dis-block s-text3 p-b-5">
									<?=$rate_value['TEN_SP']?>
								</a>

								<?php 
										if ($rate_value['khuyen_mai']!=0) {
									?>
										<span class="block2-price m-text6 p-r-5" style="color: red; font-weight: bold;">
											<?php 
												$gia= ($rate_value['GIA_BAN'] *(100 - $rate_value['khuyen_mai']))/100;
											    echo number_format($gia);
											    ?> VNĐ
										</span>
										<span class="price-cost"><?=number_format($rate_value['GIA_BAN'])?> VNĐ</span>
									<?php
										}else{
									?>
										<span class="block2-price m-text6 p-r-5" style="color: red; font-weight: bold;">
											<?=number_format($rate_value['GIA_BAN'])?> VNĐ
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
			</div>

		</div>
	</section>
	<div class="modal fade" id="detail">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Thông tin sản phẩm</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					
				</div>
				<div class="modal-body">
					<div class="modal-body">
                    
                    <ul class="fs-dttsktul" style="max-width : 100%;">
                        
                        
                                    <li class="fs-dttskt-tit">Màn hình</li>
                                        <li>
                                            <label data-id="10">Màu màn hình :</label>
											<span>16 Triệu màu</span>
                                        </li>
                                        <li>
                                            <label data-id="534">Chuẩn màn hình :</label>
											<span>Super Retina HD</span>
                                        </li>
                                        <li>
                                            <label data-id="12">Độ phân giải:</label>
											<span>2436 x 1125 pixel</span>
                                        </li>
                                        <li>
                                            <label data-id="13">Công nghệ cảm ứng :</label>
											<span>	3D Touch</span>
                                        </li>
                                        <li>
                                            <label data-id="1246">Mặt kính màn hình :</label>
											<span>Kính cường lực</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Camera Trước</li>
                                        <li>
                                            <label data-id="1333">Video Call :</label>
											<span>Có</span>
                                        </li>
                                        <li>
                                            <label data-id="1332">Độ phân giải :</label>
											<span>7.0 MP</span>
                                        </li>
                                        <li>
                                            <label data-id="1334">Thông tin khác :</label>
											<span>ƒ/2.2, Auto HDR</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Camera Sau</li>
                                        <li>
                                            <label data-id="1328">Độ phân giải :</label>
											<span>Dual 12.0 MP</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Cấu hình phần cứng</li>
                                        <li>
                                            <label data-id="650">Số nhân :</label>
											<span>6</span>
                                        </li>
                                        <li>
                                            <label data-id="651">Chipset :</label>
											<span>Apple A11 Bionic</span>
                                        </li>
                                        <li>
                                            <label data-id="652">RAM :</label>
											<span>	3 GB</span>
                                        </li>
                                        <li>
                                            <label data-id="653">Chip đồ họa (GPU) :</label>
											<span>Apple GPU (three-core graphics)</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Bộ nhớ &amp; Lưu trữ</li>
                                        <li>
                                            <label data-id="23">Danh bạ lưu trữ :</label>
											<span>Không giới hạn</span>
                                        </li>
                                        <li>
                                            <label data-id="24">ROM :</label>
											<span>64 GB</span>
                                        </li>
                                        <li>
                                            <label data-id="25">Thẻ nhớ ngoài :</label>
											<span>Không</span>
                                        </li>
                                        <li>
                                            <label data-id="151">Hỗ trợ thẻ nhớ tối đa :</label>
											<span>Không</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Thiết kế &amp; Trọng lượng</li>
                                        <li>
                                            <label data-id="748">Kiểu dáng :</label>
											<span>Thanh (thẳng) + Cảm ứng </span>
                                        </li>
                                        <li>
                                            <label data-id="1247">Chất liệu :</label>
											<span>Khung kim loại + mặt kính cường lực</span>
                                        </li>
                                        <li>
                                            <label data-id="749">Kích thước :</label>
											<span>143.6 x 70.9 x 7.7 mm</span>
                                        </li>
                                        <li>
                                            <label data-id="212">Trọng lượng  :</label>
											<span>174 g</span>
                                        </li>
                                        <li>
                                            <label data-id="1248">Khả năng chống nước :</label>
											<span>Chuẩn IP67</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Thông tin pin</li>
                                        <li>
                                            <label data-id="194">Loại pin :</label>
											<span>	Li-Ion</span>
                                        </li>
                                        <li>
                                            <label data-id="36">Dung lượng pin :</label>
											<span>2716 mAh</span>
                                        </li>
                                        <li>
                                            <label data-id="750">Pin có thể tháo rời :</label>
											<span>Không</span>
                                        </li>
                                    <li class="fs-dttskt-tit">Kết nối &amp; Cổng giao tiếp</li>
                                        
                                        <li>
                                            <label data-id="33">Kết nối USB :</label>
											<span>Lightning</span>
                                        </li>
                                    
                                        <li>
                                            <label data-id="752">Băng tần 4G :</label>
											<span>Có</span>
                                        </li>
                                        <li>
                                            <label data-id="156">Loại SIM :</label>
											<span>	Nano Sim</span>
                                        </li>
                                        <li>
                                            <label data-id="753">Khe cắm sim :</label>
											<span>1 Sim</span>
                                        </li>
                                        <li>
                                            <label data-id="28">Wifi :</label>
											<span>802.11ac Wi‑Fi with MIMO</span>
                                        </li>
                                        <li>
                                            <label data-id="31">GPS :</label>
											<span>Có</span>
                                        </li>
                                        <li>
                                            <label data-id="30">Bluetooth :</label>
											<span> v5.0</span>
                                        </li>
                                        <li>
                                            <label data-id="755">Cổng sạc :</label>
											<span>Lightning</span>
                                        </li>
                                        <li>
                                            <label data-id="35">Jack (Input &amp; Output) :</label>
											<span>Lightning</span>
                                        </li>
                                    
                    </ul>
                </div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
<?php
	include_once 'views/user/layout/footer.php';
 ?>