
<!DOCTYPE html>
<html>
<head>
<title>lab task 2

</title>
</head>
<body>


<?php
echo "<h2>Outout:</h2>";
$gender ="";$data1= "";
$data2= "";
$data3= "";
if(isset($_REQUEST['submit'])){
$name = $_REQUEST['name'];
$email=$_REQUEST['email'];
$gender = $_REQUEST['gender'];
$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yyyy = $_REQUEST['yyyy'];
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
echo  "Please Enter Name as String and start with a letter";
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
}if($dd == "" && $mm == "" && $yyyy == ""){
echo "Please Enter Date";
}
else{
$data1= $dd;
echo $_POST['dd'];
echo "/";
$data2=$mm;
echo $_POST['mm'];
echo "/";
$data3=$yyyy ;
echo $_POST['yyyy'];
echo "<br>";
}if(!empty($_REQUEST['blood_group']))
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
echo "At least two of them has to be selected ";
echo "<br>";
}
}
?>






<form method="post">
<table width="500px" align="center" style="background:white;">
<tr>
<td>
<br>
<br>
<b>Name</b>
<input type="text" name="name" value=""><br><br>
<hr>

<b>Email</b>
<input type="email" name="email" value="" >
<button title="hint:sample@example.com"><b>i</b></button><br>
<hr>

<b>Gender</b>
<input type="radio" name="gender" value="Male" <?php if($gender =="Male")
{echo "checked";}?>> Male
<input type="radio" name="gender" value="Female" <?php if($gender =="Female")
{echo "checked";}?> > Female
<input type="radio" name="gender" value="Other" <?php if($gender =="Other")
{echo "checked";}?>> Other <br>
<hr>

<legend><b>Date of Birth</b></legend>
<b>dd</b><input type="text" name="dd" size="1" value=" <?=$data1 ?>">/
<b>mm</b><input type="text" name="mm" size="1" value=" <?=$data2 ?>"> /
<b>yyyy</b><input type="text" name="yyyy" size="3" value=" <?=$data3 ?>"> <i>(dd/mm/yyyy)</i>
<hr>

<legend><b>Blood Group </b></legend>
<select name="blood_group" >
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

<legend><b>Degree</b></legend>
<input type="checkbox" name="dept[]" value="SSC"><b> SSC</b>
<input type="checkbox" name="dept[]" value="HSC"><b> HSC</b>
<input type="checkbox" name="dept[]" value="BSc"><b> BSc</b>
<input type="checkbox" name="dept[]" value="MSc"><b> MSc</b><br>
<hr>

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