<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<title>登入</title>
</head>

<body>
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>登入</h1>
  </div>
    	<form action="login.php" method="post">
		帳號: <input type="text" name="id"><br>
		密碼: <input type="password" name="pw"><br>
		<input name="Login" type="submit" id="login" value="登入">
		</form>
		<input name="Home" type="button" value="首頁" onclick="location.href='/'" />
<div data-role="footer">
  <h1>Supported by Openshift.</h1>
</div>
</div>

</body>
</html>