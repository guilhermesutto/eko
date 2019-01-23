<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rodape;


class FooterController extends Controller
{	
    public function getIndex(){
        return redirect('footer/form/1');
    }
} 