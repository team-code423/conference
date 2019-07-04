<?php 

require "../inc/database.php";

session_start();

if(isset($_SESSION['attendee']))
{
     header("location:attendee.php");
     exit;
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
     if (isset($_POST['submit'])) {

          $email = $_POST['email'];

          $pass = $_POST['pass'];

          $row =  [];
          

          $sql = "SELECT * FROM `attendee` WHERE `email` = '$email' AND `pass` = '$pass'  ";


          $query = mysqli_query($connect,$sql);

          if(mysqli_num_rows($query) == 1)
          {
               $row = mysqli_fetch_assoc($query);
               $_SESSION['attendee'] = mysqli_insert_id($connect);
               $_SESSION['name'] = $row['name'];
               $_SESSION['email'] = $row['email'];
               header("location:attendee.php");
               
               exit;
              

          }else{
               echo  mysqli_error($connect). "email or password not found" ;
          }

     }
}

?>
<html>
<head>
    
    
    
        <meta charcet="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="login/style.css"> 
    
</head>

<body>
 

    
 <h1>Log in</h1>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

  <label>Email:</label>
  <input type="text" name="email">

  <label>Password:</label>
  <input type="password" name="pass">

  <input type="submit" value="Log In"name="submit">

  <a href="regestration.php"> Creat New Account</a>

</form>   
     
    
</body>




</html>