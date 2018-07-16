<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use Auth;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('posts.index');
    }

    public function showPostByCategory($slug, $id)
    {
        $categories = Category::where(['category_slug'=> $slug, 'id'=>$id])->paginate(5);
        $posts = Post::where('active', 1)->whereHas('categories', function($q) use ($slug, $id){
            $q->where(['category_slug'=>$slug, 'id'=>$id]);
        })->get();
        
        return view('posts.index', compact('posts', 'categories'));

    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id',$id)->get();
        return view('profile', compact('user', 'posts'));
    }

    public function editProfile($id)
    {
        if(Auth::check()){
            if(Auth::user()->id == $id){
                $user = User::find($id);
                return view('editprofile', compact('user'));
            }
            Session::flash('error','Cannot edit other user profile.!');
            return redirect()->back();
        }
        Session::flash('error','You must login to edit profile.!');
        return redirect()->back();
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nickname' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nickname = $request->nickname;
        $user->date_of_birth = $request->date_of_birth;

        if(!$request->file('avatar') == null)
        {
            $get_image = $request->file('thumbnail');
            $name = time().'.'.$get_image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $get_image->move($destinationPath, $name);
            $user->avatar = $name;
            $user->save();
            Session::flash('success','User was successfully updated.!');
            return redirect()->route('profile', compact('id'));
        }

        $user->save();
        Session::flash('success','User was successfully updated.!');
        return redirect()->route('profile', compact('id'));
        
    }
}
