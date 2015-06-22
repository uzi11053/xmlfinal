
<!DOCTYPE html> 
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="./js/toolong.js"></script>
<script src="./js/backtotop.js"></script>

<title>homepage</title>

<link type="text/css" href="./css/title.css" rel="stylesheet"/>
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
				
				
					<div id="dhtmltooltip"></div>

					
				
				
					<div id="bgtop">
						<img src="./img/singlelined.png"></img>
					</div>
					<div  align="left" style="margin-bottom:1%;" class="boldfontindex" >最新上架</div>
					<ul id="bookss">
					<?php
						require_once("include/dbtools.inc.php");

						function string_cat ( $sourcestr , $cutlength )
						{
						  $returnstr = '' ;
						 
						  $i = 0 ;
						 
						  $n = 0 ;
						 
						  $str_length = strlen ( $sourcestr ) ; //字符串的字節數
						 
						  $end = $cutlength * 2 ;
						 
						  while ( ( $n < $end ) and ( $i <= $str_length ) )
						  {
							$temp_str = substr ( $sourcestr , $i , 1 ) ;
							$ascnum = Ord ( $temp_str ) ; //得到字符串中第$i位字符的ascii碼
							if ( $ascnum >= 224 ) //如果ASCII位高與224，
							{
							  $returnstr = $returnstr . substr ( $sourcestr , $i , 3 ) ; //根據UTF-8編碼規範，將3個連續的字符計為單個字符
							  $i = $i +3 ; //實際Byte計為3
							  $n = $n +2 ; //字串長度計1
							}
							elseif ( $ascnum >= 192 ) //如果ASCII位高與192，
							{
							  $returnstr = $returnstr . substr ( $sourcestr , $i , 2 ) ; //根據UTF-8編碼規範，將2個連續的字符計為單個字符
							  $i = $i +2 ; //實際Byte計為2
							  $n = $n +2 ; //字串長度計1
							}
							elseif ( $ascnum >= 65 && $ascnum <= 90 ) //如果是大寫字母，
							{
							  $returnstr = $returnstr . substr ( $sourcestr , $i , 1 ) ;
							  $i = $i +1 ; //實際的Byte數仍計1個
							  if ( $ascnum == 87 )
							  {
								$n = $n + 2 ;
							  }
							  else
							  {
								$n = $n + 1.5 ; //但考慮整體美觀，大寫字母計成一個高位字符
							  }
						 
							}
						 
							else //其他情況下，包括小寫字母和半角標點符號，
							{
							  $returnstr = $returnstr . substr ( $sourcestr , $i , 1 ) ;
							  $i = $i +1 ; //實際的Byte數計1個
							  if ( $ascnum == 119 ) //如果是幾個特殊字w
							  {
								$n = $n + 1.5 ;
							  }
							  else
							  {
								$n = $n + 1 ; //小寫字母和半角標點等與半個高位字符寬…
							  }
						 
							}
						  }
						 
						  if ( $str_length > $i ) {
							$returnstr = $returnstr . "…" ; //超過長度時在尾處加上省略號
						  }
						  return $returnstr ;
						 
						}
						
						//建立資料連接
						$link = create_connection();
																	
						//執行 Select 陳述式取得候選人資料
						$sql = "SELECT * FROM book where bstatus=0 ORDER BY btime DESC Limit 5";
						$result = execute_sql($link, "books", $sql);
						if (!$result)
						{
							
						}
						else
						{
							while ($row = mysqli_fetch_object($result))
							{
								echo "<li class='bookssliclass'>";
								echo "<div>";
								echo "<a href='book.php?bid=$row->bookid' title='$row->bname\n\n$ $row->bprice\n$row->bpublisher 出版社'><img src='./bookimg/$row->bimg' class='bookssimg' ></a>";
								echo "</div>";
								
								
								/*if ((strlen($row->bname))>15)
								{
									$bns = string_cat($row->bname,10);
									//echo strlen($row->bname)." word";
								}
								else
								{
									$bns = $row->bname;
								}*/
								/*echo "<div class='bookssnameout'>";
								echo "<div class='bookssnames' title='$bns'>";
								echo "<a href='book.php?bid=$row->bookid'><p>$bns</p></a>";
								echo "</div>";
								echo "<div class='bookssnamel' title='$row->bname'>";
								echo "<p>$row->bname</p>";
								echo "</div>";
								echo "</div>";*/
								
								/*echo "<div class='bookssnameb' title='$row->bname' >";
								echo "<p>$row->bname</p>";
								echo "</div>";*/
								
								/*echo "<div class='bookssprice' >";
								echo "<p>\$&nbsp$row->bprice</p>";
								echo "</div>";
								
								if ((strlen($row->bpublisher))>8)
								{
									$bpub = string_cat($row->bpublisher,8);
								}
								else
								{
									$bpub = $row->bpublisher;
								}
								echo "<div class='booksssellerout'>";
								echo "<div class='booksssellers' title='$bpub 出版社'> ";
								echo "<p>$bpub 出版社</p>";
								echo "</div>";
								echo "<div class='booksspublisherl' title='$row->bpublisher 出版社'>";
								echo "<p>$row->bpublisher 出版社</p>";
								echo "</div>";
								echo "</div>";*/
								
								
								
								
							  /*echo "<input type='radio' id = '$row->name' name='name'" .
								"value='$row->name'>";
								echo "<label for='$row->name' id='name'>$row->name "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."$row->introduction</label>";*/
							}
						}
						

						//關閉資料連接
						mysqli_close($link);
				  ?>
						
						

						
					</ul>
					<script>

					$(function () {
							
						$(window).resize(function(e) {
							
							var containerWW= $("#container").width();
							console.log("gg"+containerWW +"gg");
							
							if (containerWW >= 235)
							{
								$(".bookssliclass").eq(1).css("display","");
								$(".bookssliclass").eq(2).css("display","");
								$(".bookssliclass").eq(3).css("display","");
								$(".bookssliclass").eq(4).css("display","");
							}
								
							//if ()
							
							var positionstand = $(".bookssliclass").eq(0).offset();
							var position2 = $(".bookssliclass").eq(1).offset();
							var position3 = $(".bookssliclass").eq(2).offset();
							var position4 = $(".bookssliclass").eq(3).offset();
							var position5 = $(".bookssliclass").eq(4).offset();
							
							if (Math.abs(position2.top - positionstand.top) >= 20)
								$(".bookssliclass").eq(1).css("display","none");
							else
								$(".bookssliclass").eq(1).css("display","");
							
							if (position3.top - positionstand.top >= 20)
								$(".bookssliclass").eq(2).css("display","none");
							else
								$(".bookssliclass").eq(2).css("display","");
							
							if (position4.top - positionstand.top >= 20)
								$(".bookssliclass").eq(3).css("display","none");
							else
								$(".bookssliclass").eq(3).css("display","");
							
							if (position5.top != positionstand.top )
								$(".bookssliclass").eq(4).css("display","none");
							else
								$(".bookssliclass").eq(4).css("display","");
							
							var x = positionstand.top;  // 取得Y座標
							var y = position5.top;  // 取得Y座標
							console.log(x+" "+y);
						});
						
					});

					</script>
					
					
					
					
						<div id="bgtop">
							<img src="./img/singlelined.png"></img>
						</div>
						<div  align="left" style="margin-bottom:1%;" class="boldfontindexb">店長推薦</div>
					<ul id="bookss">
					
					<?php
						require_once("include/dbtools.inc.php");

						//建立資料連接
						$link = create_connection();
																	
						//執行 Select 陳述式取得候選人資料
						$sql = "SELECT * FROM book where bstatus=0 AND bcategory='1' ORDER BY btime DESC Limit 5";
						$result = execute_sql($link, "books", $sql);
						if (!$result)
						{
							
						}
						else
						{
							while ($row = mysqli_fetch_object($result))
							{
								echo "<li class='bookssliclass'>";
								echo "<div>";
								echo "<a href='book.php?bid=$row->bookid' title='$row->bname\n\n$ $row->bprice\n$row->bpublisher 出版社'><img src='./bookimg/$row->bimg' class='bookssimg' ></a>";
								echo "</div>";
								
								
								/*if ((strlen($row->bname))>15)
								{
									$bns = string_cat($row->bname,10);
									//echo strlen($row->bname)." word";
								}
								else
								{
									$bns = $row->bname;
								}*/
								/*echo "<div class='bookssnameout'>";
								echo "<div class='bookssnames' title='$bns'>";
								echo "<a href='book.php?bid=$row->bookid'><p>$bns</p></a>";
								echo "</div>";
								echo "<div class='bookssnamel' title='$row->bname'>";
								echo "<p>$row->bname</p>";
								echo "</div>";
								echo "</div>";*/
								
								/*echo "<div class='bookssnameb' title='$row->bname' >";
								echo "<p>$row->bname</p>";
								echo "</div>";*/
								
								/*echo "<div class='bookssprice' >";
								echo "<p>\$&nbsp$row->bprice</p>";
								echo "</div>";
								
								if ((strlen($row->bpublisher))>8)
								{
									$bpub = string_cat($row->bpublisher,8);
								}
								else
								{
									$bpub = $row->bpublisher;
								}
								echo "<div class='booksssellerout'>";
								echo "<div class='booksssellers' title='$bpub 出版社'> ";
								echo "<p>$bpub 出版社</p>";
								echo "</div>";
								echo "<div class='booksspublisherl' title='$row->bpublisher 出版社'>";
								echo "<p>$row->bpublisher 出版社</p>";
								echo "</div>";
								echo "</div>";*/
								
								
								
								
							  /*echo "<input type='radio' id = '$row->name' name='name'" .
								"value='$row->name'>";
								echo "<label for='$row->name' id='name'>$row->name "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."$row->introduction</label>";*/
							}
						}
						

						//關閉資料連接
						mysqli_close($link);
				  ?>
						
						

						
					</ul>
					<script>

					$(function () {
							
						$(window).resize(function(e) {
							
							var containerWWW = $("#container").width();
							console.log("gg"+containerWWW +"gg");
							
							if (containerWWW >= 235)
							{
								$(".bookssliclass").eq(6).css("display","");
								$(".bookssliclass").eq(7).css("display","");
								$(".bookssliclass").eq(8).css("display","");
								$(".bookssliclass").eq(9).css("display","");
							}
								
							//if ()
							
							var positionstandd = $(".bookssliclass").eq(5).offset();
							var position6 = $(".bookssliclass").eq(6).offset();
							var position7 = $(".bookssliclass").eq(7).offset();
							var position8 = $(".bookssliclass").eq(8).offset();
							var position9 = $(".bookssliclass").eq(9).offset();
							
							if (position6.top != positionstandd.top)
								$(".bookssliclass").eq(6).css("display","none");
							else
								$(".bookssliclass").eq(6).css("display","");
							
							if (position7.top != positionstandd.top)
								$(".bookssliclass").eq(7).css("display","none");
							else
								$(".bookssliclass").eq(7).css("display","");
							
							if (position8.top != positionstandd.top)
								$(".bookssliclass").eq(8).css("display","none");
							else
								$(".bookssliclass").eq(8).css("display","");
							
							if (position9.top != positionstandd.top )
								$(".bookssliclass").eq(9).css("display","none");
							else
								$(".bookssliclass").eq(9).css("display","");
							
							/*var x = positionstand.top;  // 取得Y座標
							var y = position5.top;  // 取得Y座標
							console.log(x+" "+y);*/
						});
						
					});

					</script>
					
					
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