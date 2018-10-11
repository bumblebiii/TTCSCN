<?php 
	include_once("models/connection.php");

	class Login{
		var $login_conn;

		function __construct(){
			$connection = new Connection();

			$this->login_conn = $connection->connect;
		}

		function checkLogin($EMAIL,$PASSWORD){

			$query = "SELECT * FROM tbl_user WHERE EMAIL = '".$EMAIL."' AND PASSWORD ='".$PASSWORD."'";
			$result = $this->login_conn->query($query)->fetch_assoc();

			return $result;
		}

		


	}
 ?>