<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json");

    include_once("../model/query.php");
    include_once("../config/db.php");

    $db=new db();
    $connect=$db->connect();

    $question=new Query($connect);
    $show=$question->get();

    $num=$show->rowCount();
    if($num>0){
        $data_array=[];
        $data_array['data']=[];

        while($row=$show->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $data_item=array(
                "id"=>$id,
                "string"=>$string
            );

            array_push($data_array['data'],$data_item);
        }
        echo json_encode($data_array);

    }
