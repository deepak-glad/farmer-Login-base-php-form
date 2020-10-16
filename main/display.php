<?php
include('connection.php');
include_once('update.php');
$email=$_SESSION['sess_user'];
$query="SELECT * FROM  data WHERE email='$email'";
$data= mysqli_query($conn, $query);
$total= mysqli_num_rows($data);


if($total != 0){

	?>
	<table>
	
	<?php
    while($result= mysqli_fetch_assoc($data)){
        $res = mysqli_query($conn,"SELECT * FROM countries WHERE id=$result[country]");
        $resu = mysqli_query($conn,"SELECT * FROM states where id = $result[state]");
        while($row = mysqli_fetch_array($res) and $roww=mysqli_fetch_array($resu)){

        echo "<tr><td>SURNAME:-</td><td></td>
        <td><input disabled name='surname' id='surname' value=".$result['surname']."></td></tr>
        <tr><td>NAME:-</td><td></td>
        <td><input disabled name='name' id='name' value=".$result['name']."></td></tr>
        <tr><td>FATHER/HUSBAND'S NAME:-</td><td></td>
        <td><input disabled name='fhname' id='fhname' value=".$result['fhname']."></td><br></tr>
        <tr><td>AADHAR:-</td><td></td>
        <td><input disabled name='aadhar' id='aadhar' value=".$result['aadhar']."></td></tr>
        <tr><td>VILLAGE:-</td><td></td>
        <td><input disabled name='village' id='village' value=".$result['village']."></td></tr>
        <tr><td>TALUKA:-</td> <td></td>
        <td><input disabled name='taluka' id='taluka' value=".$result['taluka']."></td></tr>
        <tr><td>COUNTRY:-</td><td></td>
        <td><input disabled name='country' id='country' value=".$row['name']."></td></tr>
        <tr><td>STATE:-</td><td></td>
        <td><input disabled name='state' id='state' value=".$roww['name']."></td></tr>
        <tr><td>CITY:-</td><td></td>
        <td><input disabled name='city' id='city' value= ".$result['city']."></td></tr>
        <tr><td>PHONE:-</td><td></td>
        <td> <input disabled name='phone' id='phone' value=".$result['phone']."></td></tr>
        <tr><td>MOBILE:-</td><td></td>
        <td><input disabled name='mobile' id='mobile' value=".$result['mobile']."></td></tr>
        <tr><td>TELEGRAM:-</td><td></td>
        <td><input disabled name='telegram' id='telegram' value=".$result['telegram']."></td></tr>
        <tr><td>EMAIL:-</td><td></td>
    	<td><input disabled name='email' id='email' value=".$result['email']."></td></tr>
       <td> <button id='edit' onclick='myFunction( )'>EDIT</button><td>
       <td> <button disabled id='update' name='update'>UPDATE</button><td>";
}

    }
}
else{
    echo "no record found";
}

?>
</table>
<script>
    document.getElementById("edit").addEventListener("click",function(event){ event.preventDefault(); })
function myFunction() {
    document.getElementById("surname").removeAttribute('disabled',false);
    document.getElementById("name").removeAttribute('disabled',false);
    document.getElementById("fhname").removeAttribute('disabled',false);
    document.getElementById("aadhar").removeAttribute('disabled',false);
    document.getElementById("village").removeAttribute('disabled',false);
    document.getElementById("taluka").removeAttribute('disabled',false);
    document.getElementById("country").removeAttribute('disabled',false);
    document.getElementById("state").removeAttribute('disabled',false);
    document.getElementById("city").removeAttribute('disabled',false);
    document.getElementById("phone").removeAttribute('disabled',false);
    document.getElementById("mobile").removeAttribute('disabled',false);
    document.getElementById("telegram").removeAttribute('disabled',false);
    document.getElementById("email").removeAttribute('disabled',false);
    document.getElementById("update").removeAttribute('disabled',false);
}
</script>

