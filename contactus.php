﻿<!DOCTYPE html>
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
          <div id=""> </div>
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
            <form id="form1" name="form1" method="post" action=		"sendmail.php">
              <br />
              <h2 style="width:400px; margin:0 auto; color:#333333;">聯絡我們</h2>
              <table width="400" height="211" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="71" align="center" bgcolor="#e7e7e7">姓名</td>
                  <td width="314" bgcolor="#e7e7e7"><label>
                      <input type="text" name="sndname" id="sndname" />
                    </label></td>
                </tr>
                <tr>
                  <td align="center">Email</td>
                  <td><input type="text" name="sendmail" id="sendmail" /></td>
                </tr>
                <tr>
                  <td align="center" bgcolor="#E7E7E7">回應類別</td>
                  <td bgcolor="#E7E7E7"><select name="subject" id="subject">
                      <option value="站務問題" selected="selected">站務問題</option>
                      <option value="合作提案">合作提案</option>
                      <option value="其它問題">其它問題</option>
                    </select></td>
                </tr>
                <tr>
                  <td height="64" align="center">回應內容</td>
                  <td><textarea name="sendbody" id="sendbody"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" bgcolor="#F8F8F8"><label>
                      <input type="submit" name="button" id="button" value="送 出" class="btn" />
                      <input type="reset" name="button2" id="button2" value="取 消" onclick="javascript:window.open('index.php','_self')" class="btn"/>
                    </label></td>
                </tr>
              </table>
            </form>
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
