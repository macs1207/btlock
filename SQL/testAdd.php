<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" type="image/x-icon" href="/icon.ico" />
<!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add MAC</title>
</head>

<body>
<div data-role="page" id="pageone">
<?php

if ( isset($_POST["newMac"] ) && isset($_POST["user"] ) && $_POST["newMac"] != "" && $_POST["user"] != "" ) {
	echo ("<div data-role=\"header\">
		<h1>新增裝置</h1>
	</div>");
	//show user & MAC
	echo "<div data-role=\"main\" class=\"ui-content\">";	
	echo "<h1> 用戶名稱： " . $_POST["user"] . "<br>
	藍芽位址： " . $_POST["newMac"] . "<br></h1></div>";
	//connect DB
	$con = mysql_connect("127.12.48.2","admin5Iw3Vsm","IqM5jXfTyGQR");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		echo "<Script Language=\"JavaScript\">";
		echo ("setTimeout(\"location.href='/login/testPage.php'\",3000)");
		echo "</Script>";
	}
	mysql_select_db("info", $con);
	//insert values into DB
	$sql="INSERT INTO macdb (user , mac) VALUES( '" . $_POST["user"] . "' , '" . $_POST["newMac"] . "' )";
	if (!mysql_query($sql,$con)) {
		die('Error: ' . mysql_error());
		echo "<Script Language=\"JavaScript\">";
		echo ("setTimeout(\"location.href='/login/testPage.php'\",3000)");
		echo "</Script>";
	}
	echo ("<h2>成功新增！<br>");
	echo ("3秒後自動跳轉</h2>");
	mysql_close($con);
} else {
	echo ("<div data-role=\"footer\">");
	echo "<h1>欄位不可為空。<br>" ;
	echo ("3秒後自動跳轉</h1></div>");
}
echo "<Script Language=\"JavaScript\">";
echo ("setTimeout(\"location.href='/login/testPage.php'\",3000)");
echo "</Script>";
	
?>

<br /><input name="back" type="button" value="回前頁" onclick="location.href='/login/testPage.php'" />
<div data-role="footer">
  <h1>Supported by Openshift.</h1>
</div>

</div>
</body>
</html>
