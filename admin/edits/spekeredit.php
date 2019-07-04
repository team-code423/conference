<?php
 require "../inc/database.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['save'])){
       $count=count($_POST['id']);
        $i=0;
        while ($i < $count ) {
            $id=$_POST['id'][$i];
            $name=$_POST['name'][$i];
            $abs=$_POST['about'][$i];
            if(file_exists($_FILES['file']['tmp_name'][$i]))
            {
                $filetmp = $_FILES['file']['tmp_name'][$i];
                $filename = rand(0,100).$_FILES['file']['name'][$i];
                move_uploaded_file($filetmp,"../files/".$filename);
            }
            else
            {
                $ss=mysqli_query($connect,"SELECT `img` FROM `speakers` WHERE `id`='$id'");
                $aa=mysqli_fetch_assoc($ss);
                $filename=$aa['img'];
            }
           
            
            $query=mysqli_query($connect,"UPDATE `speakers` SET `name` = '$name',`about` = '$abs',`img`='$filename' WHERE `id`='$id' ");
            ++$i;
        }
        
       }
    if(isset($_POST['cancel'])){header ("location:../speakers.php");}
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
            box-shadow: 0 0 1px 1px #d8d8d8;
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
            
        <h1> Edit Your Spakers</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST"enctype="multipart/form-data">
            <ol>
            <?php
                    $s=mysqli_query($connect,"SELECT `conf-id`FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1");
                    $a=mysqli_fetch_assoc($s);
                    $conf=$a['conf-id'];
                    $query=mysqli_query($connect,"SELECT * FROM `speakers` WHERE `conf-id`=$conf");
                    $i=0;
                    while($com=mysqli_fetch_assoc($query)):
                    ?>
             
                         <li>
                         <input type="hidden" name="id[<?=$i;?>]" value="<?php echo $com['id'];?>" >
                    <input type="text" name="name[<?=$i;?>]" value="<?php echo $com['name'];?>" id="title"><br>
                    <textarea name="about[<?=$i;?>]" cols="70" rows="10"><?php echo $com['about'];?></textarea><br>
                    <label>Update Your Pic</label>
                    <input type="file" name="file[<?=$i;?>]"  style="cursor:pointer">

                    </li>
                        <?php 
                            ++$i;
                            endwhile;
                        ?> 
                    <input class="save" type="submit" name="save" value="Save" >
                    <input class="cancel" type="submit" name="cancel" value="Cancel" >
          
                </form>


            </div>

        </div>

    </body>
</html>