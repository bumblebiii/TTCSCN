<?php
	
	include_once 'models/Product.php';
	include_once 'models/Customer.php';
	include_once 'models/Bill.php';
	include_once 'models/Billdetail.php';
	class User{
		function index(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }

	        $product_model = new Product();

	        $data = $product_model->All();
			require_once("views/user/pages/index.php");
		}
		function cart(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			require_once("views/user/pages/cart.php");
		}
		function blog(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			require_once("views/user/pages/blog.php");
		}
		function blogdetail(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			require_once("views/user/pages/blog-detail.php");
		}
		function contact(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			require_once("views/user/pages/contact.php");
		}
		function product(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			$product_model = new Product();

			if(isset($_GET['LSP']) && isset($_GET['NSX'])){
				$MA_NSX = $_GET['NSX'];

				$MA_LOAI_SP = $_GET['LSP'];

				$data1 = $product_model->fiter_product($MA_NSX,$MA_LOAI_SP);
				
				$total_sp = count($data1);

				// require_once("views/user/pages/product.php");
				

			}elseif (isset($_GET['NSX'])) {
				$MA_NSX = $_GET['NSX'];

				$data1 = $product_model->fiter_NSX($MA_NSX);

				$total_sp = count($data1);

				// require_once("views/user/pages/product.php");

			}elseif (isset($_GET['LSP'])) {
				$MA_LOAI_SP = $_GET['LSP'];

				$data = $product_model->fiter_LSP($MA_LOAI_SP);

				$total_sp = count($data);

				$current_page1 = isset($_GET['page1'])? $_GET['page1'] : 1;

				$limit1 = 9;

				$total_page1 = ceil($total_sp/$limit1);

				if ($current_page1 > $total_page1){
		            $current_page1 = $total_page1;
		        }
		        else if ($current_page1 < 1){
		            $current_page11 = 1;
		        }
		        $start1 = ($current_page1 - 1) * $limit1;

		        $data1 = $product_model->pagination1_product($MA_LOAI_SP,$start1,$limit1);

		        // require_once("views/user/pages/product.php");
			}else{
				$data = $product_model->All();

				$total_sp = count($data);

				$current_page = isset($_GET['page'])? $_GET['page'] : 1;

				$limit = 9;

				$total_page = ceil($total_sp/$limit);

				if ($current_page > $total_page){
		            $current_page = $total_page;
		        }
		        else if ($current_page < 1){
		            $current_page = 1;
		        }
		        $start = ($current_page - 1) * $limit;

		        $data1 = $product_model->pagination_product($start,$limit);

		        
			}

			// $data2 = $product_model->All();

			// $json = json_encode($data2);

			// return response()->json($json);
	        // $rate_product = $product_model->rate_product();

			require_once("views/user/pages/product.php");
		}

		function productdetail(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			$MA_SP = $_GET['MA_SP'];

			$product_model = new Product();

			$data = $product_model->find($MA_SP);

			$rate_product = $product_model->rate_product($data['MA_NSX'],$data['MA_LOAI_SP']);

			require_once("views/user/pages/product-detail.php");
		}
		function about(){
			if (isset($_SESSION['cart'])) {
	        	$cart = $_SESSION['cart'];
	        }
			require_once("views/user/pages/about.php");
		}

		function add2cart(){
			$MA_SP = $_GET['MA_SP'];

			if (isset($_SESSION['cart'][$MA_SP])) {
				$_SESSION['cart'][$MA_SP]['SO_LUONG']++;
				setcookie('msg_add_success','Tăn số lượng thành công',time()+1);
				header("Location: ?mod=index&act=cart");
			}else{
				$product_model = new Product();

				$product = $product_model->find($MA_SP);

				$product['SO_LUONG'] = 1;

				$_SESSION['cart'][$MA_SP] = $product;
				setcookie('msg_add_product','Tăn số lượng thành công',time()+1);
				header("Location: ?mod=index&act=product&LSP=".$product['MA_LOAI_SP']."&NSX=".$product['MA_NSX']);
			}
			
		}

		function sub(){
			$MA_SP = $_GET['MA_SP'];

			if ($_SESSION['cart'][$MA_SP]['SO_LUONG']>1) {
				$_SESSION['cart'][$MA_SP]['SO_LUONG']--;
			}else{
				unset($_SESSION['cart'][$MA_SP]);
			}
			setcookie('msg_sub_success','Giảm số lượng thành công!!',time()+1);
			header("Location: ?mod=index&act=cart");
		}

		function deleteproduct(){

			$MA_SP = $_GET['MA_SP'];

			unset($_SESSION['cart'][$MA_SP]);

			setcookie('msg_delete_product','Xóa sản phẩm khỏi giỏ hàng thành công',time()+1);

			header("Location: ?mod=index&act=cart");
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

		function checkout(){
			if (!empty($_SESSION['cart'])) {
				//Tạo khách hàng
				$data = $_POST;
				unset($data['submit']);
				$data['MA_KH'] = 'KH'.$this->rand_string(5);

				$customer_model = new Customer();

				$customer_model->create($data);

				//Tạo hóa đơn

				$hoadon = array();

				$hoadon['MA_HD'] = $data['MA_KH']."_".time();

				$hoadon['MA_KH'] = $data['MA_KH'];
				
				$hoadon['STATUS'] = 0;

				$hoadon['NGAY_BAN'] = date('Y-m-d H:i:s');

				$bill_model = new Bill();

				$bill_model->create($hoadon);

				//Tạo chi tiết hóa đơn

				$cart = $_SESSION['cart'];

				$tongtien = 0;

				foreach ($cart as $product) {
					$prod['MA_HD'] = $hoadon['MA_HD'];

					$prod['SO_LUONG'] = $product['SO_LUONG'];
					$prod['MA_SP'] = $product['MA_SP'];
					$prod['GIA_BAN'] = $product['GIA_BAN'];
					$prod['THANH_TIEN'] = $product['SO_LUONG']*$product['GIA_BAN'] - ($product['SO_LUONG']*$product['GIA_BAN']*$product['khuyen_mai'])/100;
					$tongtien += $prod['THANH_TIEN'];

					$billdetail_model = new BillDetail();

					$billdetail_model->create($prod);
				}

				//Update hóa đơn

				$ubill['MA_HD'] = $hoadon['MA_HD'];

				$ubill['TONG_TIEN'] = $tongtien;

				$bill_model->update($ubill);

				unset($_SESSION['cart']);

				unset($data);

		}

		setcookie('msg_checkout','Xác nhận mua hàng thành công',time()+1);
		header("Location:?");
	}
}
  ?>