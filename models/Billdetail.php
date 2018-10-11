<?php 
	include_once 'models/Model.php';

	class BillDetail extends Model{
		var $table_name = 'tbl_detail_bill';
		var $primary_key = 'MA_HD';

		function ListBill($MA_HD){
			$result = array();
			$query = "SELECT hoa_don.MA_HD,hoa_don.NGAY_BAN,cthd.THANH_TIEN as TONG_TIEN,cthd.MA_SP, sp.TEN_SP,sp.GIA_BAN,cthd.SO_LUONG,cthd.THANH_TIEN, kh.TEN_KH, nv.TEN_NV,kh.SDT,kh.ADDRESS FROM tbl_bill hoa_don join tbl_customer kh ON hoa_don.MA_KH=kh.MA_KH join tbl_user nv ON nv.MA_NV = hoa_don.MA_NV join tbl_detail_bill cthd on cthd.MA_HD = hoa_don.MA_HD join tbl_product sp on cthd.MA_SP = sp.MA_SP where cthd.MA_HD ='".$MA_HD."'";
			$data= $this->conn->query($query);
			while ($row = $data->fetch_assoc()) {
				$result[] = $row;
			 }
			 return $result;
		}

		function ListBill_ONL($MA_HD){
			$result = array();
			$query = "SELECT hoa_don.MA_HD,hoa_don.NGAY_BAN,cthd.THANH_TIEN as TONG_TIEN,cthd.MA_SP, sp.TEN_SP,sp.GIA_BAN,cthd.SO_LUONG ,cthd.THANH_TIEN, kh.TEN_KH,kh.EMAIL,kh.SDT,kh.ADDRESS FROM tbl_bill hoa_don join tbl_customer kh ON hoa_don.MA_KH=kh.MA_KH join tbl_detail_bill cthd on cthd.MA_HD = hoa_don.MA_HD join tbl_product sp on cthd.MA_SP = sp.MA_SP where cthd.MA_HD ='".$MA_HD."'";
			$data= $this->conn->query($query);
			while ($row = $data->fetch_assoc()) {
				$result[] = $row;
			 }
			 return $result;
		}

	}
 ?>