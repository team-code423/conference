<?php require "inc/header.php"; ?>
  <head>
        <link rel="stylesheet" href="css/fees.css">
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
        
        
                                            <h1> fees</h1>
                                            <?php
                                                 
                                                 $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                                                 $res = mysqli_fetch_assoc($i);
                                                 $n= $res['conf-id'];
                                                 $h = mysqli_query($connect,"SELECT * FROM `fees` WHERE `conf-id`='$n' ORDER BY `id` DESC LIMIT 1");
                                                 while ( $p= mysqli_fetch_assoc($h)):
                                                 
                                            ?>
                                            <table>
                                                <thead>
                                                    <tr> 
                                                        <th></th>
                                                        <th>Early Bird-Registration Fee </th>
                                                        <th>Registration Fee</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Author</th>
                                                        <th><?php echo $p['auther_er'];?> $</th>
                                                        <th><?php echo $p['auther'];?> $</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Presentation only</th>
                                                        <th><?php echo $p['pres_er'];?> $</th>
                                                        <th><?php echo $p['pres'];?> $</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Listener or Accompanied Person</th>
                                                        <th><?php echo $p['lis_er'];?> $</th>
                                                        <th><?php echo $p['lis'];?> $</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Additional Paper</th>
                                                        <th><?php echo $p['add_paper_er'];?> $</th>
                                                        <th><?php echo $p['add_paper'];?> $</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Additional Page</th>
                                                        <th><?php echo $p['add_page_er'];?> $</th>
                                                        <th><?php echo $p['add_page'];?> $</th>
                                                    </tr>    
                                                    <th>One Day Tour (optional) </th>
                                                    <th><?php echo $p['one_day_er'];?> $</th>
                                                    <th><?php echo $p['one_day'];?> $</th>
                                                </tbody>
                                            </table>
                                                 <?php endwhile;?>
                                    </div>
                                                
                                          
                                           
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->
                    <?php require "inc/footer.php"; ?>
