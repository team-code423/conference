<?php
 require "../inc/database.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['save'])){
       $count=count($_POST['id']);
        $i=0;
        while ($i < $count ) {

            $id=$_POST['id'][$i];

            $auther_er = $_POST['auther_er'][$i];       $auther = $_POST['auther'][$i];
        
            $pres_er = $_POST['pres_er'][$i];           $pres = $_POST['pres'][$i];
    
            $lis_er = $_POST['lis_er'][$i];             $lis = $_POST['lis'][$i];
    
            $add_paper_er = $_POST['add_paper_er'][$i]; $add_paper = $_POST['add_paper'][$i];
    
            $add_page_er = $_POST['add_page_er'][$i];   $add_page = $_POST['add_page'][$i];
    
            $one_day_er = $_POST['one_day_er'][$i];      $one_day = $_POST['one_day'][$i];

            $sql = "UPDATE `fees` SET `auther_er`='$auther_er' , `auther`='$auther' , `pres_er`='$pres_er' , `pres`='$pres' , `lis_er`='$lis_er' , `lis`='$lis' , `add_paper_er`='$add_paper_er' , `add_paper`='$add_paper' , `add_page_er`='$add_page_er' , `add_page`='$add_page' , `one_day_er`='$one_day_er' , `one_day`='$one_day' WHERE `id`='$id' ";
            $query = mysqli_query($connect,$sql);
            
            echo mysqli_error($connect);
            ++$i;
        }
        
       }
    if(isset($_POST['cancel'])){header ("location:../fees.php");}
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
            <h1> Edit Your Fees</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST"enctype="multipart/form-data">
            
            <?php
                    $s=mysqli_query($connect,"SELECT `conf-id`FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1");
                    $a=mysqli_fetch_assoc($s);
                    $conf=$a['conf-id'];
                    $query=mysqli_query($connect,"SELECT * FROM `fees` WHERE `conf-id`=$conf");
                    $i=0;
                    while($com=mysqli_fetch_assoc($query)):
                    ?>
                
                
                
                         
                         <input type="hidden" name="id[<?=$i;?>]" value="<?php echo $com['id'];?>" >
                         
                    <label for="imgs">Author</label>
                    <input name= "auther_er[<?=$i;?>]" type="text" value="<?php echo $com['auther_er'];?>" id="e-Author">
                    <input name= "auther[<?=$i;?>]"    type="text" value="<?php echo $com['auther'];?>" id="r-Author">
          
                  <label for="imgs">Presentation only </label>
                    <input name="pres_er[<?=$i;?>]" type="text" value="<?php echo $com['pres_er'];?>" id="e-Presentation">
                    <input name="pres[<?=$i;?>]" type="text" value="<?php echo $com['pres'];?>" id="r-Presentation">
               
                  <label for="imgs">Listener or Accompanied Person</label>
                    <input name= "lis_er[<?=$i;?>]" type="text" value="<?php echo $com['lis_er'];?>" id="e-Listener ">
                    <input name= "lis[<?=$i;?>]" type="text" value="<?php echo $com['lis'];?>" id="r-Listener ">
               
                  <label for="imgs">Additional Paper</label>
                    <input name= "add_paper_er[<?=$i;?>]" type="text" value="<?php echo $com['add_paper_er'];?>" id="e-Additional-Paper">
                    <input name= "add_paper[<?=$i;?>]" type="text" value="<?php echo $com['add_paper'];?>" id="r-Additional-Paper">
               
                  <label for="imgs">Additional Page</label>
                    <input name= "add_page_er[<?=$i;?>]"type="text" value="<?php echo $com['add_page_er'];?>" id="e-Additional-Page">
                    <input name= "add_page[<?=$i;?>]" type="text" value="<?php echo $com['add_page'];?>" id="r-Additional-Page">
                 
                  <label for="imgs">One Day Tour</label>
                    <input name= "one_day_er[<?=$i;?>]"type="text" value="<?php echo $com['one_day_er'];?>" id="e-One-Day">
                    <input name= "one_day[<?=$i;?>]"type="text" value="<?php echo $com['one_day'];?>" id="r-One-Day">
                   
                        <?php 
                            ++$i;
                            endwhile;
                        ?>

                        <input class="save" type="submit" name="save"  value="Save" >
                        <input class="cancel" type="submit" name="cancel"  value="Cancel" >
            
                    </form>


            </div>

        </div>

    </body>
</html>