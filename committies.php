<?php require "inc/header.php"; ?>
 <head>
      <style >
          .one{
            
             float: right;
             width: 980px;

          }
      </style>
  </head>
    <!-- wrapper -->
     <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- side-nav -->
                <?php require "inc/sidenav.php"; ?>

                <div class="col-md-9">
                    <!-- About -->
                    <div id="about" class="section">
                        <!-- container-fluid -->
                        <div class="container-fluid">
                            <!-- row -->
                            <div class="row">
                                 <div class="committies" >
                                
                                <h1><span class="asd">Committee Members</span></h1>

                                <table class="table">
    
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                    </tr>
                                
                               <?php
                            
                            $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                            $res = mysqli_fetch_assoc($i);
                            $conf_id= $res['conf-id'];  
                            $sql = "SELECT * FROM `committee`WHERE `conf_id`='$conf_id'";

                            $query = mysqli_query($connect,$sql);
                            while($row = mysqli_fetch_assoc($query)): ?>
                            
                           <tr>
        <td><?= $row['com-fname']; ?></td>
        <td><?= $row['com-lname']; ?></td>
      </tr>
                               

<?php endwhile; ?>
</table>      
                                    </div>
                                                
                                          
                                           
                            </div>
                            <!-- row -->
                        </div>
                        <!-- /container-fluid -->
                    </div>
                    <!-- /About -->
                    <?php require "inc/footer.php"; ?>
