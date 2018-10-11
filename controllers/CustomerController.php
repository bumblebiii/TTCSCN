<?php 
	include_once 'models/Customer.php';

	class CustomerController{
		function store(){
			$customer_model = new Customer();

			if (isset($_POST['submit'])) {
				$data = $_POST;

				unset($data['submit']);

				$data['MA_KH'] = 'KH'.$this->rand_string(5);

				// $target_dir = "public/img/avt_Employee_uploads/";

				// $target_file = $target_dir.time().basename($_FILES['AVT']['name']);

				// if (move_uploaded_file($_FILES['AVT']['tmp_name'],$target_file)) {
				// 	$data['AVT']=time().basename($_FILES['AVT']['name']);
				// }

				$status = $customer_model->create($data);

				if ($status==1) {
					header("Location: index.php?mod=admin&act=employee");
					setcookie('msg_add_success','Thêm khách hàng thành công !!!',time()+1);
				}else{
					setcookie('msg_add_fail','Thêm khách hàng thất bại !!!',time()+1);
				}
			}
		}
		function rand_string( $length ) {
			$str='';
			$chars = "0123456789";
			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			 }
			return $str;
			}
	}
 ?>