<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Taxas;

class Taxas extends MyModel
{
    protected $table = 'taxas';
    public    $seed  = 'taxa';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
		return $data;
    }
}
