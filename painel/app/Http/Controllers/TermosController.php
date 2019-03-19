<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Termos;


class TermosController extends Controller
{
	public function getTermoById(){
        $campos = json_decode($_POST['campos']);
        $retorno = [];

        foreach($campos as $key=>$value){           
            $retorno[$key] = \TermosHelper::getTermo($value);
        }

        echo json_encode($retorno);
        
    }

    public function getTermo(){        
        $retorno = \TermosHelper::getTermo($_POST['id']);
        echo $retorno;
    }

    public function getTermoByLang(){
        $retorno = \TermosHelper::getTermo($_POST['id'], $_POST['lang']);
        echo $retorno;
    }

    public function saveTermoByLang(){
        if($_POST['lang'] == 2){
            $save = \TermosHelper::updateTermo($_POST['id'], $_POST['texto']);            
        }else{
            $Termo = Termos::where(["id_pai" => $_POST['id'], "id_lingua" => $_POST['lang']])->first();
            if(!empty($Termo->id)){
                $save = \TermosHelper::updateTermo($Termo->id, $_POST['texto']);
            }else{
                $save = \TermosHelper::saveTermo($_POST['texto'], $_POST['lang'], $_POST['id']);            
            }            
        }    
    }
    
}