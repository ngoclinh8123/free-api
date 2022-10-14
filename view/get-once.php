<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json");

    include_once("../config/db.php");
    include_once("../model/query.php");

    $db=new db();
    $connect=$db->connect();
    $query=new Query($connect);

    $getOnce=$query->getOnce(1);
    echo json_encode($getOnce);

?>