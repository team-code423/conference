<?php


function get_title(){
    
    $title =  explode('/' , $_SERVER['REQUEST_URI']);
    
    $title = end($title);
    
    $title = explode('.' , $title);
    
    if(empty($title[0]) || $title[0] == 'index')
    {
        $title[0] = 'DashBoard';
    }
    
    echo $title[0];
    
}

function fetch_all($table){
    $connect = $GLOBALS['connect'];
    
    $sql = "SELECT * FROM `{$table}`";
    
    $query = mysqli_query($connect,$sql);
    
    if($query){
        return $query;
    }else{
        echo "error".mysqli_error($connect);
    }
}


?>