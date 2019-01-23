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
		return $data;
    }
}
