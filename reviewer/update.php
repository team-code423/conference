<?php


require "../inc/database.php";
require "../inc/functions.php";

$id = $_GET['id'];

$action = $_GET['action'];

if($action == "review"){

update("papers","reviewed",1,"paper_id",$id);

}elseif($action == "accept"){
    update("papers","accepted",1,"paper_id",$id);
}else{
    echo "error";
}



?>