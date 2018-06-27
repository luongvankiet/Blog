<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::paginate(10);
        return view('manage.permissions.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = ['basic-permission'];
        return view('manage.permissions.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->permission_type == 'basic')
        {
            $permission = new Permission();
            $permission->display_name = $request->display_name;
            $permission->name = str_slug($permission->display_name, '-');
            $permission->description = $request->description;
            if($permission->save())
            {
                Session::flash('success','New permission was successfully saved.!');
                return redirect()->route('permissions.index');
            }
            else
            {
                Session::flash('danger', 'Something went wrong!!');
                return redirect()->route('permissions.create');
            }
        }
        else
        {
            foreach ($request->permission_crud as $key => $value)
            {
                if($value == 'permission_create')
                {
                    $permission = new Permission();
                    $permission->display_name = "Create ".$request->crud_name;
                    $permission->name = str_slug($permission->display_name, '-');
                    $permission->description = $permission->display_name;
                    $permission->save();
                } 
                if($value == 'permission_read')
                {
                    $permission = new Permission();
                    $permission->display_name = "Read ".$request->crud_name;
                    $permission->name = str_slug($permission->display_name, '-');
                    $permission->description = $permission->display_name;
                    $permission->save();
                }
                if($value == 'permission_update')
                {
                    $permission = new Permission();
                    $permission->display_name = "Update ".$request->crud_name;
                    $permission->name = str_slug($permission->display_name, '-');
                    $permission->description = $permission->display_name;
                    $permission->save();
                }
                if($value == 'permission_delete')
                {
                    $permission = new Permission();
                    $permission->display_name = "Delete ".$request->crud_name;
                    $permission->name = str_slug($permission->display_name, '-');
                    $permission->description = $permission->display_name;
                    $permission->save();
                }
                           
            }
            Session::flash('success', 'New permission was successfully saved.');
            return redirect()->route('permissions.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.edit', compact('permission'));
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
            'display_name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->display_name = $request->display_name;
        $permission->name = str_slug($request->display_name, '-');
        $permission->description = $request->description;

        if($permission->save()){
            Session::flash('success','Permission was successfully updated.!');
            return redirect()->route('permissions.index');
        }
        else{
            Session::flash('danger', 'Something went wrong!!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        Session::flash('success','Selected permission was successfully deleted.!');
        return redirect()->route('permissions.index');
    }
}
