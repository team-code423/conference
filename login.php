<?php require "inc/header.php";  ?>

<?php 
if(isset($_SESSION['id']))
{
     header("location:index.php");
     exit;
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
     if (isset($_POST['submit'])) {

          $email = $_POST['email'];

          $password = $_POST['password'];

          $row =  [];
          

          $sql = "SELECT * FROM `auther` WHERE `A-email` = '$email' AND `password` = '$password'  ";


          $query = mysqli_query($connect,$sql);

          if(mysqli_num_rows($query) == 1)
          {
               $row = mysqli_fetch_assoc($query);

               $_SESSION['id'] = $row['A-id'];
               $_SESSION['fname'] = $row['A-fname'];
               $_SESSION['lname'] = $row['A-lname'];
               $_SESSION['fullname'] = $row['A-fname'] . " " . $row['A-lname'];
               $_SESSION['email'] = $row['A-email'];
               $_SESSION['gender'] = $row['gender'];
               $_SESSION['group'] = $row['co-group'];
               $_SESSION['address'] = $row['A-address'];
               $_SESSION['company'] = $row['company'];
               $_SESSION['country'] = $row['country'];
               $_SESSION['dep'] = $row['dep'];
               $_SESSION['phone'] = $row['phone'];
               $_SESSION['faculty'] = $row['faculty'];
               $_SESSION['state'] = $row['state'];
               $_SESSION['phone'] = $row['phone'];
               $_SESSION['paper'] = $row['paper-id'];
               
               header("location:auther/");
               exit;
              

          }else{
               echo  mysqli_error($connect). "email or password not found" ;
          }

     }
}

?>

<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="login-box">

                    <h1 class="text-center">Login </h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                         <div class="textbox">
                              <i class="fas fa-user"></i>
                              <input type="email" placeholder="Email" name="email">
                         </div>

                         <div class="textbox">
                              <i class="fas fa-lock"></i>
                              <input type="password" placeholder="Password" name="password">
                         </div>

                         <input type="submit" class="btn" value="Log in" name="submit">
                         </form>

                         <a href="registration.php">Creat New Account</a>
               </div>
               
          </div>
     </div>
</div>
<?php require "inc/footer.php";  ?>