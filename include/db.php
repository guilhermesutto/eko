<?php
    $host = "167.99.14.129";
    $dbName = "eko_alliance";
    $username = "eko";
    $password = "webshark";    

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    function dbQuery($tbl, $where, $order = "ASC", $limit = 100){
        global $conn;

        $where = " AND ".$where;
        $data = $conn->query("SELECT * FROM $tbl WHERE 1=1 ".$where." ORDER BY id ".$order." LIMIT ".$limit);

        $retorno = [];

        while($row = $data->fetch(PDO::FETCH_OBJ)) {
            $array = [];
            foreach($row as $key=>$value){
                $array[$key] = $value;
            }
            $retorno[] = $array;
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
                $array[$key] = $value;
            }            
        }
        
        return (object) $array;
    }