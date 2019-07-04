<?php require "inc/header.php"; ?>
<?php require "inc/topnav.php"; ?>

<?php require "inc/sidenav.php"; 
session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
?>

<div class="main">
<div class="content">
   
   <h1>add new sponsor</h1>
   
       <form enctype="multipart/form-data" id="sponsorform">
           <input type="text" placeholder="Name.." id="name" name="name">
           <input type="file" name="file" id="file" style="cursor:pointer">
           <input type="text" placeholder="Email.." id="email" name="email">
           <input type="submit" name="submit" id="addsponsor" value="Add">
       </form>
   
    
   
    
</div>
</div>

<?php require "inc/footer.php"; ?>