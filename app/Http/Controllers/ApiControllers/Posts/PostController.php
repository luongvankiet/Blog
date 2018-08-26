<?php

namespace App\Http\Controllers\ApiControllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Http\Requests\post\CreatePostRequest;
use App\Post;
use App\Image;
use App\Category;
use App\User;
use App\LikeDislike;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['users', 'categories', 'likes_dislikes', 'images' => function($q){
            $q->where('isSet', 1);
        }])->withCount(['comments'])->get();
        return PostsResource::collection($posts);
        // return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = str_slug($post->title, '-').'-'.time();
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->save();
        if(!is_null($request->file('thumbnail')))
        {
            $image = new Image();
            $get_image = $request->file('thumbnail');
            $name = time().'-'.$get_image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $get_image->move($destinationPath, $name);
            $image->image = $name;
            $image->image_type = 2;
            $image->isSet = 1;
            $image->user_id = $request->user_id;
            $image->post_id = $post->id;
            $image->save();
        }
        return $this->show($post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['images' => function($query){
                $query->where('isSet', 1);
            }, 'users', 'categories', 'comments'=>function($query){
            $query->with('users');
        }])->withCount('comments')->first();
        return new PostsResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = str_slug($post->title, '-').'-'.time();
        $post->category_id = $request->category_id;
        $post->save();
        return $this->show($post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json(['message'=>'Successfully deleted']);
    }
    
    public function popularPosts(){
        $posts = Post::where("active", 1)->with(['images' => function($query){
                $query->where('isSet', 1);
            }])->withCount('comments')->orderBy('like', 'desc')->take(5)->get();
        return PostsResource::collection($posts);
    }

    public function showPostsByCategory($id){
        $posts = Post::where('category_id', $id)->paginate(4);
        return new PostsResource($posts);
    }

    public function newPosts(){
        $posts = Post::where("active", 1)->with(['images' => function($query){
                $query->where('isSet', 1);
            }, 'users', 'categories'])->orderBy('created_at', 'desc')->take(3)->get();
        return PostsResource::collection($posts);
    }

    public function search()
    {   
        $search = request()->search;
        $posts = Category::orWhereHas('posts', function ($q) use ($search){
                                $q->where('title', 'LIKE', '%'.$search.'%')->orWhere('content', 'LIKE', '%'.$search.'%')
                                ->orWhereHas('users', function ($q) use ($search){
                                    $q->where('name', 'LIKE', '%'.$search.'%');
                                });
                            })->with(['posts'=>function($q) use ($search){
                                $q->where('title', 'LIKE', '%'.$search.'%')->orWhere('content', 'LIKE', '%'.$search.'%')
                                ->orWhereHas('users', function ($q) use ($search){
                                    $q->where('name', 'LIKE', '%'.$search.'%');
                                })
                                ->with(['images' => function($query){
                                        $query->where('isSet', 1);
                                    },'users'])->withCount('comments');
                            }])->withCount(['posts'=>function($q) use ($search){
                                 $q->where('title', 'LIKE', '%'.$search.'%')->orWhere('content','LIKE', '%'.$search.'%')
                                    ->orWhereHas('users', function ($q) use ($search){
                                    $q->where('name', 'LIKE', '%'.$search.'%');
                                });
                            }])->get();
        $categories = Category::where('category_name','LIKE', '%'.$search.'%')
                            ->with(['posts'=> function($q) use ($search){
                                $q->with(['images' => function($query){
                                    $query->where('isSet', 1);
                                },'users'])->withCount('comments');
                            }])->withCount('posts')->get();
        if($categories->count() > 0)
        {
            $value = $categories;
            $value2 = 'categories';
        }else{
            $value = $posts;
            $value2 = 'posts';
        }
        // $categories = Category::where('category_name','LIKE', '%'.$search.'%')
        //     ->orWhereHas('posts' , function ($q) use ($search){
        //         $q->orWhere('title', 'LIKE', '%'.$search.'%')->orWhere('content', 'LIKE', '%'.$search.'%')
        //         ->orWhereHas('users',function ($query) use ($search){
        //             $query->where('name', 'LIKE', '%'.$search.'%');
        //         });
        //     })->with(['posts'=>function($q) use ($search){
        //         $q->where('title', 'LIKE', '%'.$search.'%')->orWhere('content', 'LIKE', '%'.$search.'%')
        //         ->orWhereHas('users',function ($query) use ($search){
        //             $query->where('name', 'LIKE', '%'.$search.'%');
        //         });
        //     }])->get();  
        return response()->json($value);
    }


    public function likes_dislikes($post_id){
        $likes= LikeDislike::where(['post_id'=>$post_id, 'isLike'=>1])->get();
        $dislikes= LikeDislike::where(['post_id'=>$post_id, 'isLike'=>0])->get();
        return response()->json(['like'=>$likes, 'dislike'=>$dislikes]);
    }

    public function countLikeDislike($post_id){
        $countlikes= LikeDislike::where(['post_id'=>$post_id, 'isLike'=>1])->count();
        $countdislikes= LikeDislike::where(['post_id'=>$post_id, 'isLike'=>0])->count();
        return response()->json(['like'=>$countlikes, 'dislike'=>$countdislikes]);
    }

    public function updateLikeDisLike(Request $request){
        $updateLikeDisLike = LikeDislike::where(['post_id'=>$request->post_id, 'user_id'=>$request->user_id])->first();
        $post = Post::where(['id' => $request->post_id])->first();
        if($updateLikeDisLike){
            $updateLikeDisLike->isLike = $request->isLike;
            $updateLikeDisLike->save();

            $like = LikeDislike::where(['post_id'=>$request->post_id, 'isLike'=>1])->count();
            $dislike = LikeDislike::where(['post_id'=>$request->post_id, 'isLike'=>0])->count();
            $post->like = $like;
            $post->dislike = $dislike;
            $post->save();
            return response()->json($updateLikeDisLike);
        }
        else {
            return $this->storeLikeDislike($request);
        }
    }

    public function storeLikeDislike(Request $request){
        $storeLikeDislike = LikeDislike::create($request->all());
        return response()->json($storeLikeDislike);
    }


}
