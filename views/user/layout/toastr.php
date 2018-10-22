<?php
if (isset($_COOKIE['msg_add_success'])) {
	?> 
	<script type="text/javascript">
		toastr.success("Thêm số lượng thành công !!!");
	</script>
	<?php
} 
?>

<?php
if (isset($_COOKIE['msg_add_product'])) {
	?> 
	<script type="text/javascript">
		toastr.success("Thêm sản phẩm vào giỏ hàng thành công !!!");
	</script>
	<?php
} 
?>

<?php
	if (isset($_COOKIE['msg_sub_success'])) {
?> 
	<script type="text/javascript">
		toastr.warning("Bạn vừa giảm số lượng sản phẩm thành công !!!");
	</script>
<?php
} 
?>
<?php
if (isset($_COOKIE['msg_delete_product'])) {
	?> 
	<script type="text/javascript">
		toastr.warning("Xóa sản phẩm khỏi giỏ hàng thành công !!!");
	</script>
	<?php
} 
?>

<?php
	if (isset($_COOKIE['msg_checkout'])) {
?> 
	<script type="text/javascript">
		toastr.success("Xác nhận mua hàng thành công !!!");
	</script>
<?php
} 
?>