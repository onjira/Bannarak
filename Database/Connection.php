<?php

class Database {
	var $host = "localhost";
	#-> Connect to Database
	function connectdb() {
		#-> Set the variables
		$db_name = "BANNARAK";
		$user = "root";
		$pass = "";

		$this->database = $db_name;
		$this->username = $user;
		$this->password = $pass;
		#-> Connect to DB
		$this->conndb = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die ($this->conndb->error);
		$this->conndb->set_charset("utf8");
	}
	
	#-> Close Database
	function closedb() {
		// mysqli_close($this->conndb) or die (mysqli_error());
		mysqli_close($this->conndb) or die ($this->conndb->error);
	}

	#-> Query data from database
	function querydb($sql) {
		$res = $this->conndb->query($sql);
		if ($res)
			return $res;
		else
			return $this->conndb->error;

	}

	#-> Fetch
	function fetch($query) {
		$result = $query->fetch_array();
		if($result) {
			return $result;
		} else {
			return false;
		}
	}

	#-> Add
	function add($table,$data) {
		$key = array_keys($data);
		$value = array_values($data);
		$sum = count($key);
		for($i=0;$i<$sum;$i++) {
			if(empty($add)) {
				$add = "(";
			} else {
				$add = $add.",";
			}
			if(empty($val)) {
				$val = "(";
			} else {
				$val = $val.",";
			}
			$add = $add.$key[$i];
			$val = $val."'".$value[$i]."'";
		}
		$add = $add.")";
		$val = $val.")";
		// $table = table name (config.php)
		// $data = ["name":"Company1"]
		#-> INSERT INTO tbl (data1,data2) VALUES ('val1','val2')
		$sql = "INSERT INTO ".$table." ".$add."VALUES ".$val;
		$res = $this->conndb->query($sql);
		if ($res)
			return true;
		else
			return $this->conndb->error;
		
	}
	
	#-> Update
	function update($table,$data,$where) {
		$key = array_keys($data);
		$value = array_values($data);
		$sum = count($key);
		$set = "";
		for($i=0;$i<$sum;$i++) {
			if(!empty($set)){
				$set = $set.",";
			}
			$set = $set.$key[$i]."='".$value[$i]."'";
		}
		
		#-> UPDATE tbl SET username='$name',password='$pass' WHERE .....=....
		$sql = "UPDATE ".$table." SET ".$set." WHERE ".$where;
		$res = $this->conndb->query($sql);
		if($res) {
			return $res;
		} else {
			return $this->conndb->error;
		}
	}

	
}
?>