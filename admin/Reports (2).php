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

        <h1>Reports</h1>

        <form enctype="multipart/form-data">
            <div>
            <input type="text"  placeholder="Paper title" >
            <input type="text"  placeholder="Author Name" >
            <input type="text"  placeholder="ID">
            <a href="PAPER_REVIEW_FORM.html">View Report</a>
            
            </div>

        </form>


    </div>
</div>




<?php require "inc/footer.php"; ?>
