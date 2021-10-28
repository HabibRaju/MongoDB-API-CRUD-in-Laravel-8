<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
       $posts = DB::table('posts')
       ->select('*')
       ->where('user_id', Auth::user()->id)
       ->get();
 
        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }
}