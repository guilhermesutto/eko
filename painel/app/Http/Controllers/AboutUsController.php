<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\AboutUs;


class AboutUsController extends Controller
{
	/**
     * Dashboard de apresentação dos resumos
     *
     * @param  null
     * @return View
     */    

    public function getIndex(){
        return redirect('about/form/1');
    }
    
}