<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table='administrateur';
    protected $guarded=[];

    public function login($array)
    {

        $query=$this::where('identifiant',$array['email'])->where('mdp',sha1($array['mdp']));
        // dd($query);
        if ($query->count()>0) {
            return $query->get()->first()->id;
        }
        return 0;
    }

    public function __construct()
    {
        parent::__construct();
    }

}
