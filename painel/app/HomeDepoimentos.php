<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HomeDepoimentos;

class HomeDepoimentos extends MyModel
{
    protected $table = 'home_depoimentos';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
        if(empty($data['id'])){
            $data['depoimento'] = \TermosHelper::saveTermo($data['depoimento']);            
            $data['descricao'] = \TermosHelper::saveTermo($data['descricao']);            
        }else{
            $DadosAntigos = self::find($data['id']);
            $data['depoimento'] = \TermosHelper::updateTermo($DadosAntigos->depoimento, $data['depoimento']);            
            $data['descricao'] = \TermosHelper::updateTermo($DadosAntigos->descricao, $data['descricao']);            
        }
        
        if(!empty($data['imagem'])){            
            $extensao = array_reverse(explode('.', $data['imagem']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imagem']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/depoimentos/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['imagem']->getPathName())); 
            $data['imagem'] = $nomeImagem;                      
        }  
		return $data;
    }

    public function get_depoimento($obj){        
        return \TermosHelper::getOrInsertTermo($obj['depoimento'], $obj['id'], 'HomeDepoimentos', 'depoimento');
    }
    
    public function get_descricao($obj){
        return \TermosHelper::getOrInsertTermo($obj['descricao'], $obj['id'], 'HomeDepoimentos', 'descricao');
    }
}
