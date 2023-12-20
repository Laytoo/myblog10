<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showCategory($name)
    {
        $categories=DB::table('categories')
        ->join('posts','posts.category','=','categories.title')
        ->select('categories.title AS title','categories.id AS id','posts.user_id AS user_id',DB::raw('COUNT(posts.category) AS totale'))
        ->groupBy('posts.category')->get();

        $postPop=Post::take(3)->orderBy('id','desc')->get();

        $posts=Post::where('category',$name)->take(4)
        ->orderBy('created_at','desc')->get();
        return view('Frontend.category',compact('posts','postPop','categories'));
    }
}
