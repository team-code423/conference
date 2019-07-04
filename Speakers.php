<?php require "inc/header.php"; ?>
<head>
        <title> Speaker Page </title>
        
        <style>
            body {margin:0; padding:0; font-family: Arial, Tahoma; background-image: url(body-background.png)}
            .container {width: 100%; height: 100%px; margin: auto; background: #FFF}
            .navbar h1 {text-align: center}
            .container-child {width: 950px; height: 4000px; margin: 50px auto; background-image: url(580-3.png)}
            .p-image {text-align: center}
            .p-name {text-align: center; font-size: 22px; font-weight: bold; color: #333333}
            .p-position {text-align: center; font-size: 16px; font-weight: bold; color: #FF4500}
            .p1 {text-align: justify; font-size: 16px; line-height: 22px; color: #191970}
            

            
        </style>
        
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
                              
                                
                               <body>
        
           <div class="container">
            
             <div class="slider">
                
             </div>
            
             <div class="navbar">
                
                <h1 style="font-size: 35px"> Keynote Speakers </h1>
                
             </div>
             
            <!-- 
                        $all_c = mysqli_query($connect,"SELECT * FROM   `conferance years`");
                        while ($c = mysqli_fetch_assoc($all_c)) {
                            echo '<h1> '.$c['conf-title'].' </h1>';

                            $conf_id = $c['conf-id'];
                           
                             $all_paper = mysqli_query($connect,"SELECT * FROM   `paper` WHERE `conf-id`='$conf_id' ");
                                  
                            while ( $p= mysqli_fetch_assoc($all_paper)) {
                                $a_id = $p['A-id'];  
                                $au = mysqli_query($connect,"SELECT * FROM   `auther` WHERE `A-id`='$a_id' ");
                                $a_name= mysqli_fetch_assoc($au);

                            echo '<div class="abs">'; 
                            echo '<h2>'.$p['paper-title'].'</h2>';
                            echo '<h4>'.$p['paper-abstract'].'</h4>';
                            echo '<h3>'.'Auther : '.$a_name['A-fname'].' '.$a_name['A-lname'].'</h3>';
                            echo '<button> <a download="download" href="papers/'.$p['name'].'">Download</a> </button>';
                            echo '</div>'; 
                            }
                            -->
             <div class="container-child">
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <?php
                $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                $res = mysqli_fetch_assoc($i);
                $n= $res['conf-id'];
                $all_sp=mysqli_query($connect,"SELECT * FROM `speakers`WHERE `conf-id`='$n' ");
                while($s=mysqli_fetch_assoc($all_sp)):?>
                
                <p class="p-image"> <img src="admin/files/<?php echo $s['img'];?>" width="150px" height="150px"> </p>
                <p class="p-name"><?php echo $s['name'];?></p>
                <p class="p1"> <?php echo $s['about'];?> </p> <br>
                <?php 
                    /*endwhile;*/
                    endwhile;
                ?>
            
                
                <hr> <br>
                </form>

             </div>
             
             
             
           </div>
        
    </body>
                            
                                           
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->
                    <?php require "inc/footer.php"; ?>
