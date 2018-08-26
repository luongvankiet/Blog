<?php

namespace App\Http\Controllers\ApiControllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\User;
use App\Role;
use App\Image;
use App\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsersResource::collection(User::with('roles')->get());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with(['images', 'posts' => function($query){
            $query->with(['images'=>function($q){
                $q->where('isSet',1);
            }]);
        }])->withCount('posts')->first();
        return response()->json($user);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nickname = $request->nickname;
        $user->description = $request->description;
        $user->active = $request->active;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();
        return response()->json(['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::findOrFail($id);
        $user->delete();
        return response()->json(['message'=>'User has been successfully removed from database']);
    }

    public function getRoles()
    {
        return response()->json(['roles'=>Role::all()]);
    }

    public function createRoles(Request $request)
    {
        $role = new Role();
        $role->display_name = $request->display_name;
        $role->name = str_slug($role->display_name, '-');
        $role->description = $request->description;
        $role->save();
        return response()->json(['message'=>'Success','roles'=>$role]);
    }

    public function getPermission()
    {
        return response()->json(['permissions'=>Permission::all()]);
    }
}
