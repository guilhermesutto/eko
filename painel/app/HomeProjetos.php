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
		return $data;
    }
}