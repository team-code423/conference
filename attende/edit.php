<?php

require "../inc/database.php";
session_start();

if (!isset($_SESSION['attendee']) && !(int) $_SESSION['attendee']) {
    header("location:../index.php");
}

?>

<html>
    <head>
            <link rel="stylesheet" href="attende.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    </head>
    

<style>
    body {margin:0; padding:0; font-family: Arial, Tahoma; background: #252F31}
            .container {width: 900px; margin: 50px auto; padding:25px}

            h1 {color: #FFF; text-align: center; margin-bottom: 50px}
            h2 {color: #FFF; margin-bottom: 25px}
            .first-paragraph {color: #999; line-height: 1.4; text-align: left}
            label {color: #FFF; font-size: 19px; margin-left: 15px}
            input {padding:7px; background: #475252; color: #FFF; font-size:16px; border:0; position: relative}
            input[name="fname"] {left: 90px}
            input[name="lname"] {left: 100px}
            input[name="email"] {left:128px}
            input[name="password"] {left:92px}
            input[name="v_password"] {left:40px}
            hr {margin-top: 30px; margin-bottom: 30px}
            input[name="Given Name"] {left: 90px}
            input[name="Family Name"] {left: 100px}
            .menu1 {padding:7px; background: #475252; color: #FFDAB9; font-size:16px; border:0; position: relative; left:113px}
            input[name="company"] {left: 96px}
            input[name="faculty"] {left: 115px}
            input[name="department"] {left: 77px}
            textarea {padding: 10px; width: 55%; height: 180px; background: #475252; color: #FFF; font-size:17px; border:0; position: relative; left:200px}
            input[name="state"] {left: 48px}
            .menu2 {padding:7px; background: #475252; color: #FFDAB9; font-size:16px; border:0; width: 28%; position: relative; left:105px}
            input[name="mobile"] {left: 62px}
            .footer {width:100%; height:70px; margin-top:0; padding-top:10px; padding-bottom:18px; text-align: center; background: #191E22; color: #888; font-weight: bold}
            .footer ul {list-style: none; padding-left:0}
            .footer ul li {display: inline-block; padding: 2px}
            .footer ul li a {color: #000; font-size: 17px}
            .footer ul li a:hover {color: silver}

        </style>
<body>


<div class="container">
    <form action="update.php" method="POST">
        
        <h2> Login Information </h2>
      

        <label> Full Name* </label>
        <input type="text" name="name" placeholder=" Name" style="width: 25%" value="<?= $_SESSION['name']; ?>" > <br><br>

        <label> Email* </label>
        <input type="text" name="email" style="width: 30%" value="<?= $_SESSION['email']; ?>"> <span style="color: #999; margin-left: 128px; font-size: 13px">(All
            communications will be sent to this email)</span><br> <br>

        <label> Password* </label>
        <input type="password" name="password" maxlength="15" style="width: 25%"> <span style="color: #999; margin-left: 92px; font-size: 13px">(Password
            must be 8-15 alphanumeric)</span><br> <br>

        <label> Verify Password* </label>
        <input type="password" name="v_password" maxlength="15" style="width: 25%">

        <hr color="#777" size="1">

       


        <input type="submit" value="Save" name="submit" style="width:170px; padding:15px; font-weight: bold; font-size: 19px; color: #FFF; background: #191E22; border-radius: 8px; margin-top: 50px; margin-left: 40%">
        <input type="submit" value="Cancel" name="cancel" style="width:170px; padding:15px; font-weight: bold; font-size: 19px; color: #FFF; background: #191E22; border-radius: 8px; margin-top: 50px; margin-left: 40%">
    </form>
</div>

<div class="footer">

    <span>&copy; Copyright 2019 <span style="color: #2ecc71">Se</span><span style="color: #FFF">nior</span><span style="color: #2ecc71">_</span><span
            style="color: #FFF">N</span><span style="color: #2ecc71">our</span> Inc</span>

</div>

</body>
</html>