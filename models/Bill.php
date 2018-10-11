<?php 
	include_once 'models/Model.php';

	class Bill extends Model{
		var $table_name = 'tbl_bill';
		var $primary_key = 'MA_HD';

		function statistical($date){
			$query = "SELECT * FROM tbl_bill WHERE DATE(NGAY_BAN)='".$date."'";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

	}
 ?>