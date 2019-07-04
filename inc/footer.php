  <!-- jQuery Plugins -->
    
  <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/fullclip.min.js"></script>
    <script src="js/main.js"></script>


    <?php 
    
    $sql = "SELECT `conf-id` FROM `conferance years` WHERE `status` = 'Active'";

    $resul = mysqli_query($connect,$sql);

    $result = mysqli_fetch_assoc($resul);
    
    $conf_id  =  $result['conf-id'];

    $sql2 = "SELECT * FROM `conf-images` WHERE `conf-id` = '$conf_id'";

    $query = mysqli_query($connect,$sql2);

    //$result = mysqli_fetch_assoc($query);

    $imgs = [];
   while($row = mysqli_fetch_assoc($query))
   {
       $imgs[] = "admin/uploads/files/".$row['img-name'];
   }
    
   
?>

<script type="text/javascript">
    $('.fullBackground').fullClip({     
images: [<?php

    
  for($i=0 ; $i < count($imgs); $i++){
    echo "'$imgs[$i]'" . ',';
  
  }


  ?>]

     
      ,transitionTime: 1700,
      wait: 4000,
    });
    </script>


</body>

</html>