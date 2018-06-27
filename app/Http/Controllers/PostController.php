<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic  as Images;
use App\Post;
use App\Category;
use App\Image;
use App\Comment;
use Auth;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $categories = Category::paginate(5);
        $posts = Post::where('active', 1)->with('users')->get();
        return view('posts.index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
            return view('posts.create');
        }
        Session::flash('error', 'You must login to create new post');
        return redirect()->route('posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = str_slug($request->title,'-');
        $post->user_id = $user_id;
        $post->category_id = $request->category;
        $post->save(); 

        if(!$request->file('thumbnail') == null)
        {
            $image = new Image();
            $get_image = $request->file('thumbnail');
            $name = time().'.'.$get_image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $get_image->move($destinationPath, $name);
            $image->image = $name;
            $image->user_id = $user_id;
            $image->post_id = $post->id;
            $image->save();
        }
        else
        {
            
            Session::flash('success', 'The post was successfully saved.!');
            return redirect()->route('posts.show',['slug'=>$post->slug, 'id'=>$post->id]);
        }


        Session::flash('success', 'The post was successfully saved.!');

        return redirect()->route('posts.show',['slug'=>$post->slug, 'id'=>$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $post = Post::where('active', 1)->with([
        'comments' => function ($q){
            $q->with('users');
        }, 
        'images' => function($q) use ($id){
            $q->where('post_id', $id);
        }])->where(['slug' => $slug, 'id' => $id, 'active' => 1])->first();
        if(is_null($post))
        {
            Session::flash('error', 'Unable to see this post');
            return redirect()->route('posts.index');
        }
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(Auth::check()){
            if(Auth::user()->id == $post->user_id)
            {
                return view('posts.edit', compact('post'));
            }
            Session::flash('error', 'You cannot edit this post');
            return redirect()->back();
        }
        Session::flash('error', 'You must login to edit this post');
        return redirect()->back();
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
        $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title, '-');
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->save(); 

        if(!$request->file('thumbnail') == null)
        {
            $image = Image::where('post_id', $id)->first();
            
            $get_image = $request->file('thumbnail');
            $name = time().'.'.$get_image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $get_image->move($destinationPath, $name);
            $image->image = $name;
            $image->save();
        }
        else
        {
            
            Session::flash('success', 'The post was successfully saved.!');
            return redirect()->route('posts.show',['slug'=>$post->slug, 'id'=>$post->id]);
        }


        Session::flash('success', 'The post was successfully saved.!');

        return redirect()->route('posts.show',['slug'=>$post->slug, 'id'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            $post = Post::findOrFail($id);
            if(Auth::user()->id == $post->user_id)
            {
                $post->delete();
                return redirect()->route('posts.index');
            }
            Session::flash('error', 'You cannot delete this post');
            return redirect()->back();
        }
        Session::flash('error', 'You cannot delete this post');
        return redirect()->back();
    }

    public function search(Request $request)
    {   
        $search = $request->search;
        $categories = Category::where('category_name','LIKE', '%'.$search.'%')
                        ->orWhereHas('posts', function ($q) use ($search){
                            $q->where('title', 'LIKE', '%'.$search.'%')->orWhere('content', 'LIKE', '%'.$search.'%')
                            ->orWhereHas('users', function ($q) use ($search){
                            $q->where('name', 'LIKE', '%'.$search.'%');
                            });
                        })->paginate(5);
        $posts = Post::orWhereHas('users', function ($q) use ($search){
                        $q->where('name', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhere('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('content', 'LIKE', '%'.$search.'%')->get();
        return view('posts.index', compact('posts', 'categories'));
    }
}
