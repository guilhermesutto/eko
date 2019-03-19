<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Footer;

class Footer extends MyModel
{
    protected $table = 'footer';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{
        if(empty($data['id'])){
            $data['texto'] = \TermosHelper::saveTermo($data['texto']);            
        }else{
            $DadosAntigos = Footer::find($data['id']);
            \TermosHelper::updateTermo($DadosAntigos->texto, $data['texto']);            
        }

		return $data;
    }
}
