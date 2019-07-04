<?php 

 require "inc/header.php"; 
 require "inc/topnav.php"; 
 require "inc/sidenav.php";
 session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
} 
 if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {
 $email = $_POST['email'];
    
 $phone = $_POST['phone'];
 if (empty($email) || empty($phone)) {
    echo "<script> alert('Plz Fill all Fields')</script>";
 }
 else {
 
 $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
 $res = mysqli_fetch_assoc($i);
 $n= $res['conf-id'];
 $sql = "INSERT INTO `contactus`(`email`,`phone`,`conf-id`) VALUES ('$email','$phone','$n')";
 
 $query = mysqli_query($connect,$sql);
    if ($query) {  echo "<script> alert('Done')</script>";    }
    else {
        echo mysqli_error($connect);
    }
}
} 
}
if (isset($_POST['cancel'])){  header("location:countact.php");       }


?>
<div class="main">
<div class="content">
   
   <h1>add Countact info</h1>
   
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
           <input type="text" name="email" placeholder="Email.." >
           <input type="text" name="phone" placeholder="Phone">
           <input type="submit" name="submit" value="Add">
           <input type="submit" name="cancel"  value="Cancel">
           <input type="submit" name="submit"formaction="edits/contactedit.php" formtarget="_blank" id="edit" value="Edit" >
       </form>
   
    
   
    
</div>
</div>

<?php require "inc/footer.php"; ?>