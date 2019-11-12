<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contato;

class Contato extends MyModel
{
    protected $table = 'contato';
    public    $seed  = 'nome';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
		return $data;
    }    
}
