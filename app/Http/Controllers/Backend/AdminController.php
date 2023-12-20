<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin ;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPost;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
class AdminController extends Controller
{

    public function index()
    {
        $posts=Post::all();
        $postCount=$posts->count();

        $categories=Category::all();
        $categoryCount=$categories->count();

        $users=User::all();
        $userCount=$users->count();

        return view('Backend.index',compact('postCount','categoryCount','userCount'));
    }
    public function login()
    {
        return view('Backend.login');
    }


    public function checkLogin(Request $request)
    {

        $input=$request->all();

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
        {
            if(auth()->user()->role=='admin')
            {
                return redirect() -> route('admins.dashboard');

            }else{
                return redirect() -> route('admin.login');

            }
        }
        // return redirect()->back()->with(['error' => 'error logging in']);
    }

    // public function checkLogin(Request $request)
    // {

    //     Request()->validate([
    //         'email' => 'required',
    //         'password' => 'required',

    //     ]);
    //     $remember_me = $request->has('remember_me') ? true : false;

    //     if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
    //     {
    //         return redirect() -> route('admins.dashboard');
    //     }
    //     return redirect()->back()->with(['error' => 'error logging in']);
    // }

    public function showUser(){
        $admins=User::all();
        return view('Backend.adminpage',compact('admins'));
    }

    public function showCategory(){
        $categories=Category::all();
        return view('Backend.category.show',compact('categories'));
    }

    public function storeCategory(){
        $categories=Category::all();
        return view('Backend.category.show',compact('categories'));
    }

    public function editCategory($id){

        $category=Category::findOrFail($id);
        return view('Backend.category.show',compact('category'));
    }

    public function createCategory(Request $request){
        Request()->validate([
            'name'=>'required|max:30',
        ]);
        $category=Category::create([
            "name"=>$request->name,
        ]);
        return view('Backend.category.show')->with('success','Category Updated');
    }

    public function updateCategory(Request $request,$id){
        Request()->validate([
            'name'=>'required|max:30',
        ]);
        $updateCategory=Category::findOrFail($id);
        $updateCategory->update($request->all());


        return view('Backend.category.show')->with('success','Category Updated');
    }

    public function deleteCategory($id){
        Category::findOrFail($id);
        Category::destroy($id);
        return view('Backend.category.show')->with('delete','Category Deleted');
    }

    public function showPost()
    {
        $posts=Post::all();
        return view('Backend.post.show',compact('posts'));
    }

    public function deletePost($id)
    {
        $post=Post::findOrFail($id);
        $path=public_path('assets/images/'.$post->image);
        unlink($path);
        $post->delete();
        return view('Backend.post.show')->with('delete','Post Deleted');
    }


    public function emailViewAll()
    {
        return view('Backend.send_email_all');
    }


    public function storeAllUserEmail(Request $request)
    {

        $users = User::all();
        $details = array();
        $details['greeting'] = $request->greeting;
        $details['body'] = $request->body;
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;

        foreach($users as $user) {
            Notification::send($user, new NewPost($details));
        }



        return redirect()->route('admins.dashboard');
    }
}

