<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ManageController extends Controller
{
    public function index()
    {
    	return redirect()->route('manage_posts.index');
    }
    
    public function dashboard()
    {
    	return redirect()->route('manage_posts.index');
    }
    
}
