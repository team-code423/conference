<?php require "inc/database.php";  
session_start();

if(isset($_SESSION['admin']))
{
     header("location:index.php");
     exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
     if (isset($_POST['submit'])) {

          $user = $_POST['user'];

          $pass = $_POST['pass'];          

          $sql = "SELECT * FROM `admin` WHERE `user` = '$user' AND `pass` = '$pass'  ";

          $row =  [];
          $query = mysqli_query($connect,$sql);

          if(mysqli_num_rows($query) == 1)
          { 
            $row = mysqli_fetch_assoc($query);

            $_SESSION['admin'] = $row['id'];
               header("location:index.php");
               exit;
              

          }else{
               echo  mysqli_error($connect). "email or password not found" ;
          }

     }
}

?>
<html>
    <head>
        <style>
            .main{
                height: 499px;
                width: 350px;
                background-color: rgb(184, 201, 201);
                margin-left: 490px;
                margin-top: 100px;
                border-radius: 5px;
            }
            .img{
                height: 150px;
                width: 150px;
                margin-left: 95px;
                margin-top: 65px;
            }
            form{
                margin-top: 45px;
                font-family: sans-serif;
                font-size: 20px;
            }

            input[type=text] ,[type=password] {
                width: 95%;
                margin-left: 2.5%;
                padding: 12px 20px;
                margin-top: 10px;
                display: inline-block;              
               border: none;
               font-family: sans-serif;
                font-size: 20px;
            }

            input[type=submit] {
            width: 95%;
            margin-left: 2.5%;
            background-color: 4285f4;
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-family: sans-serif;
            font-size: 20px;
            }
        </style>

    </head>
    <body>

          <div class="info">
            User : admi <br>
            Password : 1234
          </div>


        <div class="main">
            
            <img class="img" src="login.png"> 
            
            
            <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
                <input type="text"  name="user" placeholder="User Name.."> <br>
                <input type="password"  name="pass" placeholder="Password.."> <br>
                <input type="submit" name="submit" value="Log In" > <br>
            </form>
        


        </div>

    </body>
</html>