<?php require "inc/database.php";
error_reporting(0); 
session_start();
$id = $_SESSION['id'];
?>

<html>
    <head>
        <meta charcet="UTF-8">
        <title> Abstract </title>
        <link rel="stylesheet" href="Abstract/css/all.min.css">

        
        <style>
            body {margin: 0; padding: 0; font-family: "Vesterbro","Helvetica Neue",Helvetica,sans-serif; background: #252F31;<!--
                background-image: url(Abstract/body-background.png)-->}
            .header {width:100%; margin-bottom:0; background: #191A1B; color: #888; font-weight: bold; padding: 10px;<!-- background-image: url(Abstract/580-3.png)-->}
            .header a img {margin-left: 10px; padding: 10px}
            .container {width: 900px; margin: 50px auto;<!-- background-image: url(Abstract/580-3.png)-->}
            h1 {color: azure; text-align: center; font-size: 42px; font-family: serif}
            .abs {width: 100%; height: 300px; background: #FFF; border-top-left-radius: 50px; border-top-right-radius: 12px; border-bottom-right-radius: 50px; border-bottom-left-radius: 12px;<!-- background-image: url(Abstract/back.jpg);--> background-size: 100% 100%; border: 3px solid #FF5C4F; border-right:3px solid #2782d5; border-bottom: 3px solid #2782d5; margin-bottom: 40px; box-shadow: 6px 6px 7px #2782d5, -5px -5px 7px #FF5C4F}
            
            h2 {text-align: center; padding-top: 12px; font-size: 32px; text-shadow: 8px 8px 25px #000}
            h3 {color: #800000; padding-top: 55px; padding-left: 150px; display: inline-block; font-size: 25px; text-shadow: 5px 5px 12px #800000}
            button {position: relative; left: 270px;width:150px; color: #FFF; padding:10px; font-weight: bold; font-size: 22px;background: #2782d5; border:0; border-radius: 10px; box-shadow: 5px 5px 7px #2782d5, -5px -5px 7px #FF5C4F}
            button:hover {background: 0; color: #FF5C4F; border: 3px solid #FF5C4F; padding:9px}
            button:active {background: 0; color: blue; border: 3px solid blue; padding:9px}
            .footer {width:100%; margin-top:0; padding: 15px; text-align: center; background: #191A1B; color: #888; font-weight: bold; <!--background-image: url(Abstract/580-3.png)-->}
            .footer ul {list-style: none; padding-left:0}
            .footer ul li {display: inline-block; padding: 2px}
            .footer ul li a {color: #000; font-size: 17px}
            .footer ul li .facebook:hover {color: #38569A}
            .footer ul li .messenger:hover {color: #0080F8}
            .footer ul li .github:hover {color: #9F45AA}
            .footer ul li .twitter:hover {color: #FFF}
            .footer ul li .google:hover {color: #D84638}
            .footer ul li .youtube:hover {color: red}
            .footer ul li .snapchat:hover {color: #F8F500}
            a {    text-decoration: none;}
        </style>
    
    </head>
    
    <body>
        
        <div class="header">
            <a href="#"><img src="Abstract/Abstract Im.png"></a>
        </div>
        
        
        <div class="container">
                    
          
                    <?php
                        
                      
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
                            
                        }

                        
               
                        
                        
                     ?> 
          
           </div>
                
                
            
        
            
          
           
           
            
        
        <div class="footer">
            
            Copyright &copy; 2019. <span style="color: #00FFFF"><big>Conference Management System</big></span> <span style="color: #FF00FF; font-size: 21px">Abstract</span> &nbsp; All rights reserved.

            
            <ul>
                <li><a href="#"> <i class="fab fa-facebook-f fa-2x facebook"></i> </a></li>
                <li><a href="#"> <i class="fab fa-facebook-messenger fa-2x messenger"></i> </a></li>
                <li><a href="#"> <i class="fab fa-github fa-2x github"></i> </a></li>
                <li><a href="#"> <i class="fab fa-twitter fa-2x twitter"></i> </a></li>
                <li><a href="#"> <i class="fab fa-google-plus fa-2x google"></i> </a></li>
                <li><a href="#"> <i class="fab fa-youtube fa-2x youtube"></i> </a></li>
                <li><a href="#"> <i class="fab fa-snapchat-ghost fa-2x snapchat"></i> </a></li>
            </ul>

            
        </div>

    </body>
    
</html>