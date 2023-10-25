<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('Home.index');
});


// Route::get('/about', function () {
//     return view('items.article.about-us')->name('about');
// });


Route::controller(HomeController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/people', 'people')->name('people');
    Route::get('/vision', 'vision')->name('vision');
    Route::get('/what', 'we_do')->name('what');
    Route::get('/catalog', 'catalog')->name('catalog');

});

