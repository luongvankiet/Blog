<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $permissions = Permission::paginate(10);
        return view('manage.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();

        if($request->permission_type == 'basic')
        {
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
            if($request->permission_crud == 'permission_create')
            {
                $permission->display_name = "Create ".$request->crud_name;
                $permission->name = str_slug($permission->display_name, '-');
                $permission->description = $permission->display_name;
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

            if($request->permission_crud == 'permission_read')
            {
                $permission->display_name = "Read ".$request->crud_name;
                $permission->name = str_slug($permission->display_name, '-');
                $permission->description = $permission->display_name;
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

            if($request->permission_crud == 'permission_delete')
            {
                $permission->display_name = "delete ".$request->crud_name;
                $permission->name = str_slug($permission->display_name, '-');
                $permission->description = $permission->display_name;
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
                $permission->display_name = "Delete ".$request->crud_name;
                $permission->name = str_slug($permission->display_name, '-');
                $permission->description = $permission->display_name;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
