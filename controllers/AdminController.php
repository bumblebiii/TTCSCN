<?php 
	include_once 'models/Customer.php';
	include_once 'models/Employee.php';
	include_once 'models/Product.php';
	include_once 'models/Bill.php';
	
	class Admin{
		function index(){
			$customer_model = new Customer();
			$data = $customer_model->All();

			$employee_model = new Employee();
			$data1 = $employee_model->All();

			$product_model = new Product();
			$data2 = $product_model->All();

			$bill_model = new Bill();
			$data3 = $bill_model->All();

			$thang = date('m');
			$data4 = $product_model->topProduct($thang);

			$data5 = $product_model->inventory_products();

			if (isset($_POST['NGAY_BAN']) && isset($_POST['NAM_BAN'])) {
				$month = $_POST['NGAY_BAN'];
				$year = $_POST['NAM_BAN'];
			}elseif (isset($_POST['NAM_BAN'])) {
				$month = date('m');
				$year = $_POST['NAM_BAN'];
			}elseif (isset($_POST['NGAY_BAN'])) {
				$month = $_POST['NGAY_BAN'];
				$year = date('Y');
			}else{
				$month = date('m');
				$year= date('Y');
			}
			$data6 = $bill_model->statistical($month,$year);

			require_once 'views/admin/pages/index.php';
		}
		function customer(){
			$customer_model = new Customer();
			$data = $customer_model->All();
			require_once 'views/admin/pages/customer.php';
		}
		function employee(){
			$employee_model = new Employee();
			$data = $employee_model->All();
			require_once 'views/admin/pages/employee.php';
		}
		function product(){
			$product_model = new Product();
			$data = $product_model->All();
			require_once 'views/admin/pages/product.php';
		}

		function listBill(){
			$bill_model = new Bill();
			$data = $bill_model->All();
			require_once 'views/admin/pages/ListBill.php';
		}
	}
 ?>