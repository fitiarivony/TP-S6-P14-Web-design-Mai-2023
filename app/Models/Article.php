<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table='article';
    protected $fillable = ['idcategorie','resumee','contenu','titre'];
    
}
