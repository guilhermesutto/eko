<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apply;

class Apply extends MyModel
{
    protected $table = 'apply';
    public    $seed  = 'name';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
		return $data;
    }    
}
