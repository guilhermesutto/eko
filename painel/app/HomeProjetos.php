<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HomeProjetos;

class HomeProjetos extends MyModel
{
    protected $table = 'home_projetos';
    public    $seed  = 'titulo';
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

		return $data;
    }

    public function get_titulo($obj){        
        return \TermosHelper::getOrInsertTermo($obj['titulo'], $obj['id'], 'HomeProjetos', 'titulo');
    }
    
    public function get_descricao($obj){
        return \TermosHelper::getOrInsertTermo($obj['descricao'], $obj['id'], 'HomeProjetos', 'descricao');
    }
}
