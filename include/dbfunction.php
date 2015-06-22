<?php   
	
	class DB_Functions {
		
		function __construct() {
			require_once 'DB_Connect.php';
			// connecting to database
			$this->db = new DB_Connect();
			$this->db->connect();
		}
		public function storeUser($account,$name, $email, $password) {
			$con = mysqli_connect("localhost", "root", "root");
			mysqli_select_db($con, "books");

			$hash = $this->hashSSHA($password);
			$encrypted_password = $hash["encrypted"]; // encrypted password
			$salt = $hash["salt"]; // salt
			$result = mysqli_query($con,"INSERT INTO `users`(`account`, `name`, `email`, `encrypted_password`, `salt`) VALUES('$account', '$name', '$email', '$encrypted_password', '$salt')");
			if ($result) {
				return true;
			} else {
				return false;
			}
		}
		
		
		public function getUserByAccountAndPassword($account, $password) {
			
			$con = mysqli_connect("localhost", "root", "root");
			mysqli_select_db($con, "books");
			
        $result = mysqli_query($con,"SELECT * FROM users WHERE account = '$account'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            if ($encrypted_password == $hash) {

                return $result;
            }
        } else {
            return false;
        }
    }
		
		
		public function hashSSHA($password) {

			$salt = sha1(rand());
			$salt = substr($salt, 0, 10);
			$encrypted = base64_encode(sha1($password . $salt, true) . $salt);
			$hash = array("salt" => $salt, "encrypted" => $encrypted);
			return $hash;
		}
		
		public function checkhashSSHA($salt, $password) {

			$hash = base64_encode(sha1($password . $salt, true) . $salt);

			return $hash;
		}
	}
	
?>