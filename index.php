<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Home_page</title>
</head>
<body>
<div class="form">
<p>Hello, <?php echo $_SESSION['username']; ?>!</p>
<p>You've successfully logged in.</p>
<p><a href="php_final.php">Asteroid API project</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>