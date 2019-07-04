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

        <h1>add new reviewer</h1>

        <form>
            <input type="text" name="lname" placeholder="First Name.." id="fname">
            <input type="text" name="lname" placeholder="Last Name.." id="lname">
            <input type="tel" name="phone" placeholder="Phone.." id="phone">
            <input type="email" name="email" placeholder="Email.." id="email">
            <textarea name="afflliation" id="afflliation" cols="30" rows="10" placeholder="Afflliation.."></textarea>
            <textarea name="qualification" id="qualification" cols="30" rows="10" placeholder="Qualification.."></textarea>
            <input type="text" name="address" placeholder="Address.." id="address">
            <input type="submit" name="submit" id="addreviewer" value="Add">
        </form>



    </div>
</div>

<?php require "inc/footer.php"; ?>
