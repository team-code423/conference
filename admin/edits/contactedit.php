
<?php

require "../inc/database.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
   if(isset($_POST['save'])){
       
       $id = $_POST['id'];

       $email = $_POST['email'];

       $phone = $_POST['phone'];
  
       $query=mysqli_query($connect,"UPDATE `contactus` SET `email` = '$email',`phone` = '$phone' WHERE `id`='$id' ");

       if (!empty($errors)) {
           
           echo mysqli_error($connect);
           print_r($errors);
       

   }   
   }
   if(isset($_POST['cancel'])){header ("location:../countact.php");}
}
?>

<html>
    <head>
        <style>
            .main{
                width: 80%;
                
                background-color: rgb(235, 240, 238);
                margin-left: 10%;
            }
            h1{
                margin: 10px;
                border-bottom: 2px solid black;
                
            }
            form{
                display: flex;
                flex-direction: column;
                width: 90%;
                margin-left: 5%;
            }


            form input , form textarea , select{
            padding: 10px 8px;
            border: none;
            outline: none;
            border-radius: 9px;
            margin: 10px 0;
            box-shadow: 0 0 3px 3px #d8d8d8;
            transition: .3s;
                    
            }

            /*form input[type="submit"]{
                background: #21d80c;
                color: #fff;
                cursor: pointer;
            }
            form input[type="submit"]:hover{
                box-shadow: 0 0 10px 5px #1ae607;
                    
            }*/
            .save{
                background: #21d80c;
                color: #fff;
                cursor: pointer;
                margin-left: 15px;
                
            }
            .save:hover{
                box-shadow: 0 0 10px 5px #1ae607;
            }
            .cancel{
                background: #e21608;
                color: #fff;
                cursor: pointer;
                margin-left: 15px;
            }
            .cancel:hover{
                box-shadow: 0 0 10px 5px #ec3507;
            }
            textarea{
                resize: vertical;
            } 
        </style>

    </head>
    <body>
        <div class="main">
            <h1> Edit Countact Info</h1>
                <div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST"enctype="multipart/form-data">

<?php 
           $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
           $res = mysqli_fetch_assoc($i);
           $n= $res['conf-id'];
           $h = mysqli_query($connect,"SELECT * FROM `contactus` WHERE `conf-id`='$n' ORDER BY `id` DESC LIMIT 1");
           
            $p= mysqli_fetch_assoc($h);
           ?>
<input type="hidden" name="id" value="<?php echo $p['id'];?>" >
<input type="text" name="email" value="<?php echo $p['email'];?>"id="title">
<input type="text" name="phone"  value="<?php echo $p['phone'];?>" id="location">

                        <input class="save" type="submit" name="save" value="Save" >
                        <input class="cancel" type="submit" name="cancel" value="Cancel" >
            
                    </form>

                </div>
                
                              

            </div>

        </div>

    </body>
</html>