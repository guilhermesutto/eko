<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Linguas;

class Linguas extends MyModel
{
    protected $table = 'linguas';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{          
		return $data;
    }
}
