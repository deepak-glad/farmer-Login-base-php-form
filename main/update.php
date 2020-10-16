<?php
$email=$_SESSION['sess_user'];
if(isset($_POST["update"])){
    extract($_POST);
    $surname=$_POST['surname'];
	$name=$_POST['name'];
	$fhname=$_POST['fhname'];
	$aadhar=$_POST['aadhar'];
	$village=$_POST['village'];
	$taluka=$_POST['taluka'];
	$city=$_POST['city'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$telegram=$_POST['telegram'];
    $email=$_POST['email'];
    $emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
    $mob="/^[1-9][0-9]*$/";
   
	if(!preg_match($emailval, $email)) :
		$msg="<script>alert('Please enter a valid email');</script>";
	elseif(!preg_match($mob, $mobile)) :
		$msg="<script>alert('Please enter a valid number'>;</script>";
	else :
		// insert data
		$sql="UPDATE data SET surname='".$surname."',name='".$name."',fhname='".$fhname."',aadhar='".$aadhar."',village='".$village."',taluka='".$taluka."',
        city='".$city."',phone='".$phone."',mobile='".$mobile."',telegram='".$telegram."'  WHERE email='$email'";
		if ($conn->query($sql) === TRUE) {
			echo "update successfully";
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
	endif;    
}
?>