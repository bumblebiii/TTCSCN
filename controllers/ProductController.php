<?php 

	include_once("models/Product.php");
	class ProductController{
		function detail(){
			$product_model = new Product();
			$MA_SP = $_GET['MA_SP'];
			$row = $product_model->find($MA_SP);

			require_once("views/product/detail.php");

		}

		function add(){
			$product_model = new Product();

			$LSP = $product_model->All_LSP();
			$NSX = $product_model->All_NSX();

			require_once("views/product/add.php");
		}

		function store(){
			$product_model = new Product();

			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data['submit']);
				$ANH = $_FILES['ANH'];
					// echo "<pre>";
					// 	print_r($data);
					// echo "</pre>";
					// 	echo "<pre>";
					// 		print_r($ANH);
					// 	echo "</pre>";
					// 	die;
				foreach ($ANH['name'] as $key => $value) {
					$target_dir = "public/user/images/uploads/";  // thư mục chứa file upload

				    $target_file = $target_dir.time() . basename($value); // link sẽ upload file lên
				    
				    if (move_uploaded_file($ANH["tmp_name"][$key], $target_file)) {
				    	$data['ANH'.$key]=time().basename($value);
				    }
				}
			    $status = $product_model->create($data);

			    if ($status==1) {
			    	header("Location: index.php?mod=admin&act=product");
			    	setcookie('msg_add','Thêm mới thành công !!!',time()+1);
			    }else{
			    	setcookie('msg_fail','Thêm mới thất bại !!!',time()+1);
			    }
			}

		}

		function edit(){
			$product_model = new Product();

			$MA_SP = $_GET['MA_SP'];

			$san_pham = $product_model->find($MA_SP);

			$LSP = $product_model->All_LSP();
			$NSX = $product_model->All_NSX();

			require_once("views/product/edit.php");
		}

		function update(){
			$product_model = new Product();

			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data['submit']);
					$ANH = $_FILES;

					foreach ($ANH as $key => $value) {
						$target_dir = "public/user/images/uploads/";

						$target_file = $target_dir.time().basename($value);

						if (move_uploaded_file($ANH['tmp_name'][$key],$target_file)) {
							$data['ANH'.$key] = time().basename($value);
						}
					}

				$status = $product_model->update($data);

				if ($status==1) {
					setcookie('msg_update_success','Cập nhật thành công !!', time()+1);
					header("Location: index.php?mod=admin&act=product");
				}else{
					setcookie('msg_fail','Cập nhật thất bại !!', time()+1);
				}

			}
		}

		function delete(){
			$product_model = new Product();

			$MA_SP = $_GET['MA_SP'];

			$status = $product_model->delete($MA_SP);

			if ($status == 1) {
				header("Location: index.php?mod=admin&act=product");
				setcookie('msg_delete_success','Xóa thành công !!!',time()+1);
			}else{
				setcookie('msg_fail','Xóa thất bại !!!',time()+1);
			}
		}

		
	}
 ?>