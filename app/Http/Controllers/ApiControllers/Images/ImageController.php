<?php

namespace App\Http\Controllers\ApiControllers\Images;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ImagesResource;
use App\Image;
use File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ImagesResource::collection(Image::all());
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
        $image = new Image();
        $get_image = $request->file('image');
        $name = time().'.'.$get_image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $get_image->move($destinationPath, $name);
        $image->image = $name;
        $image->image_type = $request->image_type;
        $image->user_id = $request->user_id;
        if(!is_null($request->post_id)){
            $image->post_id = $request->post_id;
        }
        $image->save();
        return response()->json($image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::where('post_id', $id)->get();
        return response()->json($image);
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
        $images = Image::where(['post_id'=> $request->post_id, 'user_id'=>$request->user_id, 'image_type'=>2])->get();
        foreach ($images as $key => $value) {
            $value->isSet = 0;
            $value->save();
        }
        // return response()->json($images);


        $image = Image::find($id);
        $image->isSet = 1;
        $image->save();
        return response()->json($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $destinationPath = public_path('/images/');
        $image_path = $destinationPath.$image->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->delete();
    }

    public function getAvatar($id){
        $avatar = Image::where(['image_type' => 1, 'user_id'=>$id, 'isSet'=>1])->first();
        return response()->json($avatar);
    }

    public function setAvatar(Request $request, $id){
        $images = Image::where(['user_id'=>$request->user_id, 'image_type'=>1])->get();
        foreach ($images as $key => $value) {
            $value->isSet = 0;
            $value->save();
        }
        // return response()->json($images);


        $image = Image::find($id);
        $image->isSet = 1;
        $image->save();
        return response()->json($image);
    }

    public function getCoverImage($id){
        $coverImage = Image::where(['image_type' => 3, 'user_id'=>$id, 'isSet'=>1])->first();
        return response()->json($coverImage);
    }



    public function setCoverImage(Request $request, $id){
        $images = Image::where(['user_id'=>$request->user_id, 'image_type'=>3])->get();
        foreach ($images as $key => $value) {
            $value->isSet = 0;
            $value->save();
        }
        // return response()->json($images);


        $image = Image::find($id);
        $image->isSet = 1;
        $image->save();
        return response()->json($image);
    }
}
