<?php 
  require "inc/header.php"; 
  require "inc/topnav.php"; 
  require "inc/sidenav.php";
  session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['add'])) {

        $auther_er = $_POST['auther_er'];       $auther = $_POST['auther'];
        
        $pres_er = $_POST['pres_er'];           $pres = $_POST['pres'];

        $lis_er = $_POST['lis_er'];             $lis = $_POST['lis'];

        $add_paper_er = $_POST['add_paper_er']; $add_paper = $_POST['add_paper'];

        $add_page_er = $_POST['add_page_er'];   $add_page = $_POST['add_page'];

        $one_day_er = $_POST['one_day_er'];       $one_day = $_POST['one_day'];
        if (empty($auther_er) || empty($auther)|| empty($pres_er)|| empty($pres)|| empty($lis_er)|| empty($lis)|| empty($add_paper_er)|| empty($add_paper)|| empty($add_page_er)|| empty($add_page)|| empty($one_day_er)|| empty($one_day)) {
          echo "<script> alert('Plz Fill all Fields')</script>";
       }
       else {
       
        
            $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
            $res = mysqli_fetch_assoc($i);
            $n= $res['conf-id'];
            $sql = "INSERT INTO `fees`(`auther_er`,`auther`,`pres_er`,`pres`,`lis_er`,`lis`,`add_paper_er`,`add_paper`,`add_page_er`,`add_page`,`one_day_er`,`one_day`,`conf-id`) VALUES  ('$auther_er','$auther','$pres_er','$pres','$lis_er','$lis','$add_paper_er','$add_paper','$add_page_er','$add_page','$one_day_er','$one_day','$n')";
            $query = mysqli_query($connect,$sql);

            if ($query) {  echo "<script> alert('Done')</script>";    }
            else {
                echo mysqli_error($connect);
            }
            
              
        
        }
        

    }
  }

if (isset($_POST['cancel'])){  header("location:fees.php");       }

  ?>


  

<div class="main">
<div class="content">
   
   <h1>fees</h1>
   
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <label for="imgs">Author</label>
            <input name= "auther_er" type="text" placeholder="Early Bird-Registration Fee" id="e-Author">
            <input name= "auther"    type="text" placeholder="Registration Fee" id="r-Author">

          <label for="imgs">Presentation only </label>
            <input name="pres_er" type="text" placeholder="Early Bird-Registration Fee" id="e-Presentation">
            <input name="pres" type="text" placeholder="Registration Fee" id="r-Presentation">


          <label for="imgs">Listener or Accompanied Person</label>
            <input name= "lis_er" type="text" placeholder="Early Bird-Registration Fee" id="e-Listener ">
            <input name= "lis" type="text" placeholder="Registration Fee" id="r-Listener ">

          <label for="imgs">Additional Paper</label>
            <input name= "add_paper_er" type="text" placeholder="Early Bird-Registration Fee" id="e-Additional-Paper">
            <input name= "add_paper" type="text" placeholder="Registration Fee" id="r-Additional-Paper">

          <label for="imgs">Additional Page</label>
            <input name= "add_page_er"type="text" placeholder="Early Bird-Registration Fee" id="e-Additional-Page">
            <input name= "add_page" type="text" placeholder="Registration Fee" id="r-Additional-Page">

          <label for="imgs">One Day Tour</label>
            <input name= "one_day_er"type="text" placeholder="Early Bird-Registration Fee" id="e-One-Day">
            <input name= "one_day"type="text" placeholder="Registration Fee" id="r-One-Day">



            
           <input name ="add" type="submit"   value="Add">
           <input name = "cancel" type="submit"   value="cancel">
           <input type="submit" name="submit" formaction="edits/feesedit.php" formtarget="_blank" id="edit" value="Edit" >
       </form>
   
    
   
    
</div>
</div>

<?php require "inc/footer.php"; ?>