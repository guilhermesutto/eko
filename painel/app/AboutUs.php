<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends MyModel
{
    protected $table = 'about_us';
    public    $seed  = 'id';   
    public    $timestamps = false;

    public function bind($data)
	{
        
        if(!empty($data['imgTitulo'])){            
            $extensao = array_reverse(explode('.', $data['imgTitulo']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imgTitulo']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/about-us/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['imgTitulo']->getPathName())); 
            $data['imgTitulo'] = $nomeImagem;                      
        }

        if(!empty($data['imgValor'])){            
            $extensao = array_reverse(explode('.', $data['imgValor']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imgValor']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/about-us/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['imgValor']->getPathName())); 
            $data['imgValor'] = $nomeImagem;                      
        }

        if(!empty($data['imgMissao'])){            
            $extensao = array_reverse(explode('.', $data['imgMissao']->getClientOriginalName()))[0];            
            $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$data['imgMissao']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/about-us/".$nomeImagem;             
            \File::put($imgPath, file_get_contents($data['imgMissao']->getPathName())); 
            $data['imgMissao'] = $nomeImagem;                      
        }

		return $data;
    }    
}
