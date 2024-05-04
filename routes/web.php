<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    //    $codigo = $request->query('query');
    //    $query = Activo::query();
    //    if ($codigo) {
    //        $query->where('codigo', 'LIKE', "%$codigo%");
    //    }
    //    $activos = $query->orderBy('id', 'asc')->get();
    $activos = App\Models\Activo::orderBy('id', 'asc')->get();
    return view('welcome', compact('activos'));
});
