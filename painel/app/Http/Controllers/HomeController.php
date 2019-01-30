<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Home;
use App\HomeProjetos;
use App\HomeDepoimentos;


class HomeController extends Controller
{
	/**
     * Dashboard de apresentação dos resumos
     *
     * @param  null
     * @return View
     */

    public function dash()
    {
        return view('dashboard')            
            ->with('title','Dashboard');
    }

    public function getIndex(){
        return redirect('home-form/form/1');
    }

    public function banner($id=1){
        return parent::getForm($id);
    }

    public function frontGetBanner(){
        return response()->json(Home::find(1));
    }

    public function frontGetProjects(){
        return response()->json(HomeProjetos::where('ativo',1)->get());
    }

    public function frontGetTestimonals(){
        return response()->json(HomeDepoimentos::where('ativo',1)->limit(10)->get());
    }
    
}