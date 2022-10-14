<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json");
    header("Access-Control-Allow-Methods:POST");
    header("Access-Control-Allow-Headers:Access-Control-Allow-Methods,Access-Control-Allow-Headers;Content-Type,Authorization,X-Requested-With");

    include ("../config/db.php");
    include ("../model/query.php");

    $db=new db();
    $connect=$db->connect();

    $query=new Query($connect);
    //$data=json_decode(file_get_contents("php://input"));

    //$query->string=$data->string;
    $query->string="thu";

    if($query->create()){
        echo json_encode(array('Message','ok'));
    }else{
        echo json_encode(array('Message','error'));
    }