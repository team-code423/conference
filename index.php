<?php require "inc/header.php";  ?>
    <head>
    	<style >
    		.mainfooter{
    			height: 250px;
    			background-color: #fafafa;

    		}
    		.one{
    			margin: 60px 100px;
    			font-family: sans-serif;
    			font-size: 30px;
    		}
    		.two{
    			margin-bottom: 30px;
    		}
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
                                <!-- section title -->
                                <div class="section-title">
                                    <h3 class="title"><span>Info</span> <span style="color: #dd0a37;">conference</span></h3>
                                </div>
                                <!-- /section title -->

                                <div class="col-md-12  text-center">
                                    <!-- about content -->
                                    <div class="about-content">
                                    <?php
                                      $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                                      $res = mysqli_fetch_assoc($i);
                                      $n= $res['conf-id'];
                                        $sql = "SELECT `conf-abstract` FROM `conferance years`  WHERE `conf-id`='$n' "; 
                                        $query = mysqli_query($connect,$sql);
                                if($query): 
                                $result = mysqli_fetch_assoc($query); ?>
                         
                                        <p><?= $result['conf-abstract']; ?></p>
                                        <?php ENDIF; ?>
                                    </div>
                                    <!-- /about content -->

                                    <!-- Numbers -->
                                    <div id="numbers">
                                        <!-- row -->
                                        <div class="row">


                                            
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /Numbers -->
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->

                    <!-- Galery -->
                    <div id="galery">
                        <!-- container-fluid -->
                        <div class="container-fluid">
                            <!-- row -->
                            <div class="row">
                                <!-- galery owl -->
                                <div id="galery-owl" class="owl-carousel owl-theme">
                                    <!-- galery item -->
                                    <div class="galery-item">
                                        <img src="./img/galery01.jpg" alt="">
                                    </div>
                                    <!-- /galery item -->

                                    <!-- galery item -->
                                    <div class="galery-item">
                                        <img src="./img/galery02.jpg" alt="">
                                    </div>
                                    <!-- /galery item -->

                                    <!-- galery item -->
                                    <div class="galery-item">
                                        <img src="./img/galery03.jpg" alt="">
                                    </div>
                                    <!-- /galery item -->

                                </div>
                                <!-- /galery owl -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /Galery -->


                    <!-- Event Schedule -->
                    <div id="schedule" class="section">
                        <!-- container-fluid -->
                        <div class="container-fluid">
                            <!-- row -->
                            <div class="row">
                                <!-- section title -->
                               
                                <!-- /section title -->

                                <div class="col-md-10 ">
                                        <div class="section-title">
                                                <h3 class="title"><span>IMPORTANT</span> <span style="color: #dd0a37;">DATES</span></h3>
                                            </div>
                                    <ol class="ol-imd">

                                    <?php
                                         $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                                         $res = mysqli_fetch_assoc($i);
                                         $n= $res['conf-id'];
                                        $result = mysqli_query($connect,"SELECT * FROM `impdates` WHERE `conf-id`='$n' ");
                                        while ($row = mysqli_fetch_assoc($result)): ?>

                                        
                                            <li><?php echo $row['content']." :- ". $row['date'];?></li>
                                        <?php endwhile; ?>
                                                                                                
                                    </ol>

                                    <div class="download-btn">
                                        <a href="login.php"  class="main-btn" >call of papers</a>
                                    </div>

                                     <div class="download-btn">
                                        <a href="test.pdf"  class="main-btn" download>domnload templet</a>
                                    </div>

                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /Event Schedule -->


                    <!-- Sponsors -->
                    <div id="sponsors" class="section">
                        <!-- container-fluid -->
                        <div class="container-fluid">
                            <!-- row -->
                            <div class="row">
                                <!-- section title -->
                                <div class="section-title">
                                    <h3 class="title"><span>Our</span> <span style="color: #dd0a37;">Sponsors</span></h3>
                                </div>
                                <!-- /section title -->
                                <?php
                                  $s=mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1");

                                    $q=mysqli_fetch_assoc($s);

                                    $conf=$q['conf-id'];
                                        $result = mysqli_query($connect,"SELECT * FROM `sponser`WHERE `conf-id`='$conf'");
                                        $storeArray = Array();
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $storeArray[] =  $row['sp-logo'];  
                                        }
                                ?>
                               <?php foreach($storeArray as $key => $value): ?>
                    
                                             <!-- sponsor -->
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <a href="#" class="sponsor">
                                        <img src=<?php echo "admin/uploads/files/".$value; ?> alt="logo">
                                    </a>
                                </div>
                                <!-- /sponsor -->
                                          
                                 <?php ENDFOREACH; ?> 


                               

                       
                                <!-- /sponsor -->

                                
                                <!-- /sponsor -->

                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /Sponsors -->

                  
  <?php require "inc/footer.php"; ?>



  <div class="mainfooter">
  	<h1> Countact Us</h1>
  	<div class="one">
      <?php 
           $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
           $res = mysqli_fetch_assoc($i);
           $n= $res['conf-id'];
           $h = mysqli_query($connect,"SELECT * FROM `contactus` WHERE `conf-id`='$n' ORDER BY `id` DESC LIMIT 1");
           
            $p= mysqli_fetch_assoc($h);
           ?>

	  	<div class="two"> Email :- <?php echo $p['email'];?></div>

	  	<div> Phone :- <?php echo $p['phone'];?></div>
  	</div>
  	


  </div>