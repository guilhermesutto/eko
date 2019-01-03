<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends MyModel
{
    protected $table = 'usuarios';
    public    $seed  = 'nome|sobrenome';
    public    $deletar = true;

    const CREATED_AT = 'criado_em';
	const UPDATED_AT = 'editado_em';

    public function bind($data)
	{
		if(isset($data['password']) && $data['password']){
            //$data['password'] = \Hash::make($data['password']);
            $data['password'] = $data['password'];
		} else {
            unset($data['password']);
        }		

		return $data;
	}    

    public function get_superadmin($obj)
    {
    	if($obj->superadmin){
            return '<span class="label label-success">Sim</span>';
        } else {
            return '<span class="label label-danger">Não</span>';
        }
    }

    
}
