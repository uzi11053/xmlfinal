﻿<!DOCTYPE html> 
<html>
3333333333333333333333
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
						
						if( !isset($_SESSION["accounts"]) || $_SESSION["accounts"]==""  )//un登入狀態
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

		

		<div id="main">

			<div class="row">
			
				<div class="col-xs-1" >

				<div id="">

					 

				</div>

			  </div>

			  <div class="col-xs-11" >

				<div id="mainright">
					<div id="bk">
						<img src="./img/book.png"></img>
					</div>
					<?php   						
						/*if( !isset($_SESSION["accounts"]) || $_SESSION["accounts"]==""  )//un登入狀態
						{
							//$_GET["bid"]="";
							echo "<p>You are not logged in</p>";
							echo "<input type='button' value='登入' onclick=\"javascript:window.open('myaccount.php','_self')\"/>"; 
						}
						else
						{*/
							require_once("include/dbtools.inc.php");
							$bookid = $_GET["bid"]; 
							
							
							$link = create_connection();										
							//執行 Select 陳述式取得候選人資料
							$sql = "SELECT * FROM book WHERE bookid='$bookid' AND bstatus='0' ";
							$result = execute_sql($link, "books", $sql);
							
							if (!$result)
							{
								
							}
							else
							{
								while ($row = mysqli_fetch_object($result))
								{
									$dbseller = $row->bprovider;
									echo "<div class='singlebookclass'>";
									echo "<div class='singlebookimgdiv'>";
									echo "<img src='./bookimg/$row->bimg' class='singlebookimg' id='bkimgg' >";
									echo "</div>";
									
									echo "<div class='singlebookright' id='bkfontt'>";
									echo "<div class='singlebookname' title='$row->bname'>";
									echo "<p>書名：$row->bname</p>";
									echo "</div>";
									
									
									/*echo "<div class='bookssnameb' title='$row->bname' >";
									echo "<p>$row->bname</p>";
									echo "</div>";*/
									
									echo "<div class='singlebookprice' >";
									echo "<p>作者：$row->bauthor</p>";
									echo "</div>";
									
									
									
									echo "<div class='singlebookprice' >";
									if ($row->bcategory == '0')
										echo "<p>分類：數學類</p>";
									else if ($row->bcategory == '1')
										echo "<p>分類：程式語言類</p>";
									else if ($row->bcategory == '2')
										echo "<p>分類：其他類</p>";
									echo "</div>";
									
									echo "<div class='singlebookprice' >";
									echo "<p>售價：\$&nbsp$row->bprice</p>";
									echo "</div>";
									
									echo "<div class='singlebookprice' >";
									echo "<p>賣家：$row->bprovider</p>";
									echo "</div>";
									
									echo "<div class='singlebookprice' >";
									if ($row->bnote == '')
										echo "<p>備註：無</p>";
									else 
										echo "<p>備註：$row->bnote</p>";
									echo "</div>";
									
									

									echo "<div class='singlebookpublisher' title='$row->bpublisher 出版社'>";
									echo "<p>出版社：$row->bpublisher 出版社</p>";
									echo "</div>";
									echo "</div>";
									echo "</div>";
									
									
									
									
								  /*echo "<input type='radio' id = '$row->name' name='name'" .
									"value='$row->name'>";
									echo "<label for='$row->name' id='name'>$row->name "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."$row->introduction</label>";*/
								}
							}
									
						//}

						
					?>
					<script>
						$(function () {
							var containerWW = $("#container").width();
							$("#bkimgg").css("width",containerWW*0.32);
							$("#bkimgg").css("height",containerWW*0.384);
							$("#bkfontt").css("font-size",(containerWW/1170)*24);
							//console.log(containerWW);
							$(window).resize(function(e) {
								containerWW = $("#container").width();
								console.log(containerWW);
								$("#bkimgg").css("width",(containerWW*0.32));
								$("#bkimgg").css("height",(containerWW*0.384));
								$("#bkfontt").css("font-size",(containerWW/1170)*24);
								$(".btnstyle1").css("font-size",(containerWW/1170)*16);
								$(".btnstyle2").css("font-size",(containerWW/1170)*16);
								
							});
							
							
						});
					
					
					</script>
					
					
					<input type='button' value='加入購物車' id="car" class="btnstyle1"/>
					<!--<input type='button' value='check' id="check" />      onclick="javascript:window.open('shoppingcart.php','_self')"-->
					<input type='button' value='我要買書' id="gocar" class="btnstyle2"/>
					
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


<script>

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        //alert("Welcome again " + user);
    } else {
        /*user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 365);
        }*/
    }
}







$(function(){
	
	$( "#car" ).click(function() {
		
		var userr = <?php echo json_encode($_SESSION["accounts"]); ?>;
		//alert (userr);
		if (userr!="")
			addcook(userr);
		else
		{
			alert("您未登入");
		}
		
	});
	
	$( "#gocar" ).click(function() {
		
		var userr = <?php echo json_encode($_SESSION["accounts"]); ?>;
		//alert (userr);
		if (userr!="")
			addgocook(userr);
		else
		{
			alert("您未登入");
		}
		
	});
	
	/*$( "#check" ).click(function() {
		var userr = <?php echo json_encode($_SESSION["accounts"]); ?>;
		checkcook(userr);
		
	});*/
});




function addcook () 
{
	var um = <?php echo json_encode($_SESSION["accounts"]); ?>;
	var dbseller = <?php echo json_encode($dbseller); ?>;
	if (um == dbseller)
	{
		alert("這是你自己的書，想留著就不要拿出來賣");
	}
	else
	{
		var usersession = arguments[0];
		var insurl = location.href;
		var bindex = insurl.substr(insurl.indexOf("?bid=")+5);
		var usern = getCookie(usersession);
		var recart = false;
		if (usern != "")
		{
			var arrayusern = usern.split(" ");
			for (i = 0; i < arrayusern.length; i++) { 
				if (bindex == arrayusern[i])
				{
					recart = true;
					break;
				}
			}
			if (recart)
				alert("書本已經在您的購物車了!");
			else
			{
				usern += " "+bindex;
				setCookie(usersession,usern,365);
				alert("成功加入購物車!");
			}
		}
		else
		{
			setCookie(usersession,bindex,365);
			alert("成功加入購物車!");
		}
	}
}


function addgocook () 
{
	var um = <?php echo json_encode($_SESSION["accounts"]); ?>;
	var dbseller = <?php echo json_encode($dbseller); ?>;
	if (um == dbseller)
	{
		alert("這是你自己的書，想留著就不要拿出來賣");
	}
	else
	{
		var usersession = arguments[0];
		var insurl = location.href;
		var bindex = insurl.substr(insurl.indexOf("?bid=")+5);
		var usern = getCookie(usersession);
		var recart = false;
		if (usern != "")
		{
			var arrayusern = usern.split(" ");
			for (i = 0; i < arrayusern.length; i++) { 
				if (bindex == arrayusern[i])
				{
					recart = true;
					break;
				}
			}
			if (recart)
			{
				//alert("書本已經在您的購物車了!");
				document.location.href="shoppingcart.php";
			}
			else
			{
				usern += " "+bindex;
				setCookie(usersession,usern,365);
				document.location.href="shoppingcart.php";
				//alert("成功加入購物車!");
			}
		}
		else
		{
			setCookie(usersession,bindex,365);
			document.location.href="shoppingcart.php";
			//alert("成功加入購物車!");
		}
	}
}










</script>

</body>

</html>

