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
        if(!empty($data['imagem'])){            
            $extensao = array_reverse(explode('.', $data['imagem']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imagem']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/depoimentos/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['imagem']->getPathName())); 
            $data['imagem'] = $nomeImagem;                      
        }  
		return $data;
    }
}
