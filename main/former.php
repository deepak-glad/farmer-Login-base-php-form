<?php
include("insert.php");
include('switch.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?> " id="stylemian">
 <?php echo @$msg; ?><?php echo @$msg_sucess; ?></div>
<meta charset="UTF-8">
<title><?php echo $lang['title']?></title>
<a href="former.php?lang=en"><?php echo $lang['lang_en']?></a>
<a href="former.php?lang=hi"><?php echo $lang['lang_hi']?></a>
<a href="former.php?lang=gu"><?php echo $lang['lang_gu']?></a>
<a style="float:right;" href="login.php">Login</a>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<form method="POST" action="">
<div class="container mt-5 conatinerdes">
<div class="row">
<div class="card">
<div class="card-header">
<h2 class="text-success"><?php echo $lang['h2']?></h2>
</div>
<div class="card-body">
<div class="form-group">
<p>1.<?php echo $lang['p']?></p><table>
	<tr>
	<?php echo $lang['sur']?>:<br/><input type="text" id="surname1" name="surname1" placeholder="please enter your surname"><br>
	<?php echo $lang['name']?>:<br/><input type="text" id="name" name="name" placeholder="please enter your name"><br>
	<?php echo $lang['fhname']?>:<br/><input type="text" id="fhname"  name="fhname" placeholder="please enter your father/Husband's Name"><br>
	<?php echo $lang['aadhar']?>:<br/><input type="number" id="aadhar" name="aadhar" placeholder="please enter your adhar number"><br>
	<?php echo $lang['village']?>:<br/><input type="text" id="village" name="village" placeholder="please enter your Village"><br>
	<?php echo $lang['taluka']?>:<br/><input type="text" id="taluka"name="taluka" placeholder="please enter your Taluka"><br></tr></table>
	<label for="country"><?php echo $lang['country']?></label>
<select class="form-control" name="country" id="country">
<option value="">Select Country</option>
<?php
require_once "connection.php";
$result = mysqli_query($conn,"SELECT * FROM countries");
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
<?php
}
?>
</select>
</div>
<div class="form-group">
<label for="state"><?php echo $lang['state']?></label>
<select class="form-control" name="state" id="state">
</select>
</div>                        
<div class="form-group">
<label for="city"><?php echo $lang['city']?></label>
<select class="form-control" name="city" id="city">
</select>
</div>
<?php echo $lang['phone']?>:<br/><input type="number" name="phone" placeholder="please enter your phone number"><br>
<?php echo $lang['mobile']?>:<br/><input type="number" name="mobile" placeholder="please enter your mobile number"><br>
<?php echo $lang['telegram']?>:<br/><input type="number" name="telegram" placeholder="please enter your telegram number"><br>
<?php echo $lang['email']?>:<br/><input type="text" name="email" placeholder="please enter your email id"><br></tr>
<button name="submit" id="submit" value="submit" class="btn_shift">SUBMIT</button>        

</div>
</div>
</div>
</div> 
</div>
</form>
<script>
$(document).ready(function() {
$('#country').on('change', function() {
var country_id = this.value;
$.ajax({
url: "states-by-country.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state").html(result);
$('#city').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state').on('change', function() {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city").html(result);
}
});
});
});
</script>

</body>
</html>