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
   
   <h1>camera ready</h1>
   
       <form>
           <input type="text"  placeholder="content.." id="content">
           <input type="url"  placeholder="url.." id="url">
           
           <input type="submit" name="submit" id="addcr" value="Add">
       </form>
   
    
  
</div>
</div>

<?php require "inc/footer.php"; ?>