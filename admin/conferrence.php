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
   
   <h1>add new conference</h1>
   
       <form enctype="multipart/form-data" method="post">
           <input type="text" name="title" placeholder="Title.." id="title">
           <input type="date" name="year" placeholder="Year.." id="year">
           <input type="text" name="location" placeholder="Location" id="location">
           <textarea id="abstract" name="abstract" cols="10" rows="3" placeholder="Info.."></textarea>
           
           <select name="status" id="status" >           
                <option value="active">Active</option>
                <option value="notactive" selected>Not Active</option>
           </select>
           <input type="file" name="files[]" id="imgs" style="cursor:pointer" multiple="multiple">

           <input type="submit" name="submit" id="addconf" value="Add" >
           <input type="submit" name="submit" id="cancelconf" value="Cancel" >

           <input type="submit" name="submit" formaction="edits/confedit.php" formtarget="_blank" id="edit" value="Edit" >
       </form>
       
</div>
</div>

<?php require "inc/footer.php"; ?>