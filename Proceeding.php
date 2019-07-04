<?php require "inc/header.php"; ?>
    <head>
        
        
        <meta charcet="UTF-8">
        <title> Proceeding </title>
        <link rel="stylesheet" href="css/all.min.css">

        
        <style>
            
            body {margin: 0; padding: 0; font-family: "Vesterbro","Helvetica Neue",Helvetica,sans-serif}
            header {width: 100%; background: #33363B; padding: 18px; margin-bottom: 70px; text-align: center; background-image: url(body-background.png)}
            header i {color: #D7DADE; font-size: 65px}
            header span {color: #F7F79E; font-size: 4em; font-family:serif; font-weight: 100px}
            header p {color: #F7F8E6; font-size: 2em; font-family:sans-serif; font-weight: lighter}
            .container {width: 100%; margin: 50px auto}
            .h1 {color: #de7101; text-align: center; font-size: 32px; font-family: monospace; text-shadow: 0px 4px 25px #de7101}
            h3 {color: #de7101; font-weight: lighter; font-style: italic; font-size: 1.6rem; margin: 2rem 0 1rem; text-shadow: 0px 4px 25px #de7101}
            ul {list-style-image: url(Diamon.png)}
            details {display: block; padding: 0px 10px 5px 10px; margin-bottom: 12px}
            .s1 {color: #de7101; font-family:serif ; font-weight: bolder; font-size: 19.9px; text-decoration: underline; cursor: pointer}
            .s1:hover {color: #2e3133}
            ul li .tp {margin-top: 30px; margin-bottom: 30px}
            #t1 {background: #F6F6F6; line-height: 25px}
            #t2 {background: #E7E7E7; line-height: 25px}
            
            .proceedings {font-size: 14px; margin-bottom: 1.5em; width: 100%; text-align: center; border-spacing: 0; margin-top: 20px; border: 1px solid #666666; border-collapse: collapse; display: table-cell; box-shadow: 0px 0px 10px #de7101}
            .proceedings th {width: 700px; text-align: left !important; color: #444}
            .proceedings th a {text-decoration: none; color: #8C9DA9; font-size: 13px}
            .proceedings th .Au a {color: #de7101; text-decoration: underline}
            .proceedings th .Au a:hover {color: #444}
            .proceedings td a {; color: #de7101}
            .proceedings td a:hover {; color: #444}
            .proceedings th .Au {font-weight: lighter; font-size: 13px}
            .proceedings th, .proceedings td {border-top: 1px solid #666666 !important; border-bottom: 1px solid #666666 !important; padding: 5px !important}
            
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
        
        <header>
            
            <i class="fab fa-product-hunt"></i>
            <span> Proceeding </span>
            <p> Conference Management System </p>
        </header> 
        
        <div class="container">
        
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2014</span>

                    </summary>
                    
                    <h1 class="h1"> Main Proceedings </h1>
                    
                    <!-- ===========   Research Tracks   =========== -->
                    
                    <h3> Research tracks </h3>
                    <ul class="diamond-list">
                        <li>
                            

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                        <?php
                                         $all_c = mysqli_query($connect,"SELECT * FROM `conferance years`");
                                         $c = mysqli_fetch_assoc($all_c) ;
                                        $conf_id = $c['conf-id'];
                                        $all_paper = mysqli_query($connect,"SELECT * FROM   `paper` WHERE `conf-id`='$conf_id' AND `accepted` = 'accepted' ");
                                            while ( $p= mysqli_fetch_assoc($all_paper)) {
                                                $a_id = $p['A-id'];
                                                $co_id = $p['paper-id'];  
                                                $au = mysqli_query($connect,"SELECT * FROM   `auther` WHERE `A-id`='$a_id' ");
                                                $a_name= mysqli_fetch_assoc($au);
                                                $co = mysqli_query($connect,"SELECT * FROM   `co-auther` WHERE `paper-id`='$co_id' ");
                                    
                                            echo '<th>' .$p['paper-title'].'&nbsp;';
                                            
                                            echo '<br/><span class="Au">Authors: &nbsp;<b>'.$a_name['A-fname'].' '.$a_name['A-lname'].' '.'</b>';
                                            while($co_name= mysqli_fetch_assoc($co)){
                                            echo $co_name['fname'].' '.$co_name['lname'].',';
                                            }
                                            echo '</span></th><td><a download="download" href="papers/'.$p['name'].'">View paper</a></td></tr>';
                                            
                                            }
                                            ?>
                                               
                                            
                                        
                                    
                                    </table>
                                </div>
                            
                            </li>

                            
            <!-- ========================================================================================================================================================================================================================================================================================================================== -->
            
           
            
          
        
        </div>
            
            
    </body>
                            
                                           
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->
                    <?php require "inc/footer.php"; ?>
