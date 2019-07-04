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

        <h1>add new member</h1>

        <form>
            <input type="text" placeholder="First Name.." id="name">
            <input type="email" placeholder="Email.." id="email">
            <textarea cols="30" rows="10" placeholder="Afflliation.." id="afflliation"></textarea>
            <textarea cols="30" rows="10" placeholder="intersts.." id="interests"></textarea>
            <input type="text" placeholder="Address.." id="address">
            <input type="submit" id="addmemb" value="Add">
        </form>


    </div>
</div>

<?php require "inc/footer.php"; ?>
