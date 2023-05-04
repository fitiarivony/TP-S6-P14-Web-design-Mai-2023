<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=(new Article())->all();
        return view("listarticle",["articles"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorie=new Categorie();
        return view('createarticle',["categories"=>$categorie->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article=new Article();
        $article->titre=($request->input('titre'));
        $article->resumee=$request->input('resume');
        $article->idcategorie=$request->input('categorie');
        $article->contenu=$request->input('contenu');
        // echo $article;
        $article->save();
        // return
        // Route::redirect( '/articles');
    }
    public function slugtitle($titre){
        return Str::slug($titre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::where("id",$id)->get()->first();
        $article->slugtitre=$this->slugtitle($article->titre);
        return view('updatearticle',["article"=>$article,"categories"=>(new Categorie())->all()]);
        //
    }

    public function showArticle($id)
    {
        //
        if(!Cache::has('showarticle-'.$id)){
            $article=Article::where("id",$id)->get()->first();
            $article->slugtitre=$this->slugtitle($article->titre);
            $view=view('showarticle',["article"=>$article])->render();
            Cache::put('showarticle-'.$id, $view);

        }

        return Cache::get('showarticle-'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $article=Article::where("id",$request->input('id'))->get()->first();
        $article->titre=($request->input('titre'));
        $article->resumee=$request->input('resume');
        $article->idcategorie=$request->input('categorie');
        $article->contenu=$request->input('contenu');
        // echo $article;
        $article->update();
        $article->slugtitre=$this->slugtitle($article->titre);
        $view=view('showarticle',["article"=>$article])->render();

        if(Cache::has('showarticle-'.$request->input('id'))){

            Cache::forget('showarticle-'.$request->input('id'));
        }
        Cache::put('showarticle-'.$request->input('id'), $view);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
