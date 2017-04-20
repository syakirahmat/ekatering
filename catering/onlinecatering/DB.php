<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
session_start();

class DB {
	var $db;
	var $db_tableName;
	var $db_servername = "localhost";
	var $db_username = "root";
	var $db_password = "";
	var $db_dbname = "dng_comedor";
	var $sql = "";
	var $is_new_record = true;


	function __construct($db_tableName = '') {
//		$this->db_dbname = basename(__DIR__);
		$this->db_tableName = $db_tableName;
//			$this->db = new PDO('sqlite:bookstore.sqlite3');
		$this->db = new PDO("mysql:host={$this->db_servername};dbname={$this->db_dbname}", $this->db_username, $this->db_password);

		/*if ($this->tableExists($tableName))
			$this->tableName = $tableName;
		else
			throw new Exception("Table $tableName doest not exists.");*/
	}

	// function tableExists($db_tableName = '')
	// {
	// return $this->db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='$db_tableName';")->fetch(PDO::FETCH_ASSOC);
	// }

	function findOne($primaryKey) {
		$this->is_new_record = false;
		$this->sql = "SELECT * FROM {$this->db_tableName} WHERE id=$primaryKey LIMIT 1;";
		return $this->db->query($this->sql)->fetch(PDO::FETCH_OBJ);
	}

	function find($cond = "1=1") {
		$this->is_new_record = false;
		if ($cond == "")
			$cond = "1=1";

		$this->sql = "SELECT * FROM {$this->db_tableName} WHERE $cond LIMIT 1;";
		return $this->db->query($this->sql)->fetch(PDO::FETCH_OBJ);
	}

	function findAll($cond = "1=1") {
		$this->is_new_record = false;
		if ($cond == "")
			$cond = "1=1";
		$this->sql = "SELECT * FROM {$this->db_tableName} WHERE $cond;";
		return $this->db->query($this->sql)->fetchAll(PDO::FETCH_OBJ);
	}

	function insert($array) {
		$fields = $values = "";

		foreach ($array as $col => $val) {
			if ($val != '') {
				$fields .= "`$col`, ";
				$values .= "'$val', ";
			}
		}
		$fields = " (" . trim($fields, ", ") . ") ";
		$values = " VALUES(" . trim($values, ", ") . ")";
		$this->sql = "INSERT INTO {$this->db_tableName} $fields $values;";
		return $this->db->exec($this->sql);
	}

	function getLastInsertId() {
		return $this->db->lastInsertId();
	}

	function update($model) {
		if (is_array($model))
			$model = json_decode(json_encode($model), false);

		$fields = "";
		foreach ($model as $col => $val)
			if (strlen($val))
				$fields .= "`$col` = '$val', ";
		$fields = trim($fields, ", ");
		$this->sql = "UPDATE {$this->db_tableName} SET $fields WHERE id=$model->id;";
		return $this->db->exec($this->sql);
	}

	function delete($model) {
		$this->sql = "DELETE FROM {$this->db_tableName} WHERE id=$model->id";
		return $this->db->exec($this->sql);
	}
}

function toDateTime($string, $format = "Y-m-d H:i:s") {
	//$string = str_replace("/", "-", $string);
	return date($format, strtotime($string));
}

function sendSMS($toNumber, $message){
	$url = 'https://mexists:8238Gt@walm.cryptical.tech/api/smsSend';
	$params = "toNumber=$toNumber&message=$message";
	$user_agent = "Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

	$result=curl_exec ($ch);
	curl_close ($ch);

	return $result;
}

function d($mixed = null, $die = true) {
	echo '<pre>';
	var_dump($mixed);
	echo '</pre>';
	if ($die)
		die();
	return null;
}


?>


<?php
	/**
	* Examples to use this class functions
	*/
	function usage_example(){
		/**
		* INSERT example
		*/
		// INSERT INTO users(username, password, email) VALUES('admin', MD5('password'), 'admin@email.com');
		$_POST["users"]["username"] = "admin";
		$_POST["users"]["password"] = md5("password");
		$_POST["users"]["email"] = "admin@email.com";
		$UserModel = new DB("users");
		$UserModel->insert($_POST["users"]);
	
		/**
		* SELECT example
		*/
		
		// SELECT * FROM users;
		$UserModel = new DB("users");
		$users = $User->findAll();
		foreach($users as $user){
			echo $user->username;
			echo $user->password;
			echo $user->email;
		}
		
		// SELECT * FROM users WHERE username = 'admin';
		$UserModel = new DB("users");
		$users = $User->findAll("username='admin'");
		foreach($users as $user){
			echo $user->username;
			echo $user->password;
			echo $user->email;
		
		}
		
		// SELECT * FROM users WHERE id=1;
		$id=1;
		$UserModel = new DB("users");
		$user = $User->findOne($id);
		echo $user->username;
		echo $user->password;
		echo $user->email;
	
		// SELECT * FROM users WHERE username='admin' LIMIT 1;
		$UserModel = new DB("users");
		$user = $User->find("username='admin'");
		echo $user->username;
		echo $user->password;
		echo $user->email;
		
		
		/**
		* UPDATE example
		*/
		
		// UPDATE users SET password=MD5('password'), email='admin@email.com' WHERE id=1;
		$id = 1;
		$UserModel = new DB("users");
		$user = $UserModel->findOne($id);
		$user->password = md5("password");
		$user->email = "admin@email.com";
		$UserModel->update($user);
		
		// UPDATE users SET password=MD5('password'), email='admin@email.com'
		$UserModel = new DB("users");
		$users = $UserModel->findAll();
		foreach($users as $user){
			$user->password = md5("password");
			$user->email = "admin@email.com";
			$UserModel->update($user);
		}
		
		// UPDATE users SET password=MD5('password'), email='admin@email.com' WHERE username = 'admin';
		$UserModel = new DB("users");
		$users = $User->findAll("username='admin'");
		foreach($users as $user){
			$user->password = md5("password");
			$user->email = "admin@email.com";
			$UserModel->update($user);	
		}
		
		// UPDATE users SET password=MD5('password'), email='admin@email.com' WHERE username = 'admin';
		$UserModel = new DB("users");
		$user = $User->find("username='admin'");
		$user->password = md5("password");
		$user->email = "admin@email.com";
		$UserModel->update($user);
		
		/**
		* DELETE example
		*/
		// DELETE FROM users WHERE id=1;
		$id=1;
		$UserModel = new DB("users");
		$user = $User->findOne($id);
		$UserModel->delete($user);
		
		// DELETE FROM users WHERE username = 'admin';
		$UserModel = new DB("users");
		$users = $User->findAll("username='admin'");
		foreach($users as $user){
			$UserModel->delete($user);	
		}
	}
?>

