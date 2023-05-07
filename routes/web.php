<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Models\MymeType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
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

Route::get('/',[ArticleController::class,"index"]);


//Specifique
Route::get('/create-article',[ArticleController::class,"create"])->name("essai");
Route::post('/article',[ArticleController::class,"store"]);
Route::get('/article-{id}-{slug}',[ArticleController::class,"showArticle"])->where('slug', '([A-Za-z0-9\-]+)');;
Route::get('/articles',[ArticleController::class,"index"]);
Route::get('/update-article-{id}-{slug}',[ArticleController::class,"show"])->where('slug', '([A-Za-z0-9\-]+)');;
Route::post('/updatearticle',[ArticleController::class,"update"]);
Route::get('/delete-article-{id}',[ArticleController::class,"delete"]);


Route::prefix('admin')->group(function () {
    Route::view('/login-admin', 'admin.login');
    Route::post('/login-admin',[AdminController::class,"login"]);
    Route::get('/deconnexion',[AdminController::class,"deconnexion"]);
});

Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
    Route::get('/stats/{any}', function ($mylink) {
        $path = 'my-vendor/' . $mylink;

        // $path=str_replace('/','\\',$path);
        if (File::exists(($path))) {
            $contentType=(new MymeType())->mime_type($path);
            $response = new Illuminate\Http\Response(File::get(($path)), 200);
            $response->header('Content-Type', $contentType);
            return $response;
        } else {
            abort(404);
        }
    })->where('any', '.*');
});


Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
    Route::get('/sary/{any}', function ($mylink) {
        $path ='storage/app/public/images/' .$mylink;

        // $path=str_replace('/','\\',$path);
        if (File::exists(storage_path('app/' . $path))) {
            $contentType=(new MymeType())->mime_type($path);
            $response = new Illuminate\Http\Response(File::get(storage_path('app/' . $path)), 200);
            $response->header('Content-Type', $contentType);
            return $response;
        } else {
            abort(404);
        }
    })->where('any', '.*');
});


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/image-upload', 'ImageUploadController@index')->name('image-upload.index');
    Route::post('/image-upload', 'ImageUploadController@upload')->name('image-upload.post');
});

//test paginate
