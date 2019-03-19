<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Home;

class Paginas extends MyModel
{
    protected $table = 'paginas';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{

        if(empty($data['id'])){
            $data['titulo'] = \TermosHelper::saveTermo($data['titulo']);
            $data['conteudo'] = \TermosHelper::saveTermo($data['conteudo']);
        }else{
            $DadosAntigos = Paginas::find($data['id']);
            $data['conteudo'] = \TermosHelper::updateTermo($DadosAntigos->conteudo, $data['conteudo']);
            $data['titulo'] = \TermosHelper::updateTermo($DadosAntigos->titulo, $data['titulo']);
        }
        
        if(!empty($data['imagem'])){            
            $extensao = array_reverse(explode('.', $data['imagem']->getClientOriginalName()))[0];
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imagem']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/home/".$nomeImagem;             
                \File::put($imgPath, file_get_contents($data['imagem']->getPathName()));                
            
            $data['imagem'] = "uploads/home/".$nomeImagem;          
        }                
		        
		return $data;
    }
    
    public function get_titulo($obj){        
        return \TermosHelper::getOrInsertTermo($obj['titulo'], $obj['id'], 'Paginas', 'titulo');
    }
    
    public function get_conteudo($obj){
        return \TermosHelper::getOrInsertTermo($obj['conteudo'], $obj['id'], 'Paginas', 'conteudo');
    }
}
