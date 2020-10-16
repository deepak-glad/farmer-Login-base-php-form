<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="" method="post">
<label>Username:</label><input type="text" name="email"><br/>
<label>Password:</label><input type="password" name="mobile"><br/>
<input type="submit" value="Login" name="submit"><br/>
<!--New user Register Link -->
<p><a href="former.php">New User Registeration!</a></p>
</form>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['email']) && !empty($_POST['mobile'])){
 $user = $_POST['email'];
 $pass = $_POST['mobile'];

 //Selecting database
 include('connection.php');
 $query = mysqli_query($conn, "SELECT * FROM data WHERE email='".$user."' AND mobile='".$pass."'");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['email'];
 $dbpassword=$row['mobile'];
 }
 if($user == $dbusername && $pass == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$user;
 //Redirect Browser
 header("Location:welcome.php");
 }
 }
 else
 {
 echo "Invalid Username or Password!";
 }
 }
 else
 {
 echo "Required All fields!";
 }
}
?>
</body>
</html>