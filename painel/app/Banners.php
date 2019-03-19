<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Banners;

class Banners extends MyModel
{
    protected $table = 'banners';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
        if(!empty($data['banner'])){            
            $extensao = array_reverse(explode('.', $data['banner']->getClientOriginalName()))[0];            
            $nomebanner = md5(date('Y-m-d H:i:s:')."-".$data['banner']->getClientOriginalName()).".".$extensao;                      
            $imgPath = base_path()."/public/uploads/about-us/".$nomebanner;             
            \File::put($imgPath, file_get_contents($data['banner']->getPathName())); 
            $data['banner'] = $nomebanner;                      
        }
        
		return $data;
    }


    public function afterSave($Model, $data){
        return true;
    }    

}
