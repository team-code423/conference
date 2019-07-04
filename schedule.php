<?php require "inc/header.php";  ?>

<head>
    <style>
       .day{
            background: #21edc0;
            color: #fff;
            font-size: 22px;
        }
        thead{
            height: 100px;
        }
    </style>


</head>
<!-- wrapper -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- side-nav -->
            <?php require "inc/sidenav.php";  ?>
            <!-- Speakers -->
            <div  class="col-md-9">

                <!-- section title -->
                <div class="section-title">
                    <h3 class="title"><span>Schedule</span></h3>
                </div>
<?php
               
        $sql = "SELECT * FROM day";
        
        $q = mysqli_query($connect , $sql);
        
        if($q){
            echo '<table class="table  table-bordered table-condensed">';
            while($row = mysqli_fetch_assoc($q)){
                
                extract($row);
                
                echo '<thead><tr class="day" ><td colspan="2">' .$day_name. '</td></tr></thead>';
                
                $sql2 = "SELECT * FROM times WHERE day_id = '$day_id'";
                
                $q2 = mysqli_query($connect , $sql2);
                
                if($q2){
                    
                    while($row2 = mysqli_fetch_assoc($q2)){
                        
                        extract($row2);
                        
                         echo '<tr><td>' .$_from . ' - ' . $_to .'</td>' ;
                         echo '<td>' .$details .'</td></tr>'; 
                        
                    }
                }else{
                    echo "failed".mysqli_error($connect);
                }
                
            }
            echo '</table>';
            
            
            
        }
                
        
                ?>
        
                </div>
               


            </div>


        </div>
    </div>
    <!-- /container-fluid -->


<?php require "inc/footer.php"; ?>
