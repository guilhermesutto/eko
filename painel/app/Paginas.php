<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Home;

class Paginas extends MyModel
{
    protected $table = 'paginas';
    public    $seed  = 'id';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
		return $data;
    }    
}
