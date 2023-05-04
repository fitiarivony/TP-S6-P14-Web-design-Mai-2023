<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class General extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nomtable)
    {
        //
        $class="App\Models\\".$nomtable;
        $instance=new $class();
        $url='list'.$nomtable;
        // echo "hereee";
        $data=$instance->all();
        return view($url,["articles"=>$data]);

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
    public function store(Request $request,$nomtable)
    {
        //
        $class="App\Models\\".$nomtable;
        $instance=new $class();
        $content=$request->getContent();
        $table=$content;
        if (is_array($table)) {
            $liste=json_decode($content, true);
            $this->insertArray($liste,$instance);
        }else{

            // $object=json_decode($content, true);
            $this->insertObject($content,$instance);
        }
        return view('welcome');
    }
    public function insertArray($table,$instance){
        for ($i=0; $i < count($table); $i++) {
            $this->insertObject($table[$i],$instance);
        }
    }
    public function insertObject($object,$instance){
        foreach ($object as $key => $value) {

            $instance->$key=$value;
       }
        // $instance;
      $this->slugtitle($object);
        //  $instance::create($object);

    }
    public function slugtitle($object){

        if($object['titre']!=null)$object['titre']=Str::slug($object['titre']);
        echo $object['titre'];
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
    public function login(Request $request,$nomtable){
        $parameters=$request->query->all()["data"];
        $parameters=json_decode($parameters);
        $class="App\Models\\".$nomtable;
        $instance=new $class();
        $admins=null;
        foreach ($parameters as $key => $value) {
            if($admins==null)$admins=$instance::where($key,$value);
            else $admins=$admins->where($key,$value);
        }
         $cnt=$admins->count();

        if($cnt==0)
            return json_encode(array("etat"=>false));
        else
        	return json_encode(array("etat"=>true, "data"=>$admins->get()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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



}
