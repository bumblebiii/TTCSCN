<?php 
	include_once 'views/user/layout/header.php';
?>
		<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="?" class="s-text16">
			Trang chủ
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Giỏ hàng
		</span>
	</div>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Sản phẩm</th>
							<th class="column-3">Đơn giá</th>
							<th class="column-4 p-l-70">Số lượng</th>
							<th class="column-5">Thành tiền</th>
							<th class="column-6">#</th>
						</tr>

						<?php 
							if (!empty($cart)) {
								$tongtien=0;
								foreach ($cart as $valuecart) {
									$tongtien += $valuecart['SO_LUONG']*$valuecart['GIA_BAN'] - ($valuecart['SO_LUONG']*$valuecart['GIA_BAN']*$valuecart['khuyen_mai'])/100;
							
						?>
							<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="public/user/images/uploads/<?=$valuecart['ANH2']?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><b><?=$valuecart['TEN_SP']?></b></td>
							<td class="column-3"><?=number_format($valuecart['GIA_BAN'])?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<a href="?mod=index&act=sub&MA_SP=<?=$valuecart['MA_SP']?>" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</a>

									<input class="size8 m-text18 t-center num-product" type="number" name="SO_LUONG" value="<?=$valuecart['SO_LUONG']?>">
									

									<a href="?mod=index&act=add2cart&MA_SP=<?=$valuecart['MA_SP']?>" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</a>
								</div>
							</td>
								<td class="column-5"><?=number_format($valuecart['SO_LUONG']*$valuecart['GIA_BAN'] - ($valuecart['SO_LUONG']*$valuecart['GIA_BAN']*$valuecart['khuyen_mai'])/100)?></td>

							<td class="column-6">
								<a href="?mod=index&act=deleteproduct&MA_SP=<?=$valuecart['MA_SP']?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php
							}
						}
						 ?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
						<?php 
							if (isset($tong)) {
								echo "TỔNG TIỀN:  <b>".number_format($tongtien)."</b> VNĐ";
							}
						?>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#checkout">
						Checkout
					</button>
				</div>
			</div>
		</div>
	</section>
<?php
	include_once 'views/user/layout/footer.php';
 ?>