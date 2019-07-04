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

        $name = $_POST['name'];

        $about = $_POST['about'];
        
        $filetmp = $_FILES['file']['tmp_name'];
        $filename = rand(0,100).$_FILES['file']['name'];
        $errors = [];
        if (empty($name) || empty($address)|| empty($phone)|| empty($site)) {
            echo "<script> alert('Plz Fill all Fields')</script>";
         }
         else {
         
        if(move_uploaded_file($filetmp,"files/".$filename))
        {                           
            $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
            $res = mysqli_fetch_assoc($i);
            $n= $res['conf-id'];
            $sql = "INSERT INTO `speakers`(`name`,`about`,`img`,`conf-id`) VALUES ('$name','$about','$filename','$n') ";
            $query = mysqli_query($connect,$sql);
            
        }else{
            $errors[] = "file not uploaded";
        }
    }
    if ($query) {  echo "<script> alert('Done')</script>";    }
        else {
            echo mysqli_error($connect);
            print_r($errors);
        }     
       

        }

    }

if (isset($_POST['cancel'])){  header("location:speakers.php");       }

  ?>

<div class="main">
<div class="content">
   
   <h1>add new Speaker</h1>
   
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
           <input name ="name"type="text" placeholder="Name.." id="name">
           <textarea name ="about"id ="about" cols="10" rows="5" placeholder="About Speaker.."></textarea>
           <label for="img">Add Your Img</label>
           <input name ="file" type="file"  />
           <input name ="submit" type="submit" value="Add">
           <input name ="cancel" type="submit" value="cancel">
           <input type="submit" name="submit" formaction="edits/spekeredit.php" formtarget="_blank" id="edit" value="Edit" >
       </form>
   
    
   
    
</div>
</div>

<?php require "inc/footer.php"; ?>