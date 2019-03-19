<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Termos;

class Termos extends MyModel
{
    protected $table = 'termos';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{          
		return $data;
    }
}
