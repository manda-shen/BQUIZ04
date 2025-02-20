<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db18";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function fetchOne($sql){
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function fetchAll($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table";
        if(isset($arg[0])){
            if(is_array($ary[0])){
                $where=$this->a2s($arg[0]);
                $sql .= " WHERE " . join(" && ",$where);
            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){

            $sql .= $arg[1];
        }
        return $this->fetchAll($sql);
    }


    function find($id){
        $sql="SELECT * FROM $this->table";
        if(is_array($id)){
            $where=$this->a2s($id);
            $sql .= " WHERE " . join(" && ",$where);
        }else{
            $sql .= " WHERE `id`='$id'";
        }
        return $this->fechOne($sql);
    }

    function save($array){
        if(isset($array['id'])){
            $id=$array['id'];
            unset($array['id']);
            $tmp=$this->a2s($array);
            $sql="UPDATE $this->table SET " . join(",",$tmp) . "WHERE `id`='$id'";
        }else{
            $keys=array_keys($array);
            $sql="INSERT INTO $this->table (`" . join("`, `",$keys) . " VALUES ('" . join("','",$array) . "')";
        }
        return $this->pdo->query($sql)->exec();
    }

    function del($id){
        $sql="DELETE FROM $this->table";
        if(is_array($id)){
            $where=$this->a2s($id);
            $sql .= " WHERE " . join(" && ",$where);
        }else{
            $sql .= " WHERE `id`='$id'";
        }
        return $this->pdo->query($sql)->exec();
    }
    

    protected function math($math,$col='id',$where=[]){
        $sql="SELECT $math($col) FROM $this->table";
        if(!empty($where)){
            $tmp=$this->a2s($where);
            $sql .= " WHERE " . join(" && ",$where);
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col,$where=[]){
        return $this->math('max',$col,$where);
    }

    function min($col,$where=[]){
        return $this->math('min',$col,$where);
    }

    function sum($col,$where=[]){
        return $this->math('sum',$col,$where);
    }

    function avg($col,$where=[]){
        return $this->math('avg',$col,$where);
    }

    function count($col,$where=[]){
        return $this->math('count',$col,$where);
    }



}

function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db18",'root','');
    return $pdo->query($sql)->fetchall();
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}
?>