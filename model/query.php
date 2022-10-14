<?php
    class Query{
        private $connect;
        public $id;
        public $string;
        

        public function __construct($conn){
            $this->connect=$conn;
        }

        public function get(){
            $query="select * from test";
            $stmt=$this->connect->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function getOnce($id){
            $query="select * from test where id=?";
            $stmt=$this->connect->prepare($query);
            $stmt->bindParam(1,$id);
            $stmt->execute(); 

            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $this->id=$row['id'];
            $this->string=$row['string'];

            $data_item=array(
                'id'=>$this->id,
                'string'=>$this->string
            );

            return $data_item;
        }

        public function create(){
            $query="insert into test set string=:string";
            $stmt=$this->connect->prepare($query);
            $this->string=htmlspecialchars(strip_tags($this->string));

            $stmt->bindParam(':string',$this->string);
            if($stmt->execute()) return true;
            printf("Error %s.\n",$stmt->error);
            return false;
        }
    }
?>