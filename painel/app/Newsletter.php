<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Newsletter;

class Newsletter extends MyModel
{
    protected $table = 'newsletter';
    public    $seed  = 'email';
    public    $deletar = true;
    public    $timestamps = false;

    public function bind($data)
	{        
		return $data;
    }    
}
