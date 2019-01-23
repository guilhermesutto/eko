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
        if(!empty($data['img'])){            
            $extensao = array_reverse(explode('.', $data['img']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['img']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/about-us/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['img']->getPathName())); 
            $data['img'] = $nomeImagem;                      
        }

		return $data;
    }
}
