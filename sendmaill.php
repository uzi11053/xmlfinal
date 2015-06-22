
<!DOCTYPE html> 
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<title>homepage</title>

<link type="text/css" href="./css/css.css" rel="stylesheet"/>
<link type="text/css" href="./css/bootstrap.css" rel="stylesheet"/>
<link type="text/css" href="./css/animate.css" rel="stylesheet"/>

<link rel="shortcut icon" href="./img/icon1.ico">    

</head>

<body>

<div id="body" >
<div id="container" class="container">
	
		<div>
			<div>
				<a href="index.php"><img src="./img/banner.gif" id="bannerimg"></img></a>
			</div>
		</div>
		
	  <header>		
		<div class="row">
		  <div class="col-xs-12" >
				
				<div id="search">
					<form method="post" action="search.php" id="fm">
						<select name='booksearchselect'>
							<option value='0'>全部欄位</option>
							<option value='1'>書名</option>
							<option value='2'>作者</option>
							<option value='3'>出版社</option>
							<option value='4'>賣方</option>
						</select>
						<input type="text" name="searchinput" /> 
						<input type="image" name="submitbtn"  id="submitbtn" src="./img/search.png"  onClick="document.fm.submit()" >
					</form>
				</div>
			

			<div id="navigation">
				

				<ul>
					<li id="home"><a href="index.php">首頁</a></li>
					<li id="books"><a href="books.php">書籍</a></li>
					<li id="myaccount"><a href="myaccount.php">我的帳戶</a></li>
					<li id="contactus"><a href="contactus.php">連絡我們</a></li>
					<li id="service"><a href="shoppingcart.php">購物車</a></li>
				</ul>
			</div>
		  </div>
		</div>
	  </header>
	  
	  
	  <div id="user">

			<div class="row">
			  <div class="col-xs-12" >

				<div id="">

					<div id="username">
					<?php   
						header("Content-type: text/html; charset=utf-8");
						
						session_start();
						
						if( !isset($_SESSION["accounts"]) )
						{  
							$_SESSION["accounts"]=""; 
						}
						else if ($_SESSION["accounts"] != "")
						{
							echo $_SESSION["accounts"].'您好 , '.'<a href="logout.php">登出</a>';
						}
						//var_dump( get_defined_vars() );  
						
					?>
				</div>

				</div>

			  </div>

			</div>

		</div>

	  
	  
	  
		<div id="bread">

			<div class="row">

			  <div class="col-xs-1" >

				<div id="">

					 

				</div>

			  </div>

			  <div class="col-xs-11" >

				<div id="">

					<div id="breadtext">123456</div>

				</div>

			  </div>

			</div>

		</div>

	<?php
	include("./include/class.phpmailer.php"); //匯入PHPMailer類別
	
	$Name=$_POST['sndname'];
	$Mail=$_POST['sendmail'];
	$target=$_POST['recname'];
	$Sendbody=$_POST['sendbody'];
	/*echo $Name.'<br>';
	echo $Mail.'<br>';
	echo $target.'<br>';
	echo $Sendbody.'<br>';*/
	 
	$mail= new PHPMailer(); //建立新物件
	$mail->IsSMTP(); //設定使用SMTP方式寄信
	$mail->SMTPAuth = true; //設定SMTP需要驗證
	$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
	$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
	$mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。
	$mail->CharSet = "utf-8"; //郵件編碼
	 
	$mail->Username = "ntuecsbook@gmail.com"; //Gamil帳號
	$mail->Password = "ntuecssa"; //Gmail密碼
	 
	$mail->From = $Mail; //寄件者信箱
	$mail->FromName = "線上連絡系統"; //寄件者姓名
	 
	$mail->Subject ="線上連絡";  //郵件標題
	$mail->Body = "姓名:".$Name."<br>信箱:".$Mail."<br>寄件訊息:".$Sendbody; //郵件內容
	 
	$mail->IsHTML(true); //郵件內容為html ( true || false)
	$mail->AddAddress($target); //收件者郵件及名稱
	 
	if(!$mail->Send()) {
		echo "發送錯誤: " . $mail->ErrorInfo;
		echo "請連絡管理員";
	} else {
		//echo "<div align=center>感謝您的回覆，我們將會盡速處理!</div>";
		header("Location:queryorder.php");
	}
	?>



<div id="footer">

			<div class="row">
			  <div class="col-xs-6" id="ftleft">
				<div class="wow bounceInLeft animated">Copyright © 2015 by NTUE.CS All rights reserved.</div>
			  </div>

			  <div class="col-xs-6" id="ftright">
				<div class="wow zoomInDown animated">Powered by <a href="https://www.facebook.com/profile.php?id=100000159325830">Polydragoncez</a>＊<a href="https://www.facebook.com/profile.php?id=100004326344176&fref=ts">Uzi</a></div>
				<div class="wow zoomInDown animated"></div>
			  </div>

			</div>

			



		</div>

		

	</div>

</div>



<div id="backtotop">↑</div>
</body>

</html>