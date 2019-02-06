<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Paises;

class Paises extends MyModel
{
    protected $table = 'paises';
    public    $seed  = 'SL_NOME';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{
		return $data;
    }
}
