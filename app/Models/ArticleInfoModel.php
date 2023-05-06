<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleInfoModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $table='article_info';

}
