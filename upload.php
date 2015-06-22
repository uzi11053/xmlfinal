<!DOCTYPE html> 
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script language=JavaScript src="./js/jquery.validate.js"></script>
<script language=JavaScript src="./js/jss.js"></script>
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
						
						if ( isset($_SESSION["accounts"]) && $_SESSION["accounts"] != "")
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
		
			

		

		<div id="main">

			<div class="row">

			  <div class="col-xs-12" >
				
				<div id="mainright">
				<div id="ifrude"></div>
<?php
	$handler = fopen("./bookimg/count.txt","r");
	$num = fgets($handler);
	if( !isset($_SESSION["accounts"]) || $_SESSION["accounts"]==""  )//un登入狀態
	{
		echo '<script language="javascript">';
		echo '$("#ifrude").html("無權瀏覽此頁面，三秒後自動跳轉回主頁面。");';
		echo '</script>';
		$url="index.php";
		echo "<meta http-equiv=\"refresh\" content=\"3;url=".$url."\">\n";
	}	
	else
	{
		$target_dir = "bookimg/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		if (!basename($_FILES["fileToUpload"]["name"]))
		{
			$bookimg = "noimg.jpg";
		}
		else
		{
			$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.".'<br>';
				$bookimg = "noimg.jpg";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.".'<br>';
			$bookimg = "noimg.jpg";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.".'<br>';
			$bookimg = "noimg.jpg";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.".'<br>';
			$bookimg = "noimg.jpg";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$bookimg = "noimg.jpg";
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				
				
				
				echo '<img src="./bookimg/'.$num.'.'.$imageFileType.'"></img><br>';
				echo $num.'<br>';
				echo $imageFileType.'<br>';
				if ($imageFileType == "jpg") {
					rename("./bookimg/" . basename( $_FILES["fileToUpload"]["name"]), "./bookimg/".$num.".jpg");
					$bookimg = $num.".jpg";
				}
				else if ($imageFileType == "jpeg") {
					rename("./bookimg/" . basename( $_FILES["fileToUpload"]["name"]), "./bookimg/".$num.".jpeg");
					$bookimg = $num.".jpeg";
				}
				else if ($imageFileType == "png") {
					rename("./bookimg/" . basename( $_FILES["fileToUpload"]["name"]), "./bookimg/".$num.".png");
					$bookimg = $num.".png";
				}
				else if ($imageFileType == "gif") {
					rename("./bookimg/" . basename( $_FILES["fileToUpload"]["name"]), "./bookimg/".$num.".gif");
					$bookimg = $num.".gif";
				}
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.".'<br>';
				
				//echo $num.'<br>';
			
				
				
				echo "書名為".$_POST["bookname"].'<br>';
				echo "價錢為".$_POST["bookprice"].'<br>';
				echo "備註：".$_POST["booknote"].'<br>';
				
			} else {
				echo "Sorry, there was an error uploading your file.".'<br>';
			}
			
		}
		$num++;
		$handlew = fopen("./bookimg/count.txt","w");
		fputs($handlew,$num);
		
	}
	




	if (!isset($_POST["bookname"]))
			$_POST["bookname"]="";
	if (!isset($_POST["bookprice"]))
			$_POST["bookprice"]="";
	if (!isset($_POST["booknote"]))
			$_POST["booknote"]="";
	if (!isset($_POST["bookauthor"]))
			$_POST["bookauthor"]="";
	if (!isset($_POST["bookpublisher"]))
			$_POST["bookpublisher"]="";
	if (!isset($_POST["bookcategory"]))
			$_POST["bookcategory"]="";
		
		
	$bookname = $_POST["bookname"];
	$bookprice = $_POST["bookprice"];
	$booknote = $_POST["booknote"];
	$bookauthor = $_POST["bookauthor"];
	$bookpublisher = $_POST["bookpublisher"];
	$bookcategory = $_POST["bookcategory"];
	$bookprovider = $_SESSION["accounts"];

	echo "作者為".$bookauthor.'<br>';
	echo "出版社為".$bookpublisher.'<br>';
	if ($bookcategory == "0")
		echo "分類為數學用書".'<br>';
	else if ($bookcategory == "1")
		echo "分類為程式語言用書".'<br>';
	else if ($bookcategory == "2")
		echo "分類為其他用書".'<br>';
	echo "賣方為".$bookprovider.'<br>';
	$bookbuyman = "";
	$bookstatus = "0" ;

	if ($_SESSION["accounts"]=="")
	{
		
	}
	else
	{
		require_once 'include/dbtools.inc.php';
		$link = create_connection();
		$sql = "INSERT INTO `book` (`bookid` , `bname` , `bprice`,`bnote`,`bauthor`,`bpublisher`,`bprovider`,`btime`,`buytime`,`deadlinetime`,`bcategory`,`bstatus`,`bbuyman`,`bimg`)
					VALUES (NULL, '$bookname', $bookprice , '$booknote' , '$bookauthor' , '$bookpublisher' , '$bookprovider' , CURRENT_TIMESTAMP ,  CURRENT_TIMESTAMP ,  CURRENT_TIMESTAMP ,'$bookcategory','$bookstatus','$bookbuyman','$bookimg')";
		$result = execute_sql($link, "books", $sql);
		//echo $resullt.'<br>';
		if ($result )
		{
			echo "成功上傳，三秒後跳回主頁面";
			$url="index.php";
			echo "<meta http-equiv=\"refresh\" content=\"3;url=".$url."\">\n";
		}
		else 
		{
			echo "上傳失敗，三秒後跳回主頁面";
			$url="index.php";
			echo "<meta http-equiv=\"refresh\" content=\"3;url=".$url."\">\n";
		}
	}

}
	
	
	
	


?>	
				</div>
					
				</div>

			  </div>

			</div>

		</div>

		

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

