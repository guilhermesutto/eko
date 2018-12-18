<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Home;

class Home extends MyModel
{
    protected $table = 'home';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{
        $Model = Home::find(1);
        $json = array();
        if($Model){
            $json = json_decode($Model->counteudo, true);
        }
        if(!empty($data['Imagens'][0]['imagem'][0])){
            foreach($data['Imagens'][0]['imagem'] as $key=>$value){
                $extensao = explode('.', $value->getClientOriginalName())[1];
                $nomeImagem = md5(date('Y-m-d H:i:s:')."-".$value->getClientOriginalName()).".".$extensao;                      
                $imgPath = base_path()."/public/uploads/home/".$nomeImagem;             
                 \File::put($imgPath, file_get_contents($value->getPathName()));                
                
                $json['imgBanner'][] = "uploads/home/".$nomeImagem;
            }
            $dataModel = json_encode($json);
            $Model->conteudo = $dataModel;
            $Model->save();            
        }
		return $data;
    }    
}
