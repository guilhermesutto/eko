<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HomeDestinations;

class HomeDestinations extends MyModel
{
    protected $table = 'home_destinations';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{
        if(empty($data['id'])){
            $data['titulo'] = \TermosHelper::saveTermo($data['titulo']);            
            $data['descricao'] = \TermosHelper::saveTermo($data['descricao']);            
        }else{
            $DadosAntigos = Footer::find($data['id']);
            \TermosHelper::updateTermo($DadosAntigos->titulo, $data['titulo']);            
            \TermosHelper::updateTermo($DadosAntigos->descricao, $data['descricao']);            
        }
        
        if(!empty($data['img'])){            
            $extensao = array_reverse(explode('.', $data['img']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['img']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/about-us/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['img']->getPathName())); 
            $data['img'] = $nomeImagem;                      
        }

		return $data;
    }

    public function get_titulo($obj){        
        return \TermosHelper::getOrInsertTermo($obj['titulo'], $obj['id'], 'HomeDestinations', 'titulo');
    }
    
    public function get_descricao($obj){
        return \TermosHelper::getOrInsertTermo($obj['descricao'], $obj['id'], 'HomeDestinations', 'descricao');
    }
}
