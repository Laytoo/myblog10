<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{

    use UploadImage;
    public function index()
    {

        $postLeft=Post::all()->take(2);
        $postMiddle=Post::take(1)->orderBy('id','desc')->get();
        $postRight=Post::take(2)->orderBy('title','desc')->get();

        $postBusinees=Post::where('category','Techno')->take(2)->get();
        $postBusineesRight=Post::where('category','Techno')->take(3)->orderBy('title','desc')->get();

        // $postnormal=Post::take(4)->orderBy('category','desc')->get();
        $postnormal=Post::orderBy('category','desc')->paginate(2);



        return view('Frontend.index',compact('postLeft','postMiddle','postRight','postBusinees','postBusineesRight','postnormal'));
    }

    public function single($id)
    {
        $singlePost=Post::findOrFail($id);
        $postPop=Post::take(3)->orderBy('id','desc')->get();
        $user=User::find($singlePost->user_id);

        $categories=DB::table('categories')
        ->join('posts','posts.category','=','categories.title')
        ->select('categories.title AS title','categories.id AS id','posts.user_id AS user_id',DB::raw('COUNT(posts.category) AS totale'))
        ->groupBy('posts.category')->get();

        $moreBlogs=Post::where('category',$singlePost->category)
        ->where('id','!=',$id)->take(4)->get();

        return view('Frontend.single_post',compact('singlePost','user','postPop','categories','moreBlogs'));
    }

    public function createPost()
    {
        $categories=Category::all();

        if(auth()->user())
        {
            return view('Frontend.create-post',compact('categories'));
        }
        else
            {
                return abort('404');
            }

    }

    public function storePost(Request $request)
    {


        $insertPost=Post::create([
            "title"=>$request->title,
            "category"=>$request->category,
            "user_id"=>Auth::user()->id,
            "user_name"=>Auth::user()->name,
            "description"=>$request->description,
        ]);

        if ($request->has('image')) {
            $insertPost->update(['image'=>$this->upload($request->image)]);
         }

         return redirect()->route('userpost.create')->with('success','Post Created Successfully');
    }

    public function DeletePost($id)
    {

        // $postDelete=Post::find($id);
        // $image = Str::after($postDelete->image, 'assets/images/');
        // $image = public_path('assets/images/' . $image);
        // unlink($image); //delete from folder

        $postDelete=Post::find($id);
        $path=public_path('assets/images'.$postDelete->image);
        unlink($path);
        $postDelete->forceDelete();


        return redirect()->route('posts')->with('success','Post Deleted Successfully');
    }

    public function EditPost($id)
    {
        $editPost=Post::findOrFail($id);
        $categories=Category::all();

        if(auth()->user())
        {
            if(Auth::user()->id == $editPost->user_id)
            {
                return view('Frontend.edit-post',compact('editPost','categories'));

            }
            else
            {
                return abort('404');
            }
        }

    }

    public function UpdatePost(Request $request,$id)
    {
        $updatePost=Post::findOrFail($id);

        Request()->validate([
            'title' => 'required|max:100',
            'category' => 'required',
            'content' => 'required',

        ]);
            // if ($request->has('image')) {
            //     $imagePath=$this->updateImage($request,'image','assets/images',$updatePost->image);
            //     Post::where('id',$id)
            //     ->update(['image'=>$imagePath]);
            // }
            // $updatePost->update($request->except('image'));
            $updatePost->update($request->all());



            if($updatePost)
            {
                return redirect()->route('post.single',$updatePost->id.'')->with('success','Post Updated Successfully');
                // return redirect()->back()->with('success','Post Updated Successfully');
            }

    }
}
