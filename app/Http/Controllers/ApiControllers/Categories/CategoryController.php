<?php

namespace App\Http\Controllers\ApiControllers\Categories;

use Illuminate\Http\Request;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\PostsResource;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['posts' => function($q){
            $q->with(['users', 'likes_dislikes', 'images' => function($query){
                $query->where('isSet', 1);
            }])->withCount(['comments'])->orderBy('created_at', 'desc');
        }])->withCount(['posts'])->get();
        return CategoriesResource::collection($categories);
        // return response()->json(['categories'=>$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_slug = str_slug($request->category_name,'-').time();
        $category->save();
        return $this->show($category->category_slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return new CategoriesResource(Category::where(['category_slug' => $slug])
            ->with(['posts'=>function($q){
                $q->withCount('comments')->with(['users','images' => function($query){
                    $query->where('isSet', 1);
                }]);
        }])->withCount('posts')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_slug = str_slug($category->category_name, '-').time();
        $category->update();
        return response()->json($category);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =  Category::findOrFail($id);
        $category->delete();
        return response()->json(['message'=>'Category has been successfully removed from database']);
    }
}
