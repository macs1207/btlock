<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" type="image/x-icon" href="/icon.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理頁面</title>
</head>

<body>
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>管理頁面</h1>
  </div>
  <div data-role="main" class="ui-content">
    <p>歡迎登入展場用帳號！<br>為避免影響作品功能，故移除此帳號的「刪除MAC」權限。<br></p>
  </div>
<?php

	$servername = "127.12.48.2";
	$username = "admin5Iw3Vsm";
	$password = "IqM5jXfTyGQR";
	$dbname = "info";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM account";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sql = "SELECT * FROM macdb";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo("<div data-role=\"footer\">
    				<h1>已登錄裝置：<br></h1>
  				</div>");
				echo("<div data-role=\"main\" class=\"ui-content\">
					<p>格式：用戶名稱 _ 藍芽位址<br></p>
				</div>");
				while($row = $result->fetch_assoc()) {
					echo ("<div data-role=\"main\" class=\"ui-content\">
  						<p>" . $row["user"] . "  _  " . $row["mac"] . "<br></p>
					</div>") ;
				}			
			} else {                       //0 result
					echo "DataBase is empty.";
			}
					  
				$conn->close();
		  
				//add mac
				echo ("<br><br><div data-role=\"footer\">
   					<h1>新增裝置</h1>
  				</div>
				<div data-role=\"main\" class=\"ui-content\">
    				<p><form action=\"../SQL/testAdd.php\" method=\"post\">
					用戶名稱: <input type=\"text\" name=\"user\" /><br>
					藍芽位址: <input type=\"text\" name=\"newMac\" />
					<input type=\"submit\" value=\"新增裝置\" />
					</form></p>
				</div>");
				//sign out
				echo ("<input name=\"sign out\" type=\"button\" value=\"登出\" onclick=\"location.href='/login/cookie.php'\" />");
		}
	}	

?>
<div data-role="footer">
  <h1>Supported by Openshift.</h1>
</div>
</div>
</body>
</html>