<?php
session_start();

if (!isset($_SESSION['reviewer_id'])) {
    header("location: login.php");
    exit;
}

require "database.php";
require "../inc/functions.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reviewer profile</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <style>
    nav{
        background : #000;
        margin-bottom :20px;
    }
    h4{
        margin:18px;
        font-weight:300;
        letter-spacing:1px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DashBoard</a>
    </div>
    <ul class="nav navbar-nav">
      <a href="logout.php" class="btn btn-danger">Log Out</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <h4 class="text-center">Papers Awaiting Review</h4>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Abstract</th>
                <th>Review</th>
            </tr>
        </thead>
<?php

$rev = $_SESSION['reviewer_id'];

$sql = "select * from paper where `R-id` = '$rev';";
$q = mysqli_query($connect, $sql);
if ($q) {
    while ($row = mysqli_fetch_assoc($q)) {
        extract($row);
        


        echo "<tr>";
        echo '<td>' . $row['paper-id']. '</td>';
        echo '<td>' . $row['paper-abstract'] . '</td>';

        echo '<td>';
        echo '<a class="btn btn-success" href="review.php?id='.$row['paper-id'].'">review</a>';

        echo '</td>';
        echo "</tr>";

    }
}else{
    echo "error".mysqli_error($connect);
}

?>




    </table>
    </div>

    <script>

    $(document).ready(function(){
/*
        $("table select").change(function(){
            var rev_id = $(this).val();
            var _id = $(this).parent().siblings("#paper").text();
            var rev_url = $(this).parent().siblings( "td").find(".review").attr("href","do.php?paperid="+_id+"&revid="+rev_id+"&action=review");
            var acc_url = $(this).parent().siblings( "td").find(".accept").attr("href","do.php?paperid="+_id+"&revid="+rev_id+"&action=accept");
            alert("rev id : " + rev_id + " paper id is : " + _id);

        });


        $(".review").click(function(e){
            e.preventDefault();
            var _url = $(this).attr("href");
            $.ajax({
                url : _url,
                method : "GET",
                dataType : "text",

                success : function(data){
                    alert(data);
                }



            });


        });

        $(".accept").click(function(e){
            e.preventDefault();
            var _url = $(this).attr("href");
            $.ajax({
                url : _url,
                method : "GET",
                dataType : "text",
                success : function(data){
                    alert(data);
                }



            });


        });



        $(".reviewed").each(function(){

                var val = $(this).text();

                if(val == 0){
                    $(this).text("not reviewed");
                }else if(val == 1){
                    $(this).text("reviewed");
                }

        });
        */
    });

    </script>
</body>

</html>