<?php
    $host = "167.99.14.129";
    $dbName = "eko_alliance";
    $username = "roots";
    $password = "webshark";    

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {       
        header("Location: manutencao.html");
        echo 123;         
        //echo 'ERROR: ' . $e->getMessage();
    }


    function dbQuery($tbl, $where = "", $order = "ASC", $limit = 100){
        global $conn;

        if(!empty($where)) $where = " AND ".$where;        

        $data = $conn->query("SELECT * FROM $tbl WHERE 1=1 ".$where." ORDER BY id ".$order." LIMIT ".$limit);

        $retorno = [];

        while($row = $data->fetch(PDO::FETCH_OBJ)) {
            $array = [];
            foreach($row as $key=>$value){
                $array[$key] = utf8_encode($value);
            }
            $retorno[] = (object) $array;
        }
        
        return (object) $retorno;
    }

    function dbQuerySingle($tbl, $where, $order = "ASC"){
        global $conn;

        $where = " AND ".$where;
        $data = $conn->query("SELECT * FROM $tbl WHERE 1=1 ".$where." ORDER BY id ".$order." LIMIT 1");
        
        $array = [];
        while($row = $data->fetch(PDO::FETCH_OBJ)) {            
            foreach($row as $key=>$value){
                $array[$key] = utf8_encode($value);
            }            
        }
        
        return (object) $array;
    }

    function getTermoById($id){
        global $conn;
        $lang = 2;

        if($lang == 2){
            $data = $conn->query("SELECT * FROM termos WHERE id = $id AND id_lingua = $lang LIMIT 1");
            //echo "SELECT * FROM termos WHERE id = $id AND id_lingua = $lang LIMIT 1"; exit;
        }else{
            $data = $conn->query("SELECT * FROM termos WHERE id_pai = $id AND id_lingua = $lang LIMIT 1");
        }

        $retorno = [];
        while($row = $data->fetch(PDO::FETCH_OBJ)) {
            $retorno = $row;
        }

        return utf8_encode($retorno->termo);

    }