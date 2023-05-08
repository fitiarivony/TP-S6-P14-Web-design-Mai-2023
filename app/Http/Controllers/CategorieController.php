<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!session('admin')) {
           abort(404);
        }
        $paginate=3;
        $data=Categorie::paginate($paginate);
        $style=array(
            0=>"fadeInLeft",
            1=>"fadeInUp",
            2=>"fadeInRight",
        );
        return view("categorie.liste",["categories"=>$data,"styles"=>$style,"title"=>"Categories"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        if (!session('admin')) {
            abort(404);
         }
        $categorie=new Categorie();
        $categorie->nomcategorie=$request->input('nomcategorie');
        $categorie->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!session('admin')) {
            abort(512,"You're not an administrator");
        }
        $categorie=Categorie::where("id",$id)->get()->first();
        return view('categorie.update',['categorie'=>$categorie,"title"=>"Update an article"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if (!session('admin')) {
            abort(512,"You're not an administrator");
         }
        $categorie=Categorie::where("id",$request->input('id'))->get()->first();

        $categorie->nomcategorie=$request->input('nomcategorie');
        $categorie->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        if (!session('admin')) {
            abort(404,"You're not an administrator");
         }
        $article=Categorie::where("id",$id)->get()->first();
        $article->delete();
        return redirect("/");
    }
}
