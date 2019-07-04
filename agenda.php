<?php require "./inc/database.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>agenda</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">
    
    <h2 class="text-center" style="font-size:23px;font-weight:100;text-transform:capitalize;margin:20px 0;">agenda</h2>
    <table class="table table-striped table-bordered">            
    
    <thead>
        <th>Day</th>
        <th>Time</th>
        <th>Title</th>
        <th>Description</th>
        
    </thead>
    
    <?php
        
    
        $sql = "select agenda_days.d_id , agenda_days.day , agenda_events.title ,  agenda_events.time , agenda_events.description from agenda_days inner join agenda_events where agenda_days.d_id = agenda_events.d_id  ";
        
        $q = mysqli_query($connect , $sql);
        
        if($q){
            while($row = mysqli_fetch_assoc($q)){
                extract($row);
                echo "<tr>";
                echo "<td>".$day."</td>";
                echo "<td>".$time."</td>";
                echo "<td>".$title."</td>";
                echo "<td>".$description."</td>";
                
                echo "</tr>";
                
            }
        }else{
            echo "faliled".mysqli_error($connect);
        }
        
    ?>
    
    </table>
    
</div>

</body>

</html>
