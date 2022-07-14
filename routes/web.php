<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuitarController;

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

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/contact', [HomeController::class,'contact'])->name('home.contact');

//all routes automatically named to based on /guitars
Route::resource('guitars', GuitarController::class);

Route::get('/store/{category?}/{item?}', function($category = null, $item = null){
    //sample url being displayed /store/category(optional)/drum(optional)
    if (isset($category)){
        if (isset($item)){
            return "you are viewing the store for {$category} for {$item}";
        }
        return "you are viewing the store for {$category}";
    }
    return 'you are viewing all instruments';
});

/*Route::get('/store', function(){
    //smaple url being displayed /store?category=drum
    $category = request('category');

    if (isset($category)){
        return 'you are viewing the store for ' . strip_tags($category);
    }
    return 'you are viewing all instruments';
});*/