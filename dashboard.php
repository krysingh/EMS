<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
<h4>Welcome Into Dashboard : <?php echo $_SESSION['username'] ?></h4>
<?php 
if(isset($_SESSION['username'])){?>
Welcome <?php echo $_SESSION["username"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}else echo "<script>window.location.href='index.php'</script>";
?>
</a>
</body>
</html>