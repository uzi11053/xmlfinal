<?php   
	//error_reporting(0);
	require_once 'include/dbfunction.php';
    $db = new DB_Functions();
	
	/*for ($i=110116001;$i<110116046;$i++)
	{
		$account = $i;
		$name = $i;
		$email = 's'.$i.'@stu.ntue.edu.tw';
		$password = $i;
		echo $account.' '.$name.' '.$email.' '.$password.'<br>';
		
		$user = $db->storeUser($account, $name,$email, $password);
	
		if ($user != false) {
			// user stored successfully
			echo "yes".'<br>';
			} else {
			// user failed to store
		}
	}*/
	
	
	
	
	
?>