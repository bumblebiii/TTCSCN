<?php 

	include_once 'connection.php';

	class Model{
		var $conn;

		var $table_name = " ";

		var $primary_key = " ";

		function __construct(){
			$obj_connect = new Connection();

			$this->conn = $obj_connect->connect;
		}
		function All(){

				$query = "SELECT * FROM ".$this->table_name;

				$result = $this->conn->query($query);

				$data = array();

				while ($row = $result->fetch_assoc()) {
					$data[]=$row;
				 }
				 return $data;
			}

			function find($id){

				$query = "SELECT * FROM ".$this->table_name." WHERE ".$this->primary_key."='".$id."'";

				$result = $this->conn->query($query);

				return $result->fetch_assoc();
			}
			function create($data){

				$fields = " ";
				$values = " ";

				foreach ($data as $key => $value) {
					$fields .= $key.',';
					$values .= "'".$value."',";
				}

				$fields = trim($fields,',');
				$values = trim($values,',');

				$query = "INSERT INTO $this->table_name(".$fields.") VALUES (".$values.")";
				
				$result = $this->conn->query($query);

				return $result;
			}

			function update($data){

				$values = " ";

				foreach ($data as $key => $value) {
					$values .= $key."='".$value."',";
				}

				$values = trim($values,',');

				$query = "UPDATE ".$this->table_name." SET ".$values." WHERE ".$this->primary_key." = '".$data[$this->primary_key]."' ";

				$result = $this->conn->query($query);

				return $result;
			}

			function delete($id){


				$query = "DELETE FROM ".$this->table_name." WHERE ".$this->primary_key." = '".$id."'";

				return $this->conn->query($query);
			}
	}
 ?>