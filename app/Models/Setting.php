<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'content', 'address','logo', 'favicon', 'facebook', 'instagram', 'phone', 'email', 'created_at', 'updated_at'];

}
