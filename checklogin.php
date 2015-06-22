<?php   
	require_once 'include/dbfunction.php';
    $db = new DB_Functions();
	
	$account = 110116004;
	$password = 110116004;
	
	$user = $db->getUserByAccountAndPassword($account, $password);
	
	if ($user != false) {
        // user find
                
		echo "yes";
        } else {
        // user not find
                
        echo "no";
    }
?>