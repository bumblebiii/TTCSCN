<?php 
	class Middleware{
		function isLogin(){
			if (!isset($_SESSION['isLogin'])) {
				header('Location: ?mod=login&act=form');
			}	
		}

		function checkRole(){
			if ($_SESSION['user']['ROLE']!=1) {
				header("Location: ?mod=admin");
			}
		}

	}
 ?>