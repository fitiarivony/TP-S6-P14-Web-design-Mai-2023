<?php

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
Route::get('/update-article-{id}',[ArticleController::class,"show"]);
Route::post('/updatearticle',[ArticleController::class,"update"]);


Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
    Route::get('/stats/{any}', function ($mylink) {

        $path = 'vendor/' . $mylink;

        $path=str_replace('/','\\',$path);
        dd(public_path($path));
        if (File::exists(public_path($path))) {
            $contentType=(new MymeType())->mime_type($path);
            $response = new Illuminate\Http\Response(File::get(public_path($path)), 200);
            $response->header('Content-Type', $contentType);
            dd("Exist");
            return $response;
        } else {
            // dd("not exist");
            abort(404);
        }
    })->where('any', '.*');
});

