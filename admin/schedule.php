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

        <h1>add new schedule</h1>

        <form  method="post" >
            <input type="text" name="day" placeholder="Day.." id="day">
            <input type="text" name="from[]" placeholder="From.." id="From">
            <input type="text" name="to[]" placeholder="To" id="To">
            <textarea id="details" name="details[]" cols="10" rows="3" placeholder="Details.."></textarea>
            <button id="btn1">Add New Fields</button>
            <input type="submit" name="submit" id="addschedule" value="Add">

        </form>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("form #btn1").click(function(e) {
            e.preventDefault();
            var htm = '<input type="text" name="from[]" placeholder="From.." id="From">' + '<input type="text" name="to[]" placeholder="To" id="To"> ' +
                '<textarea id="abstract" name="details[]" cols="10" rows="3" placeholder="Details.."></textarea>';
            $(this).before(htm);
        });
        
       
        
    });

</script>

<?php //require "inc/footer.php"; ?>
