<?php
use App\Home;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post("add-news", function(){
    print_r($_POST); exit;
});
Route::post('home-deletar-imagem', function(){
    
    $Model = Home::find(1);
    $id = $_POST['id'];
    $Conteudo = json_decode($Model->conteudo, true);
    $Imagens = $Conteudo['imgBanner'];

    unset($Imagens[$id]);
    unset($Conteudo['imgBanner']);

    $Conteudo['imgBanner'] = $Imagens;

    $Model->conteudo = json_encode($Conteudo);
    $Model->save();

    return response()->json(["sucesso" => "true"]);
});

Route::get('/', function(){
    return redirect('login');
});

Route::get('/logout', function(){
    unset( $_SESSION["User"] );
    return redirect('login');
});

Route::post('getTermoById', "TermosController@getTermoById");
Route::post('getTermoByLang', "TermosController@getTermoByLang");
Route::post('getTermo', "TermosController@getTermo");
Route::post('saveTermoByLang', "TermosController@saveTermoByLang");

Route::post('/login', "Controller@login");

Route::get('/login', "Controller@login");

Route::get('home', "HomeController@dash");

Route::get('teste', "HomeController@getIndex");

$Areas['login']       = 'UsuariosController';
$Areas['dashboard']   = 'DashboardController';

foreach(App\Areas::where('ativo',1)->get() AS $Area){
    if($Area->url){
        Route::post($Area->url, $Area->controller.'Controller@getIndex');
        Route::post($Area->url.'/form', $Area->controller.'Controller@getForm');
        Route::post($Area->url.'/form/{id}', $Area->controller.'Controller@getForm');

        Route::get($Area->url.'/delete/{id}', $Area->controller.'Controller@getDelete');

        Route::get($Area->url, $Area->controller.'Controller@getIndex');
        Route::get($Area->url.'/form', $Area->controller.'Controller@getForm');
        Route::get($Area->url.'/form/{id}', $Area->controller.'Controller@getForm');
    }
}

Route::post("home-banner", "HomeController@banner");
Route::get("home-banner", "HomeController@banner");
Route::post("home-banner/{id}", "HomeController@banner");
Route::get("home-banner/{id}", "HomeController@banner");

