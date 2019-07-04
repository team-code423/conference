
<div class="main">
    <div class="dashboard content">
        

        <?php
    
    if(!$connect){
        die("failed to connect database");
        exit;
    }
    
    $sql1   = "SELECT 'A-id' FROM auther";

    $sql2 =  "SELECT `conf-title` FROM `conferance years` WHERE `status` = 'Active'";

    $sql3 =  "SELECT `hotel-id` FROM hotel";

    $sql4 =  "SELECT `M-id` FROM `member list`";

    $sql5 =  "SELECT `paper-id` FROM paper";

    $sql6 =  "SELECT `Reg-id` FROM `registeration type`";

    $sql7 =  "SELECT `Report-id` FROM report";

    $sql8 = "SELECT `R-id` FROM reviwer" ;
    
    $sql9 =  "SELECT `topic-id` FROM topic";
    
    $sql11 =  "SELECT `sp-id` FROM sponser";

    

$query1 = mysqli_query($connect,$sql1);
$query2 = mysqli_query($connect,$sql2);
$query3 = mysqli_query($connect,$sql3);
$query4 = mysqli_query($connect,$sql4);
$query5 = mysqli_query($connect,$sql5);
$query6 = mysqli_query($connect,$sql6);
$query7 = mysqli_query($connect,$sql7);
$query8 = mysqli_query($connect,$sql8);
$query9 = mysqli_query($connect,$sql9);
$query11 = mysqli_query($connect,$sql11);

session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
?>

        <?php if($query1): ?>

        <?php  $authers = mysqli_num_rows($query1);  ?>

        <div class="col-3">
            <h3>authers</h3>
            <?= $authers; ?>

        </div>

        <?php endif; ?>

        <?php if($query2): ?>

        <?php  $conf_title = mysqli_fetch_row($query2);  ?>

        <div class="col-3" >
            <h3>conference</h3>
            <?php if(!empty($conf_title[0])){echo $conf_title[0];} ?>
        </div>
       

        <?php endif; ?>

        <?php if($query3): ?>

        <?php  $hotels = mysqli_num_rows($query3);  ?>

        <div class="col-3">
            <h3>hotels</h3>
            <?= $hotels; ?>

        </div>

        <?php endif; ?>

        <?php if($query4): ?>

        <?php  $member = mysqli_num_rows($query4);  ?>

        <div class="col-3" >
            <h3>members</h3>
            <?= $member; ?>

        </div>

        <?php endif; ?>

        <?php if($query5): ?>

        <?php  $papers = mysqli_num_rows($query5);  ?>

        <div class="col-3">
            <h3>papers</h3>
            <?= $papers; ?>

        </div>

        <?php endif; ?>

        <?php if($query6): ?>

        <?php  $regs = mysqli_num_rows($query6); ?>

        <div class="col-3">
            <h3>regs</h3>
            <?= $regs; ?>

        </div>

        <?php endif; ?>

        <?php if($query7): ?>

        <?php  $reports = mysqli_num_rows($query7);  ?>

        <div class="col-3">
            <h3>reports</h3>
            <?= $reports; ?>

        </div>

        <?php endif; ?>

        <?php if($query8): ?>

        <?php  $reviewres = mysqli_num_rows($query8); ?>

        <div class="col-3">
            <h3>reviwer</h3>
            <?= $reviewres; ?>

        </div>

        <?php endif; ?>

        <?php if($query9): ?>

        <?php  $topic = mysqli_num_rows($query9); ?>

        <div class="col-3">
            <h3>topics</h3>
            <?= $topic; ?>

        </div>

        <?php endif; ?>

        <?php if($query11): ?>

        <?php  
        $sponsors = mysqli_num_rows($query11);  ?>

        <div class="col-3">
            <h3>sponsors</h3>
            <?= $sponsors; ?>

        </div>

        <?php endif; ?>


        <?php

$connect = mysqli_connect('localhost','root','','conferanc')or die("error");
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {
 



        $sql_1 = mysqli_query($connect,"TRUNCATE TABLE `auther`");
        $sql_2 = mysqli_query($connect,"TRUNCATE TABLE `camera ready`");
        $sql_3 = mysqli_query($connect,"TRUNCATE TABLE `co-auther`");
        $sql_4 = mysqli_query($connect,"TRUNCATE TABLE `committee`");
        $sql_5 = mysqli_query($connect,"TRUNCATE TABLE `conf-images`");
        $sql_6 = mysqli_query($connect,"TRUNCATE TABLE `conferance years`");
        $sql_7 = mysqli_query($connect,"TRUNCATE TABLE `conf topic`");
        $sql_8 = mysqli_query($connect,"TRUNCATE TABLE `fees`");
        $sql_9 = mysqli_query($connect,"TRUNCATE TABLE `hotel`");
        $sql_10 = mysqli_query($connect,"TRUNCATE TABLE `impdates`");
        $sql_11 = mysqli_query($connect,"TRUNCATE TABLE `member list`");
        $sql_12 = mysqli_query($connect,"TRUNCATE TABLE `member type`");
        $sql_13 = mysqli_query($connect,"TRUNCATE TABLE `paper`");
        $sql_14 = mysqli_query($connect,"TRUNCATE TABLE `paper report`");
        $sql_15 = mysqli_query($connect,"TRUNCATE TABLE `registeration type`");
        $sql_16 = mysqli_query($connect,"TRUNCATE TABLE `report`");
        $sql_17 = mysqli_query($connect,"TRUNCATE TABLE `reviwer`");
        $sql_18 = mysqli_query($connect,"TRUNCATE TABLE `speakers`");
        $sql_19 = mysqli_query($connect,"TRUNCATE TABLE `sponser`");
        $sql_20 = mysqli_query($connect,"TRUNCATE TABLE `steps`");
        $sql_21 = mysqli_query($connect,"TRUNCATE TABLE `topic`");
        $sql_22 = mysqli_query($connect,"TRUNCATE TABLE `venue`");
        $sql_23 = mysqli_query($connect,"TRUNCATE TABLE `attendee`");
        $sql_24 = mysqli_query($connect,"TRUNCATE TABLE `contactus`");


        
    }
}
?>
<html>
<head>
    <style>
        .clear{
            
            height: 50px;
            width: 350px;
            margin: 15px 0px;
        }
        

    </style>
</head>

<body>
    <div class="clear">Clear all data To Add New Conferrence :-</div> <br>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
<input class="input" type="submit" value="Clear DataBase" name="submit">
</form>
</body>
</html>



    </div>
</div>



