<?php require "inc/header.php"; ?>

<head>

    <meta charcet="UTF-8">
    <title> Abstract </title>
    <link rel="stylesheet" href="Abstract/css/all.min.css">


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Vesterbro", "Helvetica Neue", Helvetica, sans-serif
        }

        .header {
            width: 100%;
            margin-bottom: 0;
            background: #191A1B;
            color: #888;
            font-weight: bold;
            padding: 10px;
            < !-- background-image: url(Abstract/580-3.png)-->
        }

        .header a img {
            margin-left: 10px;
            padding: 10px
        }

        .continer {
            width: 92%;
            margin: 50px auto;
            < !-- background-image: url(Abstract/580-3.png)-->
        }

        h1 {
            color: white;
            text-align: center;
            font-size: 42px;
            font-family: serif
        }

        .abs {
            width: 100%;
            height: 300px;
            background: #FFF;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            < !-- background-image: url(Abstract/back.jpg);
            -->background-size: 100% 100%;
            border: 3px solid #FF5C4F;
            border-right: 3px solid #2782d5;
            border-bottom: 3px solid #2782d5;
            margin-bottom: 40px;
            box-shadow: 6px 6px 7px #2782d5, -5px -5px 7px #FF5C4F
        }

        .abstract {
            height: 120px;
            max-width: 919px;
            margin: 3px;
            border: none;
            scroll-behavior: auto;
        }

        h2 {
            text-align: center;
            padding-top: 12px;
            font-size: 32px;
            text-shadow: 8px 8px 25px #000
        }

        h3 {
            color: #800000;
            padding-top: 20px;
            padding-left: 150px;
            display: inline-block;
            font-size: 25px;
            text-shadow: 5px 5px 12px #800000
        }

        .button {
            position: relative;
            left: 270px;
            width: 150px;
            color: #FFF;
            padding: 10px;
            font-weight: bold;
            font-size: 22px;
            background: #2782d5;
            border: 0;
            border-radius: 10px;
            box-shadow: 5px 5px 7px #2782d5, -5px -5px 7px #FF5C4F
        }

        .button:hover {
            background: 0;
            color: #FF5C4F;
            border: 3px solid #FF5C4F;
            padding: 9px
        }

        .button:active {
            background: 0;
            color: blue;
            border: 3px solid blue;
            padding: 9px
        }

        a {
            text-decoration: none;
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

                <!-- row -->
                <div class="row">
                    <div class="header">
                        <a href="#"><img src="Abstract/Abstract Im.png"></a>
                    </div>


                    <div class="continer">

                        <?php
                              
                        $all_c = mysqli_query($connect,"SELECT * FROM   `conferance years`");
                        while ($c = mysqli_fetch_assoc($all_c)) {
                            echo '<h1> '.$c['conf-title'].' </h1>';
                             $conf_id = $c['conf-id'];
                             $all_paper = mysqli_query($connect,"SELECT * FROM   `paper` WHERE `conf-id`='$conf_id' ");
                            $files = [];
                            while ( $p= mysqli_fetch_assoc($all_paper)) {
                                $files.="papers/".$p['name'];
                                $a_id = $p['A-id'];  
                                $au = mysqli_query($connect,"SELECT * FROM   `auther` WHERE `A-id`='$a_id' ");
                                $a_name= mysqli_fetch_assoc($au);
                            echo '<div class="abs">'; 
                            echo '<h2>'.$p['paper-title'].'</h2>';
                            echo '<div class="abstract" >'.$p['paper-abstract'].'</div>';
                            echo '<h3>'.'Auther : '.$a_name['A-fname'].' '.$a_name['A-lname'].'</h3>';
                            echo '<button class="button"> <a download="download" href="papers/'.$p['name'].'">Download</a> </button>';
                            echo '</div>';
                                
                            }
                            
                        }
                      
                            
                    $zip = new ZipArchive();

                    $filename = "all_papers.zip";
                    $zip->open($filename , ZipArchive::CREATE);

                    foreach($files as $file){

                        $zip->addFile($file);
                    }

                    if($zip->close()){

                    echo '<a href="'.$filename.'">'.$filename.'</a>';
}
                        
 ?>

                    </div>


                    </body>

                </div>

                <?php require "inc/footer.php"; ?>
