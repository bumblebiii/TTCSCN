<?php 
	include_once 'models/Employee.php';
	class EmployeeController{
		function detail(){
			$employee_model = new Employee();

			$MA_NV = $_GET['MA_NV'];

			$row = $employee_model->find($MA_NV);

			require_once("views/employee/detail.php");
		}

		function add(){
			require_once("views/employee/add.php");
		}

		function store(){
			$employee_model = new Employee();

			if (isset($_POST['submit'])) {
				$data = $_POST;

				unset($data['submit']);

				$data['PASSWORD'] = md5($data['PASSWORD']);

				// $target_dir = "public/img/avt_Employee_uploads/";

				// $target_file = $target_dir.time().basename($_FILES['AVT']['name']);

				// if (move_uploaded_file($_FILES['AVT']['tmp_name'],$target_file)) {
				// 	$data['AVT']=time().basename($_FILES['AVT']['name']);
				// }

				$status = $employee_model->create($data);

				if ($status==1) {
					header("Location: index.php?mod=admin&act=employee");
					setcookie('msg_add_success','Thêm nhân viên thành công !!!',time()+1);
				}else{
					setcookie('msg_add_fail','Thêm nhân viên thất bại !!!',time()+1);
				}
			}
		}

		function edit(){
			$MA_NV = $_GET['MA_NV'];

			$employee_model = new Employee();

			$row = $employee_model->find($MA_NV);

			require_once("views/employee/edit.php");
		}

		function update(){
			if (isset($_POST['submit'])) {
				$data =$_POST;

				unset($data['submit']);
				
				$data['PASSWORD'] = md5($data['PASSWORD']);
				// print_r($data);die;

				// $target_dir="public/img/avt_Employee_uploads/";

				// $target_file = $target_dir.time().basename($_FILES['AVT']['name']);

				// if (move_uploaded_file($_FILES['AVT']['tmp_name'],$target_file)) {
				// 	unlink("public/img/avt_Employee_uploads/".$data['anh']);
				// 	$data['AVT'] = time().basename($_FILES['AVT']['name']);
				// }else{
				// 	unset($data['AVT']);
				// }

				$employee_model = new Employee();

				$status = $employee_model->update($data);

				if ($status==1) {
					header("Location: ?mod=admin&act=employee");
					setcookie('msg_update_success','Cập nhật thành công !!',time()+1);
				}else{
					setcookie('msg_update_fail','Cập nhật thất bại !!',time()+1);
				}
			}
		}

		function delete(){
			$MA_NV = $_GET['MA_NV'];

			$employee_model = new Employee();

			$status = $employee_model->delete($MA_NV);

			if ($status==1) {
				header("Location: ?mod=admin&act=employee");
				setcookie('msg_delete_success','Xóa thành công !!',time()+1);

			}else{
				setcookie('msg_delete_fail','Xóa thất bại !!',time()+1);
			}
		}
	}
 ?>