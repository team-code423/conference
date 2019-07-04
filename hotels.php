<?php require "inc/header.php";
  ?>

<head>
    <style>
        .hotel{
        background-color: rgb(247, 252, 250);
        color: black;
        padding: 16px;
        font-size: 16px;
        border: none;
        height: -webkit-fill-available;
        }
        img{
            margin-bottom: 30px;
            height: 300px;
            width: 450px;
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
                    <div id="speakers" class="col-md-9">
                       
                                <!-- section title -->
                                <div class="section-title">
                                    <h3 class="title"><span>Suggested</span> <span style="color: #dd0a37;">Hotels</span></h3>
                                </div>
                               
                                <?php 
                                $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                                $res = mysqli_fetch_assoc($i);
                                $n= $res['conf-id'];
                                $h = mysqli_query($connect,"SELECT * FROM   `hotel` WHERE `conf-id`='$n' ");
                                while ( $p= mysqli_fetch_assoc($h)):
                                ?>
                                <div class="hotel">
                         
                            
                               
                                    <img src="<?php echo 'admin/files/'.$p['img'];?>">    
                                    <div> Hotel Name : <?php echo $p['name'];?></div>
                                    <div> Hotel Address : <?php echo $p['address'];?></div>
                                    <div> Hotel Phon Number : <?php echo $p['phone'];?></div>
                                    <div> Hotel Web Site :<a href="<?php echo $p['site'];?>" target="_blank" >  <?php echo $p['site'];?>   </a> </div>


                                    

                                
                                    
                                </div>
                                <?php endwhile; ?>
                                <!-- section title
                                <table class="table">
    
                                                <tr>
                                                    <th>name</th>
                                                    <th>location</th>
                                                    
                                                </tr>

                                            <?php


                                            $sql = "SELECT * FROM `hotel`";

                                            $query = mysqli_query($connect,$sql);
                                            ?>

                                            <?php while($row = mysqli_fetch_assoc($query)): ?>

                                            <tr>
                                            <td><?= $row['hotel-name']; ?></td>
                                            <td><?= $row['location']; ?></td>

                                            </tr>


                                            <?php endwhile; ?>
                                            </table>    -->


</div>
   
                               
</div>
</div>
                        <!-- /container-fluid -->
                    </div>
                   

                    

                    <?php require "inc/footer.php"; ?>

