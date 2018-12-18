<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends MyModel
{
    protected $table = 'grupos_usuarios';
    public    $seed  = 'nome';
    public    $deletar = true;

    const CREATED_AT = 'criado_em';
	const UPDATED_AT = 'editado_em';

    public function bind($data)
	{
		return $data;
	}

    
}
