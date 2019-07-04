<?php

 require "../inc/database.php";
 require "../inc/functions.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reports</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    
    <style>
    </style>
</head>

<body>
<div class="container">
<h1 class="text-center">Reports</h1>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
            <th>title</th>
                <th>content</th>
                
                <th>action</th>
            </tr>
        </thead>


<?php

$sql = "select * from `paper report`";


$q = mysqli_query($connect,$sql);

if($q){

    while($row = mysqli_fetch_assoc($q)){

        extract($row);

        echo   '<tr>';
        echo '<td>'.$report_title.'</td>';
        echo '<td><a href="../papers/'.$report_content.'">'.$report_content.'</a></td>';
        echo '<td><a href="accept.php?paperid='.$paper_id.'&auth_id='.$auth_id.'">Accept</a> OR <a href="refuse.php?paperid='.$paper_id.'&auth_id='.$auth_id.'">Refuse</a></td>';
        
        echo '</tr>';

    }


}


?>


    </table>
    </div>

    
</body>

</html>