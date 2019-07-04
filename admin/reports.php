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

        <h1>add new reports</h1>

       <form>
           <input type="text" placeholder="recommendations.." id="recoms">
           <input type="text"  placeholder="title.." id="title">
           <input type="text" placeholder="about.." id="about">
           <input type="submit" name="submit" id="addrepo" value="Add" >
       </form>

    </div>
</div>

<?php require "inc/footer.php"; ?>
