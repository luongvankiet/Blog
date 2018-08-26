<?php

namespace App\Http\Controllers\ApiControllers\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Comment::with('comments')->get());
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
        $comment = new Comment();
        $comment->content = $request->content;
        if(!$request->parent_id){
            $comment->parent_id = null;
        }else{
            $comment->parent_id = $request->parent_id;
        }
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->save();
        $showComment = $comment->with('users')->orderBy('id','desc')->first();
        return response()->json(['message'=>'Success!!','comment'=>$showComment],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where(['post_id' => $id])->with(['users', 'comments'])->get();
        return response()->json($comments);
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
        $comment = Comment::find($id);
        $comment->content = $request->content;
        $comment->save();
        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(['message' => 'Successfully deleted']);
    }


    public function showChildrenComments($id)
    {
        $comments = Comment::where(['post_id' => $id])->with('users')->get();
        return response()->json($comments);
    }
}
