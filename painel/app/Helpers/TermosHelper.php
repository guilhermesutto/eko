<?php
/*
|--------------------------------------------------------------------------
| TermosHelper
|--------------------------------------------------------------------------
|
| Faz a dinâmica da multilinguagem
|
*/

use App\Termos;
use App\Linguas;

class TermosHelper
{

    public static function saveTermo($termo, $idLingua = 2, $idPai = null){

        $Termo = new Termos;
        $Termo->id_lingua = $idLingua;
        $Termo->termo = $termo;
        $Termo->id_pai = $idPai;

        if($Termo->save()){
            return $Termo->id;
        }
        

    }

    public static function getTermo($id, $idLingua = 2){

        if($idLingua == 2){            
            $Termo = Termos::find($id);
            if($Termo)
                return $Termo->termo;            
        }else{
            $Termo = Termos::where(["id_pai" => $id, "id_lingua" => $idLingua])->get();
            $retorno = "";
            foreach($Termo as $termo){
                $retorno = $termo->termo;
            }

            return $retorno;
        }

    }

    public static function getOrInsertTermo($id, $idRegistro, $model, $campo, $idLingua = 2){

        if($idLingua == 2){            
            $Termo = Termos::find($id);
            if($Termo)
                return $Termo->termo;
            else{
                $Termo = new Termos;
                $Termo->id_lingua = $idLingua;
                $Termo->termo = $id;
                $Termo->id_pai = null;
                $Termo->save();

                $Model = app("App\\$model")->find($idRegistro);               
                if($Model){
                    $Model->$campo = $Termo->id;
                    $Model->save();
                }    

                return $id;
            }
        }else{
            $Termo = Termos::where(["id_pai" => $id, "id_lingua" => $idLingua])->get();
            $retorno = "";
            foreach($Termo as $termo){
                $retorno = $termo->termo;
            }

            return $retorno;
        }

    }

    public static function updateTermo($id, $termo){
        $Model = Termos::find($id);
        $Model->termo = $termo;
        $Model->save();
        
        return $id;
    }
	
}
