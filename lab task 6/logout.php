<!DOCTYPE html>
<html>
<head>
  <title>logout</title>

  <style type="text/css">
    label
    {
      width: 100px;
      display: inline-block;
      text-align: left;
      
    }
  .error
  {
    color: red;
  }
</style>

</head>
<body>





<?php

  $flag=TRUE;
  $name=$pass=$errname=$errpass="";

   

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
  $checkName=$_POST["name"];
  $checkPass=$_POST["pass"];

  $namePatt2='/^.{2,}$/';
  $passPatt1='/^.{8,}$/';
  $passPatt2='/^(?=.*[@#$%]).{8,}$/';

    if(!empty($checkName))
    {
      if(!preg_match("/^[a-zA-Z1-9-._ ]*$/",$checkName))
      {
        $errname="* User Name can contain alpha numeric characters, period,dash or underscore only";
        $flag=false;
      }
      else if(!preg_match($namePatt2,$checkName))
      {
        $errname="* User Name must contain at least two (2) characters";
        $flag=false;
      }
      else
      {
        $name=test_input($checkName);
        $flag=true;
      }
      
    }

    if(!empty($checkPass))
    {
      if(!preg_match($passPatt1,$checkPass))
      {
        $errpass="Password must not be less than eight (8) characters";
      }
      else if(!preg_match($passPatt2,$checkPass))
      {
        $errpass="Password must contain at least one of the special characters (@, #, $,%)";
      }
      else
      {
        $pass=test_input($checkPass);
      }


    }

  }


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>



<?php

  if(isset($_REQUEST['submit'])){
      

     $name=$_REQUEST['name'];
     $pass=$_REQUEST['pass'];




     $servername = "localhost";
         $username = "username";
        $password = "password";
         $dbname = "task6";

           // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
         if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
          }


        $sql="select * from registration where name='$name' and password='$pass';";


 $result= mysqli_query($conn, $sql);




           if ($row=mysqli_fetch_array($result)){
           header("Location: dashboard.php");
               }
        else{
         echo "error while login".$conn->error;
       }
     $conn->close();



     session_start();

$_SESSION["username"]= $name;





  setcookie("name",$name,time()-120);

  setcookie("pass",$pass, time()-120);


  }







    

?>


<fieldset style="width:400px">
  <legend><h3>LOGIN</h3></legend> 

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
    <label for="name">User Name :</label> 
    <input type="text" name="name" value=>
    <span class="error"><?php echo $errname;?></span><br>
    <label for="fpassword">Password :</label> 
    <input type="text" name="pass">
    <span class="error"><?php echo $errpass;?></span> 
    <hr align=center  size=1>

    <label for="fremember">Remember me</label> 
    <input type="checkbox" name="frem">
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
    <a href="forgetpass.php">Forget password?</a>
    <br>
    <a href="registration.php">new Member ? <b><u>Register</u></b> hare</a>
  </form>

</fieldset>


</body>
</html>