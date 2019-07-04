<?php require "inc/header.php"; ?>
  <head>
        <link rel="stylesheet" href="css/topics.css">

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
        
        
                                            <div class="main">

                <h1> Our Topics </h1>
        
                <ol>
                <div class="content">
                        
                        <?php
                          $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                          $res = mysqli_fetch_assoc($i);
                          $n= $res['conf-id'];
                        $query=mysqli_query($connect,"SELECT * FROM `topic`WHERE `conf-id`='$n' "); 
                        while($result = mysqli_fetch_assoc($query)){
                            if(!$result['topic-title']=="")
                            echo '<li>'.$result['topic-title'].'</li>';
                            echo '<p>'.$result['about'].'</p>';
                        }
                        ?>
                            
                       
                        
                </div>
                </ol>
            </div>
                                                
                                          
                                           
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->
                    <?php require "inc/footer.php"; ?>
