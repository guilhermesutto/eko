<?php

use Illuminate\Http\Request;
use App\Newsletter;
use App\Contato;
use App\Apply;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("add-news", function(){
    $news = new Newsletter;
    $news->email = $_POST['email'];
    $news->enviado = 0;
    $news->save();
    
    return response()->json(["sucesso", true]);
});

Route::post("add-contato", function(){
    $contato = new Contato;
    $contato->nome = $_POST['name']." ".$_POST['lastname'];
    $contato->email = $_POST['email'];
    $contato->telefone = $_POST['phone'];
    $contato->mensagem = $_POST['text'];
    $contato->save();
    
    return response()->json(["sucesso", true]);
});

Route::post("add-apply", function(){
    $contato = new Apply;
    $contato->name          = $_POST['name']." ".$_POST['lastname'];
    $contato->email         = $_POST['email'];
    $contato->phone      = $_POST['phone'];
    $contato->project       = $_POST['project'];
    $contato->destination   = $_POST['destination'];
    $contato->nickname      = $_POST['nickname'];
    $contato->genre         = $_POST['genre'];
    $contato->nationality   = $_POST['nationality'];
    $contato->date          = $_POST['date'];
    $contato->how           = $_POST['how'];
    $contato->save();
    
    return response()->json(["sucesso", true]);
});

Route::get("home-banner", "HomeController@frontGetBanner");
Route::get("home-projects", "HomeController@frontGetProjects");
Route::get("home-testimonals", "HomeController@frontGetTestimonals");
