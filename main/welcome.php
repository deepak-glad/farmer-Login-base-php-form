<?php
session_start();
if(!isset($_SESSION["sess_user"])){
 header("Location: login.php");
}
else
{
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome </title>
</head>
<h1>Welcome </h1>
<p>This is Login Page</p>
<div style="position: absolute; right:30px; top:20px; "><?=$_SESSION['sess_user'];?>!<a href="logout.php" style="margin:10px; background:grey; color:white; padding:5px; border-radius:8px; text-decoration:none">Logout</a></div>

<body>
    <form method="POST" action="" ><?php include('display.php'); ?></form>
</body>
</html>
<?php
}
?>