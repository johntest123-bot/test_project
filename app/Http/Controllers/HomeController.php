<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Post;
use App\User;
use App\model\Type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('s')) {
            $query = $request->query('s');
            $posts = Post::where('title', 'like', '%' . $query . '%')->get();
            $user = User::where('is_admin', 1)->first();
            return view('posts.list', compact('posts', 'user', 'query'));
        } else {
            $post = Post::take(2)->get()[1];
            $user = User::where('is_admin', 1)->first();
            $comments = $post->comments;
            return view('home', compact('post', 'user', 'comments'));
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
        $type = Type::whereSlug($id)->firstOrFail();
        $post = $type->posts->first();
        $user = User::where('is_admin', 1)->first();
        $comments = $post->comments;
        return view('posts.show', compact('post', 'user', 'comments'));
    }
}
