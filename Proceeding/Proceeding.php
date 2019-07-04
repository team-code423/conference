
<?php require "../inc/database.php";
error_reporting(0); 
session_start();
$id = $_SESSION['id'];
?>

<html>
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
            .container {width: 1100px; margin: 50px auto}
            h1 {color: #de7101; text-align: center; font-size: 32px; font-family: monospace; text-shadow: 0px 4px 25px #de7101}
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
            
            .footer {width:100%; margin-top:150px; padding: 15px; text-align: center; background: #33363B; color: silver; font-weight: bold; background-image: url(body-background.png)}
            .footer .back-to-top {
                text-decoration: none;
                position: relative;
                top: -36px;
                left: 27%;
                width: 44px;
                height: 44px;
                max-width: 100%;
                height: auto;
                text-align: center;
                }
            .footer ul {list-style: none; padding-left:0}
            .footer ul li {display: inline-block; padding: 2px}
            .footer ul li a {color: #000; font-size: 17px}
            .footer i {color: #de7101; font-size: 30px; padding: 10px}
            .footer i:hover {color:aliceblue}
            .footer .con {color: #de7101; text-decoration: none; border-bottom: 1px solid #de7101; font-weight: lighter; font-size: 17.4px}
            .footer .con:hover {color: aliceblue}
        </style>
    
    </head>
    
    <body>
        
        <header>
            
            <i class="fab fa-product-hunt"></i>
            <span> Proceeding </span>
            <p> Conference Management System </p>
        </header> <br/> <br/> <br/>
        
        <div class="container">
        
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2014</span>

                    </summary>
                    
                    <h1> Main Proceedings </h1>
                    
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
                                        $all_paper = mysqli_query($connect,"SELECT * FROM   `paper` WHERE `conf-id`='$conf_id' ");
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

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Health on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Intelligent and Autonomous systems on the Web</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Security and Privacy on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Social Network Analysis and Graph Algorithms for the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">User Modeling, Interaction and Experience on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">Web Content Analysis, Semantics and Knowledge</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Economics, Monetisation, and Online Markets</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>

                        <li>
                            <details id="search">
                                <summary>
                                    <span class="s1">Web Search and Mining</span>
                                </summary>
                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- =========== Industry Track ============= -->
                    
                    <h3> Industry track </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Industry</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    
                    <!--------------------- hr ------------------->
                    <br> <hr color="#EEAA11"; size="2"> <br>
                    <!--------------------- hr ------------------->
            
                    
                    <h1> Companion proceedings </h1>
                    
                    <!-- =========== Alternate Tracks =========== -->
                    
                    <h3> Alternate tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Cognitive Computing</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Developers</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">International Project</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Journal Paper</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Journalism, Misinformation and Fact Checking</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">The BIG Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">PhD Symposium</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Programming</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- ===========       Demos       ========== -->
                    
                    <h3> Demos </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Demos</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========      Posters      ========== -->
                    
                    <h3> Posters </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Posters</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========     Challenges     ========= -->
                    
                    <h3> Challenges </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Challenges</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Challenge #1: Learning to Recognise Musical Genre from Audio</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Challenge #2: Knowledge Extraction for the Web of Things (KE4WoT)</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Challenge #3: Question Answering Mediated by Visual Clues and Knowledge Graphs</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Challenge #4: Multi-lingual Opinion Mining and Question Answering over Financial Data</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>
                        </ul>
                    
                  </details>
                </li>
            </ul>
            
            <!-- ========================================================================================================================================================================================================================================================================================================================== -->
            
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2015</span>

                    </summary>
                    
                    <h1> Main Proceedings </h1>
                    
                    <!-- ===========   Research Tracks   =========== -->
                    
                    <h3> Research tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Crowdsourcing and Human Computation for the Web</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Health on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Intelligent and Autonomous systems on the Web</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Security and Privacy on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Social Network Analysis and Graph Algorithms for the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">User Modeling, Interaction and Experience on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">Web Content Analysis, Semantics and Knowledge</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Economics, Monetisation, and Online Markets</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>

                        <li>
                            <details id="search">
                                <summary>
                                    <span class="s1">Web Search and Mining</span>
                                </summary>
                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- =========== Industry Track ============= -->
                    
                    <h3> Industry track </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Industry</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    
                    <!--------------------- hr ------------------->
                    <br> <hr color="#EEAA11"; size="2"> <br>
                    <!--------------------- hr ------------------->
            
                    
                    <h1> Companion proceedings </h1>
                    
                    <!-- =========== Alternate Tracks =========== -->
                    
                    <h3> Alternate tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Cognitive Computing</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Developers</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">International Project</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Journal Paper</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Journalism, Misinformation and Fact Checking</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">The BIG Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">PhD Symposium</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Programming</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- ===========       Demos       ========== -->
                    
                    <h3> Demos </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Demos</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========      Posters      ========== -->
                    
                    <h3> Posters </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Posters</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========     Challenges     ========= -->
                    
                    <h3> Challenges </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Challenges</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Challenge #1: Learning to Recognise Musical Genre from Audio</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Challenge #2: Knowledge Extraction for the Web of Things (KE4WoT)</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Challenge #3: Question Answering Mediated by Visual Clues and Knowledge Graphs</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Challenge #4: Multi-lingual Opinion Mining and Question Answering over Financial Data</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>
                        </ul>
                    
                  </details>
                </li>
            </ul>
            
            <!-- ========================================================================================================================================================================================================================================================================================================================== -->
            
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2016</span>

                    </summary>
                    
                    <h1> Main Proceedings </h1>
                    
                    <!-- ===========   Research Tracks   =========== -->
                    
                    <h3> Research tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Crowdsourcing and Human Computation for the Web</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Health on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Intelligent and Autonomous systems on the Web</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Security and Privacy on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Social Network Analysis and Graph Algorithms for the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">User Modeling, Interaction and Experience on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">Web Content Analysis, Semantics and Knowledge</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Economics, Monetisation, and Online Markets</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>

                        <li>
                            <details id="search">
                                <summary>
                                    <span class="s1">Web Search and Mining</span>
                                </summary>
                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- =========== Industry Track ============= -->
                    
                    <h3> Industry track </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Industry</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    
                    <!--------------------- hr ------------------->
                    <br> <hr color="#EEAA11"; size="2"> <br>
                    <!--------------------- hr ------------------->
            
                    
                    <h1> Companion proceedings </h1>
                    
                    <!-- =========== Alternate Tracks =========== -->
                    
                    <h3> Alternate tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Cognitive Computing</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Developers</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">International Project</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Journal Paper</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Journalism, Misinformation and Fact Checking</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">The BIG Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">PhD Symposium</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Programming</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- ===========       Demos       ========== -->
                    
                    <h3> Demos </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Demos</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========      Posters      ========== -->
                    
                    <h3> Posters </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Posters</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========     Challenges     ========= -->
                    
                    <h3> Challenges </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Challenges</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Challenge #1: Learning to Recognise Musical Genre from Audio</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Challenge #2: Knowledge Extraction for the Web of Things (KE4WoT)</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Challenge #3: Question Answering Mediated by Visual Clues and Knowledge Graphs</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Challenge #4: Multi-lingual Opinion Mining and Question Answering over Financial Data</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>
                        </ul>
                    
                  </details>
                </li>
            </ul>
            
            <!-- ========================================================================================================================================================================================================================================================================================================================== -->
            
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2017</span>

                    </summary>
                    
                    <h1> Main Proceedings </h1>
                    
                    <!-- ===========   Research Tracks   =========== -->
                    
                    <h3> Research tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Crowdsourcing and Human Computation for the Web</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Health on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Intelligent and Autonomous systems on the Web</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Security and Privacy on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Social Network Analysis and Graph Algorithms for the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">User Modeling, Interaction and Experience on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">Web Content Analysis, Semantics and Knowledge</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Economics, Monetisation, and Online Markets</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>

                        <li>
                            <details id="search">
                                <summary>
                                    <span class="s1">Web Search and Mining</span>
                                </summary>
                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- =========== Industry Track ============= -->
                    
                    <h3> Industry track </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Industry</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    
                    <!--------------------- hr ------------------->
                    <br> <hr color="#EEAA11"; size="2"> <br>
                    <!--------------------- hr ------------------->
            
                    
                    <h1> Companion proceedings </h1>
                    
                    <!-- =========== Alternate Tracks =========== -->
                    
                    <h3> Alternate tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Cognitive Computing</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Developers</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">International Project</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Journal Paper</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Journalism, Misinformation and Fact Checking</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">The BIG Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">PhD Symposium</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Programming</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- ===========       Demos       ========== -->
                    
                    <h3> Demos </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Demos</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========      Posters      ========== -->
                    
                    <h3> Posters </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Posters</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========     Challenges     ========= -->
                    
                    <h3> Challenges </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Challenges</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Challenge #1: Learning to Recognise Musical Genre from Audio</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Challenge #2: Knowledge Extraction for the Web of Things (KE4WoT)</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Challenge #3: Question Answering Mediated by Visual Clues and Knowledge Graphs</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Challenge #4: Multi-lingual Opinion Mining and Question Answering over Financial Data</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>
                        </ul>
                    
                  </details>
                </li>
            </ul>
            
            <!-- ========================================================================================================================================================================================================================================================================================================================== -->
            
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2018</span>

                    </summary>
                    
                    <h1> Main Proceedings </h1>
                    
                    <!-- ===========   Research Tracks   =========== -->
                    
                    <h3> Research tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Crowdsourcing and Human Computation for the Web</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Health on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Intelligent and Autonomous systems on the Web</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Security and Privacy on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Social Network Analysis and Graph Algorithms for the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">User Modeling, Interaction and Experience on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">Web Content Analysis, Semantics and Knowledge</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Economics, Monetisation, and Online Markets</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>

                        <li>
                            <details id="search">
                                <summary>
                                    <span class="s1">Web Search and Mining</span>
                                </summary>
                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- =========== Industry Track ============= -->
                    
                    <h3> Industry track </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Industry</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    
                    <!--------------------- hr ------------------->
                    <br> <hr color="#EEAA11"; size="2"> <br>
                    <!--------------------- hr ------------------->
            
                    
                    <h1> Companion proceedings </h1>
                    
                    <!-- =========== Alternate Tracks =========== -->
                    
                    <h3> Alternate tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Cognitive Computing</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Developers</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">International Project</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Journal Paper</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Journalism, Misinformation and Fact Checking</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">The BIG Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">PhD Symposium</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Programming</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- ===========       Demos       ========== -->
                    
                    <h3> Demos </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Demos</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========      Posters      ========== -->
                    
                    <h3> Posters </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Posters</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========     Challenges     ========= -->
                    
                    <h3> Challenges </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Challenges</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Challenge #1: Learning to Recognise Musical Genre from Audio</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Challenge #2: Knowledge Extraction for the Web of Things (KE4WoT)</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Challenge #3: Question Answering Mediated by Visual Clues and Knowledge Graphs</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Challenge #4: Multi-lingual Opinion Mining and Question Answering over Financial Data</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>
                        </ul>
                    
                  </details>
                </li>
            </ul>
            
            <!-- ========================================================================================================================================================================================================================================================================================================================== -->
            
            <ul>
                <li>
                <details>
                    <summary>

                            <span class="s1">2019</span>

                    </summary>
                    
                    <h1> Main Proceedings </h1>
                    
                    <!-- ===========   Research Tracks   =========== -->
                    
                    <h3> Research tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Crowdsourcing and Human Computation for the Web</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Health on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Intelligent and Autonomous systems on the Web</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Security and Privacy on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Social Network Analysis and Graph Algorithms for the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">User Modeling, Interaction and Experience on the Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">Web Content Analysis, Semantics and Knowledge</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Economics, Monetisation, and Online Markets</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>

                        <li>
                            <details id="search">
                                <summary>
                                    <span class="s1">Web Search and Mining</span>
                                </summary>
                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- =========== Industry Track ============= -->
                    
                    <h3> Industry track </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Industry</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    
                    <!--------------------- hr ------------------->
                    <br> <hr color="#EEAA11"; size="2"> <br>
                    <!--------------------- hr ------------------->
            
                    
                    <h1> Companion proceedings </h1>
                    
                    <!-- =========== Alternate Tracks =========== -->
                    
                    <h3> Alternate tracks </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Cognitive Computing</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Developers</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">International Project</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Journal Paper</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Journalism, Misinformation and Fact Checking</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="user_modeling">
                                    <summary>
                                        <span class="s1">The BIG Web</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details> 
                            </li>

                            <li>
                                <details id="content_analysis">
                                    <summary>
                                        <span class="s1">PhD Symposium</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="economics">
                                    <summary>
                                        <span class="s1">Web Programming</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </details>
                        </li>
                    </ul>
                    
                    <!-- ===========       Demos       ========== -->
                    
                    <h3> Demos </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Demos</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========      Posters      ========== -->
                    
                    <h3> Posters </h3>
                        <ul class="diamond-list">
                            <li>
                                <details>
                                <summary>

                                    <span class="s1">Posters</span>

                                </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                     </table>
                                   </div>

                                </details>
                            </li>
                        </ul>
                    
                    <!-- ===========     Challenges     ========= -->
                    
                    <h3> Challenges </h3>
                    <ul class="diamond-list">
                        <li>
                                <details>
                                <summary>

                                    <span class="s1">Challenges</span>

                                </summary>

                                <div class="tp">
                                    <table class="proceedings">
                                       <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="health">
                                    <summary>
                                        <span class="s1">Challenge #1: Learning to Recognise Musical Genre from Audio</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="autonomous">
                                    <summary>
                                        <span class="s1">Challenge #2: Knowledge Extraction for the Web of Things (KE4WoT)</span>
                                    </summary>
                                   <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>  
                            </li>

                            <li>
                                <details id="security_and_privacy">
                                    <summary>
                                        <span class="s1">Challenge #3: Question Answering Mediated by Visual Clues and Knowledge Graphs</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>

                            <li>
                                <details id="social_network">
                                    <summary>
                                        <span class="s1">Challenge #4: Multi-lingual Opinion Mining and Question Answering over Financial Data</span>
                                    </summary>
                                    <div class="tp">
                                    <table class="proceedings">
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t2">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                        <tr id="t1">
                                            <th> Paper Title &nbsp; <a href="#">&#x1F517;</a> <br/><span class="Au">Authors: &nbsp; Author1, Author2, Author3, Author4, Author5</span></th>
                                            <td><a href="#">View paper</a></td>
                                        </tr>
                                    </table>
                                </div>
                                </details>
                            </li>
                        </ul>
                    
                  </details>
                </li>
            </ul>
        
        </div>
            <!-- ======================      Footer      ====================== -->
            
            <div class="footer">
            
                <a class="back-to-top" href="#" data-slimstat="5"> <img src="back-to-top.png" alt="Back to top button"/> </a>

                
            Copyright &copy; 2019. <span style="color: bisque"><big>Conference Management System</big></span> <span style="color: #de7101; font-size: 21px">Proceeding</span> &nbsp; All rights reserved.

            
            <ul>
                <li><a href="#"> <i class="fab fa-facebook-f fa-2x facebook"></i> </a></li>
                <li><a href="#"> <i class="fab fa-github fa-2x github"></i> </a></li>
                <li><a href="#"> <i class="fab fa-twitter fa-2x twitter"></i> </a></li>
                <li><a href="#"> <i class="fab fa-snapchat-ghost fa-2x snapchat"></i> </a></li>
            </ul>
                <a class="con" href="#"> Contacts </a>
            
            </div>
            
    </body>
    
</html>