<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Models\Article;
use App\Models\ArticleInfoModel;
use App\Models\ArticleSaryModel;
use App\Models\Categorie;
use App\Models\SaryModel;
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
    public function index(Request $request)
    {   $paginate=3;
        if($request->input('nbpaginate')!=null){
            $paginate=$request->input('nbpaginate');
        }
        $data=ArticleSaryModel::paginate($paginate);
        $style=array(
            0=>"fadeInLeft",
            1=>"fadeInUp",
            2=>"fadeInRight",
        );
        return view("listarticle",["articles"=>$data,"styles"=>$style]);
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
    public function store(Request $request,ImageUploadRequest $requestpic)
    {
        //
        $article=new Article();
        $article->titre=($request->input('titre'));
        $article->resumee=$request->input('resume');
        $article->idcategorie=$request->input('categorie');
        $article->contenu=$request->input('contenu');
        // echo $article;
        $sary=$this->upload($requestpic);
        $article->idsary=$sary->id;
        $article->save();
        // return
        // return redirect('/');
        // Route::redirect( '/articles');
    }

    public function upload(ImageUploadRequest $request)
    {
        $filename = time() . '.' . $request->image->extension();
        $publicPath=base_path('public');
        if (!is_writable($publicPath.'/my-vendor/images')) {
            dd('The directory   is not writable');
        }else dd("writable");
        $request->image->move(($publicPath.'/my-vendor/images'), $filename);
        $pic=new SaryModel();
        $pic->link=$filename;
        $pic->save();
        $sary=SaryModel::orderBy('id','desc')->limit(1)->get()->first();
        // save uploaded image filename here to your database

        return $sary;
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
            $article=ArticleInfoModel::where("id",$id)->get()->first();
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
    public function update(Request $request,ImageUploadRequest $requestpic)
    {

        $article=Article::where("id",$request->input('id'))->get()->first();
        $article->titre=($request->input('titre'));
        $article->resumee=$request->input('resume');
        $article->idcategorie=$request->input('categorie');
        $article->contenu=$request->input('contenu');
        if($requestpic->image!=null){
           $sary=$this->upload($requestpic);
            $article->idsary=$sary->id;
        }
        // echo $article;
        $article->update();
        $article->slugtitre=$this->slugtitle($article->titre);
        $view=view('showarticle',["article"=>$article])->render();

        if(Cache::has('showarticle-'.$request->input('id'))){

            Cache::forget('showarticle-'.$request->input('id'));
        }
        Cache::put('showarticle-'.$request->input('id'), $view);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $article=Article::where("id",$id)->get()->first();
        $article->delete();
        return redirect("/");
    }

}
