<?php 
	include_once 'models/Model.php';

	class Bill extends Model{
		var $table_name = 'tbl_bill';
		var $primary_key = 'MA_HD';

		function statistical($month,$year){
			$query = "SELECT * FROM tbl_bill WHERE MONTH(NGAY_BAN)='".$month."' AND YEAR(NGAY_BAN)='".$year."'";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

	}
 ?>