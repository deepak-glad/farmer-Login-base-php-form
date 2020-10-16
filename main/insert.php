<?php
include 'connection.php';

 if(isset($_POST['submit'])){
	 extract($_POST);
	$surname=$_POST['surname1'];
	$name=$_POST['name'];
	$fhname=$_POST['fhname'];
	$aadhar=$_POST['aadhar'];
	$village=$_POST['village'];
	$taluka=$_POST['taluka'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$telegram=$_POST['telegram'];
	$email=$_POST['email'];
	$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
	$mob="/^[1-9][0-9]*$/"; 
	if($name=="" && $email=="" && $phone=="" && $country=="" && $state="" && $surname==""&& $fhname="" ) :

		$msg="<script>alert('Please fill all mandatory fields');</script>";
	elseif(!preg_match($emailval, $email)) :
		$msg="<script>alert('Please enter a valid email');</script>";
	elseif(!preg_match($mob, $mobile)) :
		$msg="<script>alert('Please enter a valid number');</script>";
	elseif($email != ""):
		$sql ="select * from data where email='".$email."' ";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($result);
		if($row>0)
		{
			echo "<script>alert('email already exits');</script>";
		}

	    else{
		// insert data
		$sql="INSERT into data (surname,name,fhname,aadhar,village,taluka,country,state,city,phone,mobile,telegram,email)
			VALUES('$surname','$name','$fhname','$aadhar','$village','$taluka','$country','$state','$city','$phone','$mobile','$telegram','$email')";

		if ($conn->query($sql) === TRUE) {

			echo "<script>alert('New record created successfully')</script>";
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
		// $msg_sucess="Record inserted successfully";
		// $msg="";
		}
	endif;
?>
<script>
window.onload = function() {
    location.href = "former.php";
}
</script>
<?php

$conn->close();
}

?>