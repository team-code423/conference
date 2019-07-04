<?php require "inc/header.php"; ?>
<?php require "inc/topnav.php"; ?>

<?php require "inc/sidenav.php"; 
session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $about = $_POST['about'];
    if (empty($title) || empty($about)) {
        echo "<script> alert('Plz Fill all Fields')</script>";
     }
     else {
     
    $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
    $res = mysqli_fetch_assoc($i);
    $n= $res['conf-id'];
    $sql = "INSERT INTO `topic`(`topic-title`,`about`,`conf-id`) VALUES ('$title','$about','$n')";
    
    $query = mysqli_query($connect,$sql);
     }
     if ($query) {  echo "<script> alert('Done')</script>";    }
     else {
         echo mysqli_error($connect);
     }
    
    

}}
?>

<div class="main">
<div class="content">
   
   <h1>add new topic</h1>
   
   <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST">
           <input type="text"  placeholder="Add Topic .." name="title">
           <textarea name="about"id="about" cols="10" rows="3" placeholder="About Topic.."></textarea>
           <input type="submit" name="submit" value="Add">
           <input type="submit" name="cancel"  value="cancel">
           <input type="submit" name="submit" formaction="edits/topicsedit.php" formtarget="_blank" id="edit" value="Edit" >
            

       </form>
  
  
</div>
</div>

<?php require "inc/footer.php"; ?>