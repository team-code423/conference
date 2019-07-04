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
    <title>committee profile</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    
    <style>
    </style>
</head>

<body>
<div class="container">
<h1 class="text-center"><a href="reports.php" class="btn btn-primary">reports</a></h1>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>id</th>
                <th>abstract</th>
                <th>reviewed</th>
                <th>accept</th>
                <th>reviewer</th>
                <th>action</th>
            </tr>
        </thead>
        <?php

$row = select_all("paper");





while($out = mysqli_fetch_assoc($row)){
    extract($out);
?>

<tr>
<td id="paper"><?= $out['paper-id']; ?></td>
<td><?= $out['paper-abstract']; ?></td>
<td></td>
<td></td>

<td>
<select name="reviewer">
<option value="" selected>--</option>
<?php

$sql = "SELECT * FROM reviewer";

$query = mysqli_query($connect,$sql);

if(!$query){echo "failed to load reviewers !";}
$rows = [];

while($ro = mysqli_fetch_assoc($query)){

    $rows[].= "<option value=".$ro['R-id']." data-paperid=".$out['paper-id'].">".$ro['name']."</option>";
}

foreach ($rows as $r){echo $r;}


?>
</select>

</td>
<td><a class="btn btn-success review" href="javascript:void(0)">review</a></td>
</tr>



<?php } 



?>
    </table>
    </div>

    <script>
    
    $(document).ready(function(){

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
    });
    
    </script>
</body>

</html>