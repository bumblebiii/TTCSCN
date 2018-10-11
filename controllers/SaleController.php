<?php 

	include_once 'models/Customer.php';
	include_once 'models/Employee.php';
	include_once 'models/Product.php';
	include_once 'models/Bill.php';
	include_once 'models/BillDetail.php';
	class SaleController{

		function purchase(){
			if (isset($_GET['MA_KH'])) {
				$MA_KH=$_GET['MA_KH'];

				$customerModel = new Customer();

				$customer = $customerModel->find($MA_KH);

				$_SESSION['customer']= $customer;

				header("Location: ?mod=sale&act=sale");
			}else{
				// header("Location: ?mod=admin&act=customer");
			}
		}

		function sale(){
			if (isset($_SESSION['customer'])) {
				$customer = $_SESSION['customer'];

				$productModel = new Product();
				$products = $productModel->All();

				$cart = array();

				if (isset($_SESSION['cart'])) {
					$cart = $_SESSION['cart'];
				}
				require_once 'views/sale/sale.php';
			}else{
				header("Location: ?mod=admin&act=customer");
			}
		}

		function add2cart(){
			$MA_SP = $_GET['MA_SP'];
			if (isset($_SESSION['cart'][$MA_SP])) {
				$_SESSION['cart'][$MA_SP]['SO_LUONG'] ++;
			}else{
				$productModel = new Product();

				$product = $productModel->find($MA_SP);

				$product['SO_LUONG'] = 1;

				$_SESSION['cart'][$MA_SP] = $product;
			}
			setcookie('msg_cart_success','Thêm vào giỏ hàng thành công !',time()+1);
			header("Location: ?mod=sale&act=sale");
		}

		function remove_product(){
			$MA_SP = $_GET['MA_SP'];

			if ($_SESSION['cart'][$MA_SP]['SO_LUONG']>1) {
				$_SESSION['cart'][$MA_SP]['SO_LUONG'] --;
				setcookie('msg_reduce','Giảm số lượng sản phẩm thành công !',time()+1);
			}else{
				unset($_SESSION['cart'][$MA_SP]);
				setcookie('msg_delete_success','Xóa sản phẩm khỏi giỏ hàng !',time()+1);
			}
			header("Location: ?mod=sale&act=sale");
		}

		function deletecart(){
			unset($_SESSION['cart']);
			header("Location: ?mod=sale&act=sale");
		}

		function payment(){
				
			if (!empty($_SESSION['cart'])) {
				$productModel = new Product();
				$customer = $_SESSION['customer'];
				$cart = $_SESSION['cart'];
				$MA_NV = $_SESSION['user']['MA_NV'];

				$hoadon = array();

				$hoadon['MA_HD'] = $customer['MA_KH'].'_'.$MA_NV.'_'.time();

				$hoadon['MA_KH'] = $customer['MA_KH'];

				$hoadon['MA_NV'] = $MA_NV;

				$hoadon['STATUS'] = 1;

				$hoadon['NGAY_BAN'] = date('Y-m-d H:i:s');

				$bill = new Bill();
				$bill->create($hoadon);

				

				$tongtien = 0;
				foreach ($cart as $product) {
					$prod['MA_HD'] = $hoadon['MA_HD'];
					$prod['MA_SP'] = $product['MA_SP'];
					$prod['SO_LUONG'] = $product['SO_LUONG'];
					$prod['GIA_BAN'] = $product['GIA_BAN'];
					$prod['THANH_TIEN'] = $product['SO_LUONG']*$product['GIA_BAN'];
					$tongtien += $prod['THANH_TIEN'];

					$billdetail = new BillDetail();
					$billdetail->create($prod);

					$productModel->ReduceSL($prod['MA_SP'],$prod['SO_LUONG']);
				}

				$ubill['MA_HD'] = $hoadon['MA_HD'];
				$ubill['TONG_TIEN'] = $tongtien;

				$bill->update($ubill);

				unset($_SESSION['cart']);
				unset($_SESSION['customer']);

				header("Location: ?mod=sale&act=billDetail&MA_HD=".$hoadon['MA_HD']);
			}else{
				header("Location: ?mod=sale&act=sale");
			}
		}


		function checked(){
			$MA_HD = $_GET['MA_HD'];

			$ubill['MA_HD'] = $MA_HD;
			$ubill['STATUS'] =1;
			$ubill['MA_NV'] = $_SESSION['user']['MA_NV'];

			$bill = new Bill();

			$bill->update($ubill);

			$BillDetailModel = new BillDetail();

			$result = $BillDetailModel->ListBill_ONL($MA_HD);

			$email = $result[0]['EMAIL'];

			$name = $result[0]['TEN_KH'];

			ob_start();

			include_once 'views/sale/bill_mail.php';

			$contents = ob_get_contents();

			ob_end_clean();

			$subject = 'HÓA ĐƠN BÁN HÀNG';
	        header("Location: ?mod=admin&act=listBill");
			
			$this->send_email($email,$name,$contents,$subject);
			

		}

		function send_email($email_recive,$name,$contents,$subject){
			//https://www.google.com/settings/security/lesssecureapps
			// Khai báo thư viên phpmailer
	        require "public/phpmailer/PHPMailerAutoload.php";
	        require "public/phpmailer/class.phpmailer.php";
	        // Khai báo tạo PHPMailer
	        $mail = new PHPMailer();
	        //Khai báo gửi mail bằng SMTP
	        $mail->IsSMTP();
	        //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
	        // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
	        // 1 = Thông báo lỗi ở client
	        // 2 = Thông báo lỗi cả client và lỗi ở server
	        // To load the French version
	        $mail->setLanguage('vi', '/optional/path/to/language/directory/');
	        $mail->SMTPDebug  = 1;
					$mail->SMTPOptions = array (
			        'ssl' => array(
		        	'verify_peer'  => false,
		        	'verify_peer_name'  => false,
		        	'allow_self_signed' => true)
					);
	        $mail->CharSet="UTF-8";
	        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
	        $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
	        $mail->Port       = 587; // cổng để gửi mail
	        $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
	        $mail->SMTPAuth   = true; //Xác thực SMTP
	        $mail->Username   = "auto.zentgroup@gmail.com"; // Tên đăng nhập tài khoản Gmail
	        $mail->Password   = "1@3$5^7*"; //Mật khẩu của gmail
	        $mail->SetFrom("zentgroup@gmail.com", "Zent Group"); // Thông tin người gửi
	        $mail->AddReplyTo("zentgroup@gmail.com","Zent Group");// Ấn định email sẽ nhận khi người dùng reply lại.
	        $mail->AddAddress($email_recive, $name);//Email của người nhận
	        //$mail->AddCC($email_recive, $name);//Email của người nhận
	        $mail->Subject = $subject; //Tiêu đề của thư
	        $mail->MsgHTML($contents); //Nội dung của bức thư.
	        // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
	        // Gửi thư với tập tin html
	        $mail->AltBody = "Nội dung thư";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
	        //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

	        //Tiến hành gửi email và kiểm tra lỗi
	        if(!$mail->Send()) {
	          echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
						return false;
	        }
	}

		function checked_fail(){
			$MA_HD = $_GET['MA_HD'];

			$delete_cthd = new BillDetail();

			$delete_cthd->delete($MA_HD);

			$delete_hd = new Bill();

			$delete_hd->delete($MA_HD);

			setcookie('msg_delete_success','Xóa đơn hàng :((',time()+1);

			header("Location: ?mod=admin&act=listBill");
		}

		function BillDetail(){
			$MA_HD = $_GET['MA_HD'];

			$bill = new Bill();

			$data = $bill->find($MA_HD);

				
			if ($data['STATUS']==1) {
				$BillDetailModel = new BillDetail();

				$result = $BillDetailModel->ListBill($MA_HD);

			}else{
				$BillDetailModel = new BillDetail();

				$result = $BillDetailModel->ListBill_ONL($MA_HD);

			}


			require_once("views/sale/billDetail.php");
		 }
	}
 ?>