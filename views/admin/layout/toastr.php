<?php
if (isset($_COOKIE['msg_add_success'])) {
	?> 
	<script type="text/javascript">
		toastr.success("Thêm mới thành công !!!");
	</script>
	<?php
} 
?>

<?php
if (isset($_COOKIE['msg_update_success'])) {
	?> 
	<script type="text/javascript">
		toastr.success("Cập nhật thành công !!!");
	</script>
	<?php
} 
?>

<?php
	if (isset($_COOKIE['msg_delete_success'])) {
?> 
	<script type="text/javascript">
		toastr.warning("Xóa thành công !!!");
	</script>
<?php
} 
?>
<?php
if (isset($_COOKIE['msg_cart_success'])) {
	?> 
	<script type="text/javascript">
		toastr.success("Thêm vào giỏ hàng thành công !!!");
	</script>
	<?php
} 
?>

<?php
	if (isset($_COOKIE['msg_reduce'])) {
?> 
	<script type="text/javascript">
		toastr.warning("Giảm số lượng thành công !!!");
	</script>
<?php
} 
?>