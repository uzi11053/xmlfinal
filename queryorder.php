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
					if( !isset($_SESSION["accounts"]) || $_SESSION["accounts"]==""  )//un登入狀態
					{
						echo '您尚未登入，三秒後轉至登入畫面';
						$url="myaccount.php";
						echo "<meta http-equiv=\"refresh\" content=\"3;url=".$url."\">\n";
					}
					else
					{
								echo '<div>';
								echo "<div align='left'>我買的書</div>";
								echo "<table id='carttable' >";
								
								echo "<colgroup>";
								echo "<col width='12%'>";
								echo "<col width='10%'>";
								echo "<col width='11%'>";
								echo "<col width='20%'>";
								echo "<col width='5%'>";
								echo "<col width='5%'>";
								echo "<col width='11%'>";
								echo "<col width='11%'>";
								echo "</colgroup>";
								
								echo "<thead >";
								echo "<tr class='solidline' id='tbtitle'>";
								echo "<td>訂單編號</th>";
								echo "<td>訂購日期</td>";		
								echo "<td>最晚拿貨日期</td>";
								echo "<td colspan='3' class='tdleft'>書本名稱</td>";
								echo "<td>總金額</th>";
								echo "<td>訂單狀態</th>";
								echo "<td>取消</th>";
								echo "<td>連絡賣家</th>";
								echo "</tr>";
								echo "</thead>";
								
								echo "<tbody>";
								
								require_once("include/dbtools.inc.php");
								$link = create_connection();										
								//執行 Select 陳述式取得候選人資料
								$man = $_SESSION["accounts"];
								$sql = "SELECT * FROM book WHERE bbuyman='$man' and bstatus='1'";
								$result = execute_sql($link, "books", $sql);
								while ($row = mysqli_fetch_object($result))
								{	
									if (!$result)
									{
										
									}
									else
									{
										echo "<tr class='itemtable'>";
										echo "<td>$row->bookid</td>";
										echo "<td>$row->buytime</th>";
										echo "<td>$row->deadlinetime</td>";
										echo "<td colspan='3' class='tdleft'>$row->bname</td>";	
										echo "<td>$row->bprice</td>";
										if ($row->bstatus == '2')
											echo "<td>交貨完成</td>";
										else if ($row->bstatus == '1')
											echo "<td>尚未取貨</td>";
										echo "<td><a href='cancelorder.php?cod=$row->bookid' class='canorder'>取消</a></td>";
										echo "<td><a href='contactseller.php?man=$row->bprovider'>連絡賣家</a></td>";
										echo "</tr>";
									}
								}
						


								
								echo "</tbody>";
								

								
								echo "</table>";
								echo '</div>';
								
								
								
								
								echo '<div>';
								echo "<div align='left'>我賣的書</div>";
								echo "<table id='carttable' >";
								
								echo "<colgroup>";
								echo "<col width='14%'>";
								echo "<col width='12%'>";
								echo "<col width='13%'>";
								echo "<col width='20%'>";
								echo "<col width='6%'>";
								echo "<col width='6%'>";
								echo "<col width='14%'>";
								echo "</colgroup>";
								
								echo "<thead >";
								echo "<tr class='solidline' id='tbtitle'>";
								echo "<td>訂單編號</th>";
								echo "<td>訂購日期</td>";		
								echo "<td>最晚拿貨日期</td>";
								echo "<td colspan='3' class='tdleft'>書本名稱</td>";
								echo "<td>總金額</th>";
								echo "<td>訂單狀態</th>";
								echo "<td>連絡買方</th>";
								echo "</tr>";
								echo "</thead>";
								
								echo "<tbody>";
								
								require_once("include/dbtools.inc.php");
								$link = create_connection();										
								//執行 Select 陳述式取得候選人資料
								$man = $_SESSION["accounts"];
								$sql = "SELECT * FROM book WHERE bprovider='$man' ";
								$result = execute_sql($link, "books", $sql);
								while ($row = mysqli_fetch_object($result))
								{	
									if (!$result)
									{
										
									}
									else
									{
										if ($row->bstatus != 0)
											echo "<tr class='itemtable' style='background:#F0F0F0;' >";
										else
											echo "<tr class='itemtable' >";
										
										echo "<td>$row->bookid</td>";
										echo "<td>$row->buytime</th>";
										echo "<td>$row->deadlinetime</td>";
										echo "<td colspan='3' class='tdleft'>$row->bname</td>";	
										echo "<td>$row->bprice</td>";
										if ($row->bstatus == '2')
										{
											echo "<td>交貨完成</td>";
											echo "<td><a href='contactbuyer.php?man=$row->bbuyman'>連絡買家</a></td>";
										}
										else if ($row->bstatus == '1')
										{
											echo "<td>尚未取貨</td>";
											echo "<td><a href='contactbuyer.php?man=$row->bbuyman'>連絡買家</a></td>";
										}	
										else if ($row->bstatus == '0')
										{
											echo "<td>未有買家</td>";
											
										}
										echo "</tr>";
									}
								}
						


								
								echo "</tbody>";
								

								
								echo "</table>";
								echo '</div>';
								echo "<input type='button' style='margin-bottom:100px;' value='繼續選購' onclick=\"javascript:window.open('index.php','_self')\"/>"; 
						
						
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
<script>









$(function(){
	
	$( ".canorder" ).click(function(e) {
		
		if(confirm("確定要取消此訂單?\n取消三次以上將受到約談"))
		{
			
		}
		else
		{
			e.preventDefault();
		}
		
		
	});
	
});








</script>




</body>

</html>

