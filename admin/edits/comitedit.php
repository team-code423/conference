<?php
 require "../inc/database.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['save'])){
       $count=count($_POST['id']);
        $i=0;
        while ($i < $count ) {
            $name=$_POST['names'][$i];
            $about=$_POST['abouts'][$i];
            $id=$_POST['id'][$i];
            $query=mysqli_query($connect,"UPDATE `committee` SET `com-fname` = '$name',`com-lname` = '$about'WHERE `com-id`='$id' ");
            ++$i;
        }
        
       }
    if(isset($_POST['cancel'])){header ("location:../committee.php");}
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
             
                flex-direction: column;
                width: 90%;
                margin-left: 5%;
                
            }


            form input , form textarea , select{
            padding: 10px 8px;
            border: none;
            outline: none;
            border-radius: 9px;
            margin: 5px 0px;
            box-shadow: 0 0 3px 3px #d8d8d8;
            transition: .3s;
                    
            }
            form input[type="text"]{
                width: 400px;

            }

           /* form input[type="submit"]{
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
                align :right;
                margin-left: 15px;
                
            }
            .save:hover{
                box-shadow: 0 0 10px 5px #1ae607;
            }
            .cancel{
                background: #e21608;
                color: #fff;
                cursor: pointer;
                align :right;
                margin-left: 15px;
            }
            .cancel:hover{
                box-shadow: 0 0 10px 5px #ec3507;
            }
             
        </style>

    </head>
    <body>
        <div class="main">
            <h1> Edit Committe Members</h1>
            
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST"enctype="multipart/form-data">
            <ol>
            <?php
                    $s=mysqli_query($connect,"SELECT `conf-id`FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1");
                    $a=mysqli_fetch_assoc($s);
                    $conf=$a['conf-id'];
                    $query=mysqli_query($connect,"SELECT * FROM `committee` WHERE `conf_id`=$conf");
                    $i=0;
                    while($com=mysqli_fetch_assoc($query)):
                    ?>
                
                
                    
                         <li>
                            <input type="hidden" name="id[<?=$i;?>]" value="<?php echo $com['com-id'];?>" >
                            <input type="text" name="names[<?=$i;?>]" value="<?php echo $com['com-fname'];?>" id="title">
                            <input type="text" name="abouts[<?=$i;?>]" value="<?php echo $com['com-lname'];?>" id="title">
                        </li>
                        <?php 
                            ++$i;
                            endwhile;
                        ?>
                        
                        <input name="save" class="save" type="submit"   value="Save" >
                        <input name="cancel" class="cancel" type="submit"   value="Cancel" >
            
                    </form>
                    </ol>
                
                
        </div>

    

    </body>
</html>