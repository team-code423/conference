<?php require "inc/database.php";

session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>agenda</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<div class="container">

    <h2 class="text-center" style="font-size:23px;font-weight:100;text-transform:capitalize;margin:20px 0;">add agenda</h2>
    <form action="addagenda.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="desc">Description:</label>
            <textarea class="form-control" id="desc" placeholder="Enter desc" name="desc"></textarea>
        </div>
        <div class="form-group ">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" placeholder="Enter time" name="time">
        </div>
        <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="sel1" name="day">
              <option value="">--Day--</option>
               <?php
                
                
                $sql = "select * from agenda_days";
                
                $query = mysqli_query($con,$sql);
                
                if($query){
                    
                    
                    while($row = mysqli_fetch_assoc($query)){
                        
                        
                        echo '<option value="'.$row['d_id'].'">"'.$row['day'].'"</option>';
                    }
                    
                }
                
                
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="submit" name="submit">
    </form>

</div>

<body>

</body>

</html>
