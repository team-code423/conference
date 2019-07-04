<?php
 require "../inc/database.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['save'])){
        
        $id = $_POST['id'];

        $name = $_POST['name'];

        $phone = $_POST['phone'];
        
        $address = $_POST['address'];
        
        if(file_exists($_FILES['file']['tmp_name']))
        {
            $filetmp = $_FILES['file']['tmp_name'];
            $img = rand(0,100).$_FILES['file']['name'];
            move_uploaded_file($filetmp,"../files/".$img);
        }
        
        else
        {
            $ss=mysqli_query($connect,"SELECT `img` FROM `venue` WHERE `id`='$id'");
            $aa=mysqli_fetch_assoc($ss);
            $img=$aa['img'];
        }
        
   
        $query=mysqli_query($connect,"UPDATE `venue` SET `name` = '$name',`phone` = '$phone',`address` = '$address',`img`='$img' WHERE `id`='$id' ");
        
        $count=count($_POST['ids']);
        
        $i=0;
        
        while ($i < $count ) {
            $ids=$_POST['ids'][$i];
            $names=$_POST['names'][$i];
            $query=mysqli_query($connect,"UPDATE `steps` SET `name` = '$names' WHERE `id`='$ids' ");
            ++$i;
        }
        if(isset($_POST['nnames'])){
            $s=mysqli_query($connect,"SELECT `id` FROM `venue` ORDER BY `id` DESC LIMIT 1");
            
            $aa=mysqli_fetch_assoc($s);
            
            $v_id=$aa['id'];
            
            foreach ($_POST['nnames'] as $key => $value) {
                $sql = "INSERT INTO `steps`(`name`,`v_id`) VALUES ('$value','$v_id')";
                $query = mysqli_query($connect,$sql);
            }
        }
        if (!empty($errors)) {
            
            echo mysqli_error($connect);
            print_r($errors);
        

    }   
    }
    if(isset($_POST['cancel'])){header ("location:../venue.php");}
}
?>
<html>
    <head>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
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
    <script>
  	$(function() {
   $("#addMore").click(function(e) {
    e.preventDefault();
    $("#fieldList").append("<li> <textarea name='nnames[]' id='nnames[]' cols='70' rows='3' ></textarea></li>");


     });
   });
  </script>
    </head>
    <body>
        <div class="main">
            <h1> Edit Your Venue</h1>
         
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST"enctype="multipart/form-data">

                     <?php 
                                $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                                $res = mysqli_fetch_assoc($i);
                                $n= $res['conf-id'];
                                $h = mysqli_query($connect,"SELECT * FROM `venue` WHERE `conf-id`='$n' ORDER BY `id` DESC LIMIT 1");
                                
                                 $p= mysqli_fetch_assoc($h);
                                ?>
                    <input type="hidden" name="id" value="<?php echo $p['id'];?>" >
                    <input type="text" name="name" value="<?php echo $p['name'];?>"id="title">
                    <input type="text" name="address"  value="<?php echo $p['address'];?>" id="location">
                    <input type="tel"  name="phone"   value="<?php echo $p['phone'];?>"  id="phone">
                    <label>Update Your Pic</label>
                    <input type="file" name="file"  style="cursor:pointer" > 
                  
                    <label>Steps</label>
                    <ol id="fieldList">
                    <?php 
                    $i=0;
                                $a = mysqli_query($connect,"SELECT `id` FROM `venue` ORDER BY `id` DESC LIMIT 1 ");
                                $r = mysqli_fetch_assoc($a);
                                $e= $r['id'];
                                $d = mysqli_query($connect,"SELECT * FROM `steps` WHERE `v_id`='$e' ");
                                while ( $t= mysqli_fetch_assoc($d)):
                                ?>
                                
                        <li>
                            <input type="hidden" name="ids[<?=$i;?>]" value="<?php echo $t['id'];?>" >  
                            <textarea name="names[<?=$i;?>]" id="names[<?=$i;?>]" cols="70" rows="3" ><?php echo $t['name'];?></textarea>
                        </li>
                            <?php 
                        ++$i;    
                        endwhile;
                            ?>
                            </ol>
                
  <button id="addMore">Add more step </button>
                    <input class="save" type="submit" name="save" value="Save" >
                    <input class="cancel" type="submit" name="cancel" value="Cancel" >
          
                </form>

            </div>

        </div>

    </body>
</html>