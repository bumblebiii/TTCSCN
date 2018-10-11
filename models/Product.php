<?php 
	include_once("Model.php");
	class Product extends Model{
		var $table_name = "tbl_product";
		var $primary_key = "MA_SP";

		function All_LSP(){
			$query = "SELECT * FROM tbl_lsp ";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
		function All_NSX(){
			$query = "SELECT * FROM tbl_nsx ";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
		function ReduceSL($MA_SP,$SO_LUONG){
			$soluongcon = $this->getSL($MA_SP)-$SO_LUONG;

			$query ="UPDATE ".$this->table_name." SET SO_LUONG = ".$soluongcon." WHERE ".$this->primary_key."='".$MA_SP."'";
			$result = $this->conn->query($query);

			return $result;
		}

		function getSL($MA_SP){
			$query = "SELECT SO_LUONG FROM ".$this->table_name." WHERE ".$this->primary_key." = '".$MA_SP."'";

			$result = $this->conn->query($query)->fetch_assoc()['SO_LUONG'];
			return $result;
		}

		function pagination_product($start,$limit){
			$query = "SELECT * FROM $this->table_name LIMIT $start,$limit";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;

		}

		function pagination1_product($MA_LOAI_SP,$start,$limit){
			$query = "SELECT * FROM $this->table_name WHERE MA_LOAI_SP='".$MA_LOAI_SP."' LIMIT $start,$limit";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;

		}

		function rate_product($MA_NSX,$MA_LOAI_SP){
			$query = "SELECT * FROM tbl_product WHERE MA_NSX='".$MA_NSX."' AND MA_LOAI_SP = '".$MA_LOAI_SP."'";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

		function fiter_LSP($MA_LOAI_SP){
			$query = "SELECT * FROM tbl_product WHERE MA_LOAI_SP='".$MA_LOAI_SP."'";

			$result = $this->conn->query($query);

			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}

		function fiter_NSX($MA_NSX){
			$query = "SELECT * FROM tbl_product WHERE MA_NSX='".$MA_NSX."'";

			$result = $this->conn->query();

			$data = array();
			while($row = $result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}

		function fiter_product($MA_NSX,$MA_LOAI_SP){
			$query = "SELECT * FROM tbl_product WHERE MA_NSX='".$MA_NSX."' AND MA_LOAI_SP = '".$MA_LOAI_SP."'";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

		function topProduct($thang){
			$query = "SELECT  tbl_product.*,SUM(tbl_detail_bill.SO_LUONG) AS TONG
					FROM tbl_product, tbl_detail_bill,tbl_bill
					WHERE tbl_product.MA_SP = tbl_detail_bill.MA_SP AND tbl_bill.MA_HD= tbl_detail_bill.MA_HD AND MONTH(tbl_bill.NGAY_BAN)='".$thang."'
					GROUP BY TEN_SP
					ORDER BY SUM(tbl_detail_bill.SO_LUONG) DESC
					LIMIT 5";

			$result = $this->conn->query($query);
			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}

		function inventory_products(){
			$query = "SELECT * FROM `tbl_product`ORDER BY SO_LUONG DESC LIMIT 5";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}
	}
 ?>