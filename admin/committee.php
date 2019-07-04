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

        <h1>add new committee Member</h1>

        <form>
            <input type="text" placeholder=" Name.." id="fname">
            <textarea id="lname" cols="10" rows="5" placeholder="About.."></textarea>
            <input type="submit" name="submit" id="addcom" value="Add">
            <input type="submit" name="submit" id="cancel" value="Cancel">
            <input type="submit" name="submit" formaction="edits/comitedit.php" formtarget="_blank" id="edit" value="Edit" >

        </form>
        
        <?php
        
    
        
        
        ?>


    </div>
</div>

<?php require "inc/footer.php"; ?>
