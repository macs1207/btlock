<?php

setcookie("user", "", time()-600);
echo "<script type='text/javascript'>";
echo "window.location.href='/login'";
echo "</script>";
?>