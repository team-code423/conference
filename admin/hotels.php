<?php 
 require "inc/header.php";
 require "inc/topnav.php"; 
 require "inc/sidenav.php";
 session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
 if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['addhotel'])) {

        $name = $_POST['name'];
        
        $address = $_POST['address'];
        
        $phone = $_POST['phone'];
    
        $site = $_POST['site'];
        
        $filetmp = $_FILES['file']['tmp_name'];

        $img = rand(0,100).$_FILES['file']['name'];
        if (empty($name) || empty($address)|| empty($phone)|| empty($site)) {
            echo "<script> alert('Plz Fill all Fields')</script>";
         }
         else {
         
        
        if(move_uploaded_file($filetmp,"files/".$img))
        {
            $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");

            $res = mysqli_fetch_assoc($i);

            $n= $res['conf-id'];

            $sql = "INSERT INTO `hotel`(`img`,`name`,`address`,`phone`,`site`,`conf-id`) VALUES ('$img','$name','$address','$phone','$site','$n')";
            
            $query = mysqli_query($connect,$sql);

            
        }
    
        else
        {
            $errors[] = "file not uploaded";
        }
    }
        if ($query) {  echo "<script> alert('Done')</script>";    }
        else {
            echo mysqli_error($connect);
        }

    }
}
if (isset($_POST['cancel'])){  header("location:hotels.php");       }

  ?>


<div class="main">
<div class="content">
   
   <h1>add new hotel</h1>
   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
           <input name="name" type="text" placeholder="Name.." id="name">
           <input name="address" type="text" placeholder="Location.." id="address">
           <input name="phone" type="tel" placeholder="Phone Number"  id="phone">
           <!--<input name="phone" type="tel" placeholder="Phone Number"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"id="phone">-->
           <input name="site"type="text" placeholder="web site" id="site">
           <label for="imgs">Add Your Img</label>
           <input name="file"type="file"  id="img" style="cursor:pointer" multiple="multiple">
           <input name="addhotel"type="submit"   value="Add">
           <input name="cancel"type="submit"  id="Cancel" value="cancel">
           <input type="submit" name="submit" formaction="edits/hoteledit.php" formtarget="_blank" id="edit" value="Edit" >
       </form>
   
    
   
    
</div>
</div>

<?php require "inc/footer.php"; ?>