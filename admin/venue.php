

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

        $name = $_POST['name'];

        $phone = $_POST['phone'];
        
        $address = $_POST['address'];
        
        $filetmp = $_FILES['file']['tmp_name'];

        $img = rand(0,100).$_FILES['file']['name'];
        if (empty($name) || empty($address)|| empty($phone)) {
          echo "<script> alert('Plz Fill all Fields')</script>";
       }
       else {
        
        if(move_uploaded_file($filetmp,"files/".$img))
        {
            $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");

            $res = mysqli_fetch_assoc($i);

            $n= $res['conf-id'];

            $sql = "INSERT INTO `venue`(`img`,`name`,`address`,`phone`,`conf-id`) VALUES ('$img','$name','$address','$phone','$n')";
            
            $query = mysqli_query($connect,$sql);
            
            $v_id=mysqli_insert_id($connect);

            
        }
        else{
            $errors[] = "file not uploaded";
        }
      }
        foreach ($_POST['names'] as $key => $value) {
                      $sql = "INSERT INTO `steps`(`name`,`v_id`) VALUES ('$value','$v_id')";
                      $query = mysqli_query($connect,$sql);
              }
          
              if ($query) {  echo "<script> alert('Done')</script>";    }
              else {
                  echo mysqli_error($connect);
              }

    }
  }

if (isset($_POST['cancel'])){  header("location:venue.php");       }

  ?>
<head>
<script>
  	$(function() {
   $("#addMore").click(function(e) {
    e.preventDefault();
    $("#fieldList").append("<li> <textarea name='names[]' id='names[]' cols='70' rows='3' ></textarea></li>");


     });
   });
</script>
</head>
<div class="main">
<div class="content">
   
   <h1>add Your Venue</h1>
   
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
           <input name="name"type="text" placeholder="Name.." id="name">
           <input name ="address"type="text" placeholder="Location.." id="location">
           <!--<input type="tel" placeholder="Phne Number" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">-->
           <input name="phone" type="tel" placeholder="Phone Number"  >
           <label for="imgs">Add Your Img</label>
           <input name="file" type="file"  id="imgs" style="cursor:pointer" multiple="multiple">
           
           
       
  <ol id="fieldList">
    
    <li> <textarea name='names[]' id='names[]' cols='70' rows='3' ></textarea></li>
      
  </ol>
  <button id="addMore">Add more step </button>
  <input name ="add" type="submit"   value="Add">
  <input name ="cancel"type="submit"   value="cancel">

  <input type="submit" name="submit" formaction="edits/venueedit.php" formtarget="_blank" id="edit" value="Edit" >
</form>
      <!-- <form>
         <input type="text" placeholder="Steps" id="steps">
         <input name="step" type="submit"  value="Add & New">

       </form>
   -->
    
   
    
</div>
</div>

<?php require "inc/footer.php"; ?>