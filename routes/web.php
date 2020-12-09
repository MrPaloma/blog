<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articulo;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/ruta/{id}/{string}', function ($id, $string) {

//     return "ruta n° $id y su nombre es $string";

// })->where('string','[a-zA-Z]+');


// Las rutas en laravel 8 cambiaron, Se debe especificar en que carpeta
// Se encuentra dicho controlador

// Route::get('/inicio', 'App\Http\Controllers\EjemploController@inicio');

// Route::get('/inicio3/{id}', 'App\Http\Controllers\Ejemplo3Controller@index');

// Route::get('/', 'App\Http\Controllers\PaginaController@inicio');

// Route::get('/ElPepe', 'App\Http\Controllers\PaginaController@elpepe');

// Route::resource('posts', 'App\Http\Controllers\Ejemplo3Controller');


Route::resource('bulma', 'App\Http\Controllers\BulmaController');

Route::get('/leer', function(){
    $articulos = Articulo::min('precio');

    return $articulos;
});

Route::get('/insertar', function(){

    $articulos = new Articulo;

    $articulos->nombre_articulo = 'Consolador';

    $articulos->precio = 39.99;

    $articulos->pais_origen = 'Japon';

    $articulos->observaciones = 'Sin observaciones';

    $articulos->seccion = 'Sex Shop';

    $articulos->save();
});


Route::get('/actualizar', function(){

    // $articulos = Articulo::find(3);

    // $articulos->observaciones = 'Sin observaciones';

    // $articulos->save();

    Articulo::where('seccion', 'Prenda')->where('pais_origen', 'Perú')->update(['precio'=>99.99]);
});


Route::get('/borrar', function(){

    $articulo = Articulo::find(8);

    $articulo->delete();

});

Route::get('/create', function(){

    Articulo::create(['nombre_articulo' => 'Impresora', 
                        'precio' => 269.99, 
                        'pais_origen'=>'China', 
                        'observaciones'=>'Sin observaciones', 
                        'seccion'=>'Tecnologia']);

    
});


Route::get('/softDelete', function(){

    Articulo::find(10)->delete();

    
});

