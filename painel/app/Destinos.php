<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Destinos;
use App\Taxas;

class Destinos extends MyModel
{
    protected $table = 'destinos';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{
        $data['projetos'] = implode(",", $data['projetos']);

        if(empty($data['id'])){
            $data['descricaoTaxa'] = \TermosHelper::saveTermo($data['descricaoTaxa']);            
            $data['descricao'] = \TermosHelper::saveTermo($data['descricao']);            
        }else{
            $DadosAntigos = Footer::find($data['id']);
            \TermosHelper::updateTermo($DadosAntigos->titulo, $data['titulo']);            
            \TermosHelper::updateTermo($DadosAntigos->descricao, $data['descricao']);            
        }
        
        if(!empty($data['bandeiraPais'])){            
            $extensao = array_reverse(explode('.', $data['bandeiraPais']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['bandeiraPais']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/destinos/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['bandeiraPais']->getPathName())); 
            $data['bandeiraPais'] = $nomeImagem;                      
        }

        if(!empty($data['imagem'])){            
            $extensao = array_reverse(explode('.', $data['imagem']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imagem']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/destinos/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['imagem']->getPathName())); 
            $data['imagem'] = $nomeImagem;                      
        }
        
		return $data;
    }


    public function afterSave($Model, $data){
        $Taxas = Taxas::where("id_destino", $Model->id)->delete();

        foreach($data['tempo'] as $key=>$value){
            $taxa = new Taxas;
            $taxa->id_destino = $Model->id;
            $taxa->tempo = $value;
            $taxa->taxa = $data['taxa'][$key];
            $taxa->save();
        }
    }

    public function taxas(){
        return $this->hasMany('App\Taxas','id_destino');
    }

    public function get_descricaoTaxa($obj){        
        return \TermosHelper::getOrInsertTermo($obj['descricaoTaxa'], $obj['id'], 'Destinos', 'descricaoTaxa');
    }
    
    public function get_descricao($obj){
        return \TermosHelper::getOrInsertTermo($obj['descricao'], $obj['id'], 'Destinos', 'descricao');
    }

}
