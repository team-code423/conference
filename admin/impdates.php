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
 $content = $_POST['content'];
    
 $date = $_POST['date'];
 if (empty($content) || empty($date)) {
    echo "<script> alert('Plz Fill all Fields')</script>";
 }
 else {
 
 $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
 $res = mysqli_fetch_assoc($i);
 $n= $res['conf-id'];
 $sql = "INSERT INTO `impdates`(`content`,`date`,`conf-id`) VALUES ('$content','$date','$n')";
 
 $query = mysqli_query($connect,$sql);
 }
 if ($query) {  echo "<script> alert('Done')</script>";    }
 else {
     echo mysqli_error($connect);
 }
    
}
} 


?>
<div class="main">
    <div class="content">

        <h1>add new Date</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <input name="content" type="text" placeholder="Content.." id="Content">
            <input  name="date" type="date">
            
            <input type="submit" name="submit" id="add" value="Add">
            <input type="submit" name="cancel" id="cancel" value="Cancel">
            <input type="submit" name="submit" formaction="edits/impdatesedit.php" formtarget="_blank" id="edit" value="Edit" >
       


    </div>
</div>

<?php require "inc/footer.php"; ?>
