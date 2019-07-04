<?php require "inc/header.php"; ?>
  <head>
        <link rel="stylesheet" href="css/venue.css">

    </head>
    <!-- wrapper -->
     <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- side-nav -->
                <?php require "inc/sidenav.php"; ?>

                <div class="col-md-9">
                    <!-- About -->
                    <div id="about" class="section">
                        <!-- container-fluid -->
                        <div class="container-fluid">
                            <!-- row -->
                            <div class="row">
                                 <div class="main">

            <h1 > Venue </h1>

            <div class="content">
            
                                  <?php 
                                $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                                $res = mysqli_fetch_assoc($i);
                                $n= $res['conf-id'];
                                $h = mysqli_query($connect,"SELECT * FROM `venue` WHERE `conf-id`='$n'  ORDER BY `id` DESC LIMIT 1 ");
                                while ( $p= mysqli_fetch_assoc($h)):
                                ?>

            
            
                <h4 style="font-size: 20px;"><?php echo $p['name'];?></h4>
                <p><strong>Address: </strong> 
                <?php echo $p['address'];?><br>     <strong>Phone: </strong><?php echo $p['phone'];?>
                </p>
                <img src="<?php echo 'admin/files/'.$p['img'];?>">
                <?php endwhile; ?>
                <br>
                <p class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.8192729013335!2d30.911364314440966!3d29.955876629707458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458560bf8f3dd17%3A0xb6187a3cff7ab9ed!2sThe+Higher+Institute+For+Engineering!5e0!3m2!1sen!2seg!4v1561067701461!5m2!1sen!2seg"
                    width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

                </p>

                <h1> Notes </h1>
                <ol>
                                 <?php 
                                $a = mysqli_query($connect,"SELECT `id` FROM `venue` ORDER BY `id` DESC LIMIT 1 ");
                                $r = mysqli_fetch_assoc($a);
                                $e= $r['id'];
                                $d = mysqli_query($connect,"SELECT * FROM `steps` WHERE `v_id`='$e' ");
                                while ( $t= mysqli_fetch_assoc($d)):
                                ?>
                    <li>  <?php echo $t['name'];?></li>
                                <?php endwhile;?>
                                <br>
                </ol>
                
                
                
            </div>
                                                
                                          
                                           
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->
                    <?php require "inc/footer.php"; ?>
