<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory   ;
    protected $fillable = ['id', 'category','image','title', 'content' , 'short_desc' ,'user_id','user_name', 'created_at', 'updated_at', ];

}
