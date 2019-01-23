<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HomeProjetos;

class HomeProjetos extends MyModel
{
    protected $table = 'home_projetos';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{          
		return $data;
    }
}
