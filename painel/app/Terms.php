<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Terms;

class Terms extends MyModel
{
    protected $table = 'terms';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{          
		return $data;
    }

    public function get_termo($obj){        
        return substr($obj->termo, 0, 100);
    }
}
