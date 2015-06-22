<?php   
	header("Content-type: text/html; charset=utf-8");
	session_start();
    
	$bookid = $_GET["bid"]; 
	//echo $bookid.'<br>';
	$man = $_SESSION["accounts"];
	//echo $man.'<br>';
	$cook = $_COOKIE[$man];
	//echo $cook.'<br>';
	
	$pre = $cook;
	$cook = str_replace($bookid.' ','',$cook);
	if ($pre == $cook)
	{
		//no delete
		$pree = $cook;
		$cook = str_replace(' '.$bookid,'',$cook);
		if ($pree == $cook)
		{
			$cook = str_replace($bookid,'',$cook);
		}
	}
	else
	{
		//yes deleted , do nothing
	}
	//$cook =  str_replace('','',$cook);
	//echo $_COOKIE[$man].'<br>';
	//setcookie($man,"",0,"/xmlfinalproject");
	setcookie($man,$cook,time()+(86400*365));
	
	
	//echo $_COOKIE[$man].'<br>';
	
	
	header("location:shoppingcart.php");
	
?>