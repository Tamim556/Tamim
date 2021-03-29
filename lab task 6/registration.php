<?php
echo "<h2>Outout:</h2>";
$gender ="";$data1= "";
$data2= "";
$data3= "";
$password="";
$bloodgroup="";
$degree="";
if(isset($_REQUEST['submit'])){
$name = $_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$gender = $_REQUEST['gender'];
$dob=$_REQUEST['dob'];
$bloodgroup = $_REQUEST['bloodgroup'];
$degree = $_REQUEST['degree'];
if(empty($name))
{
echo "Please Enter Your Name";
echo "<br>";
}
else if (strlen($name)<3)
{
echo "empty name field or short length of name";
echo "<br>";
}
else if (!preg_match("/^[a-zA-Z'-''.'\s]+$/",$name))
{
echo "Please Enter Name as String and start with a letter";
echo "<br>";
}
else{ echo $name;
echo "<br>";}if(empty($email))
{
echo "Please Enter Email Address";
echo "<br>";
}
elseif(!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/",$email))
{
echo "Please Enter valid email addres ";
echo "<br>";
}
else {
echo $email;
echo "<br>";
}if ($gender =="Male" || $gender =="Female" || $gender =="Other" && !empty($gender))
{
echo $gender;
echo "<br>";
}
else{
echo "At least one of them has to be selected";
}
if(!empty($_REQUEST['blood_group']))
{
echo $_REQUEST['blood_group'];
echo "<br>";
}
else {
echo "Please Select Blood Group";
echo "<br>";
}
if (!empty($_POST["dept"]))
{
foreach ($_POST["dept"] as $key => $value) {
echo $value."<br>";
}
}
else{
echo "At least one of them has to be selected ";
echo "<br>";
}



     $servername = "localhost";
         $username = "username";
         $dbname = "task6";

           // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
         if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
          }


      $sql="INSERT INTO `registration` (`Name`, `Email`, `Password`, `Gender`, `DOB`, `Bloodgroup`, `Degree`) VALUES ('$name', '$email', '$password', '$gender', '$dob', '$bloodgroup', '$degree');";




           if ($conn->query($sql) == true){
             echo "Data inserted succesully";
               }
        else{
         echo "error while inserted".$conn->error;
       }
     $conn->close();


     




  }







?>
<!DOCTYPE html>
<html>
<head>
<title>PERSON PROFILE</title>
</head>
<body>
<form method="post">
<table width="500px" border="1" align="center" style="background:white;">
<tr>
<td>
<fieldset>
<legend><b>Name</b></legend>
<input type="text" name="name" value=""><br>
<hr>
</fieldset><fieldset>
<legend><b>Email</b></legend>
<input type="email" name="email" value="" >
<button title="hint:sample@example.com"><b>i</b></button><br>
<hr>
<fieldset>
<legend><b>Password</b></legend>
<input type="text" name="password">
</fieldset>
<hr>

</fieldset><fieldset>
<legend><b>Gender</b></legend>
<input type="radio" name="gender" value="Male" <?php if($gender =="Male")
{echo "checked";}?>> Male
<input type="radio" name="gender" value="Female" <?php if($gender =="Female")
{echo "checked";}?> > Female
<input type="radio" name="gender" value="Other" <?php if($gender =="Other")
{echo "checked";}?>> Other <br>
<hr>
</fieldset><fieldset>
<legend><b>Date of Birth</b></legend>
<b>DOB</b><input type="text" name="dob" size="" value="">
<hr>
</fieldset><fieldset>
<legend><b>Blood Group </b></legend>
<select name="bloodgroup" >
<option selected disabled></option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select> <br>
<hr>
</fieldset><fieldset>
<legend><b>Degree</b></legend>
<input type="checkbox" name="degree" value="SSC"><b> SSC</b>
<input type="checkbox" name="degree" value="HSC"><b> HSC</b>
<input type="checkbox" name="degree" value="BSc"><b> BSc</b>
<input type="checkbox" name="degree" value="MSc"><b> MSc</b><br>
<hr>
</fieldset>
<hr>
<hr>
<input type="submit" name="submit" value="Submit">
<br>
</td>
</tr>
</table>
</form>
</body>
</html>