<?php 
	session_start();
	include_once 'helpers/Middleware.php';
	$middleware = new Middleware();
	if (isset($_GET['mod'])) {
		$mod = $_GET['mod'];
	}else{
		$mod = 'index';
	}

	if (isset($_GET['act'])) {
		$act = $_GET['act'];
	}else{
		$act = 'index';
	}

	switch ($mod) {
		case 'index':
			include_once("controllers/UserController.php");
			$controller = new User();
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				case 'product':
					$controller->product();
					break;
				case 'productdetail':
					$controller->productdetail();
					break;
				case 'cart':
					$controller->cart();
					break;
				case 'blog':
					$controller->blog();
					break;
				case 'blogdetail':
					$controller->blogdetail();
					break;
				case 'contact':
					$controller->contact();
					break;
				case 'about':
					$controller->about();
					break;
				case 'add2cart':
					$controller->add2cart();
					break;
				case 'sub':
					$controller->sub();
					break;
				case 'deleteproduct':
					$controller->deleteproduct();
					break;
				case 'checkout':
					$controller->checkout();
					break;
				
				default:
					echo "<center><h1>404 Not Found Method Index</h1></center>";
					break;
			}
			break;
		case 'admin':
			include_once 'controllers/AdminController.php';
			$controller = new Admin();
			$middleware->isLogin();
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				case 'product':
					$controller->product();
					break;
				case 'employee':
					$middleware->checkRole();
					$controller->employee();
					break;
				case 'customer':
					$controller->customer();
					break;
				case 'listBill':
					$controller->listBill();
					break;
				
				default:
					echo "<center><h1>404 Not Found Method Admin</h1></center>";
					break;
			}
		case 'product':
			include_once 'controllers/ProductController.php';
			$controller = new ProductController();
			$middleware->isLogin();
			switch ($act) {
				case 'add':
					$controller->add();
					break;
				case 'store':
					$controller->store();
					break;
				case 'edit':
					$controller->edit();
					break;
				case 'update':
					$controller->update();
					break;
				case 'delete':
					$controller->delete();
					break;
				
				default:
					// echo "<center><h1>404 Not Found Method Product</h1></center>";
					break;
			}
			break;
		case 'employee':
			include_once 'controllers/EmployeeController.php';
			$controller = new EmployeeController();
			$middleware->isLogin();
			$middleware->checkRole();
			switch ($act) {
				case 'add':
					$controller->add();
					break;
				case 'store':
					$controller->store();
					break;
				case 'edit':
					$controller->edit();
					break;
				case 'update':
					$controller->update();
					break;
				case 'delete':
					$controller->delete();
					break;
				
				default:
					echo "<center><h1>404 Not Found Method Employee</h1></center>";
					break;
			}
			break;
		case 'customer':
			include_once 'controllers/CustomerController.php';
			$controller = new CustomerController();
			$middleware->isLogin();
			switch ($act) {
				case 'store':
					$controller->store();
					break;
				
				default:
					echo "<center><h1>404 Not Found Method Customer</h1></center>";
					break;
			}
			break;
		case 'sale':
			include_once 'controllers/SaleController.php';
			$controller = new SaleController();
			$middleware->isLogin();
			switch ($act) {
				case 'purchase':
					$controller->purchase();
					break;
				case 'sale':
					$controller->sale();
					break;
				case 'add2cart':
					$controller->add2cart();
					break;
				case 'remove_product':
					$controller->remove_product();
					break;
				case 'deletecart':
					$controller->deletecart();
					break;
				case 'payment':
					$controller->payment();
					break;
				case 'billDetail':
					$controller->BillDetail();
					break;
				case 'checked':
					$controller->checked();
					break;
				case 'checked_fail':
					$controller->checked_fail();
					break;
				
				default:
					echo "<center><h1>404 Not Found Method Sale</h1></center>";
					break;
			}
			break;
		case 'login':
			include_once 'controllers/LoginController.php';
			$controller = new LoginController();
			switch ($act) {
				case 'form':
					$controller->form();
					break;
				case 'postLogin':
					$controller->postLogin();
					break;
				case 'Logout':
					$controller->Logout();
					break;
				default:
					echo "<center><h1>404 Not Found Method Login</h1></center>";
					break;
			}
			break;
		default:
			echo "<center><h1>404 Not Found</h1></center>";
			break;
	}
 ?>