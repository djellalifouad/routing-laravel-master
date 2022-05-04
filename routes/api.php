<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// redirect routes
Route::redirect('/here','/there',301);
Route::get('/there',function() {
    return 'test2';
});
// routes parameters with condition
// if id like [0-9]+ return 200 status code else will return 404 status code
/*
Route::get('users/{id}',function($id) {
return 'users/' . $id;
})->where(['id' => '[0-9]+']);
*/
Route::get('users/{id}', function ($id) {
    return 'users/' . $id;
});
Route::get('categories/{categories}',function($categories) {
    return 'categories' . $categories;
})->whereIn('categories' , ['orange','fraise']);
// allow / in the search parameters
Route::get('search/{search?}',function($search = null){
return 'you search for' . $search;
})->where('search', '.*');

Route::name('admin.')->group(function () {
    Route::get('/deleteAccount', function () {
        return 'from name';
    });
});
Route::prefix('admin')->group(function () {
    Route::get('deleteAccount', function () {
        return 'from prefix';
    });
});
