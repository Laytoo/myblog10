<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use  HasFactory ;
    protected $fillable = [ 'id', 'image', 'title', 'content', 'created_at', 'updated_at'];


}
