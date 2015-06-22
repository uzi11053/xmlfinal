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
			
				<div class="col-xs-1" >

					<div id="">

						 

					</div>

				  </div>

			  <div class="col-xs-10" >

				<div id="mainright">
				
				<?php
					//$conf = false;
					function hello(){
						echo "Hello";
					}
					if( !isset($_SESSION["accounts"]) || $_SESSION["accounts"]==""  )//un登入狀態
					{
						echo '您尚未登入，三秒後轉至登入畫面';
						$url="myaccount.php";
						echo "<meta http-equiv=\"refresh\" content=\"3;url=".$url."\">\n";
					}
					else
					{
						if (!isset($_GET["cod"]))
						{
							
						}
						else
						{
							require_once("include/dbtools.inc.php");
							$canorder = $_GET["cod"];
							$man = $_SESSION["accounts"];
							//echo $canorder;
							
							$link = create_connection();
																
							//執行 Select 陳述式取得候選人資料
							$sql = "UPDATE book SET bbuyman='' , bstatus='0' WHERE bookid=$canorder AND bbuyman='$man' ";
							$result = execute_sql($link, "books", $sql);
							if (mysqli_affected_rows($link) > 0 )
							{
								echo '取消訂單成功';
							}
							else
							{
								echo '無法取消訂單，您並非此書購買者或者訂單編號錯誤';
							}
						}
					}
				?>
				
				<?php   
					
					
					
					
				
				
				
				
				//var_dump( get_defined_vars() );  debug use
				
				?>
				
				

				
				</div>
					
				</div>
				
				<div class="col-xs-1" >

				<div id="">

					 

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

