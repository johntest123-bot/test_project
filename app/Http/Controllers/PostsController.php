<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Post;
use App\model\Comment;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // if ($request->has('q')) {
        //     $query = $request->query('q');
        //     $articles = Article::active()->where('title', 'like', '%' . $query . '%')->get();
        //     return view('articles.search_result', compact('articles', 'query'));
        // }
        // $categories = ArticleCategory::active()->with('articles')->get();
        $post = Post::first();
        return view('posts.index', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $article = Article::active()->whereSlug($id)->firstOrFail();
        // $article->view_count = $article->view_count + 1;
        // $article->save();
        // $related_articles = Article::active()->where('id', '!=', $article->id)->paginate(10);
        // return view('articles.show', compact('article', 'related_articles'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'             =>  'required',
            'author'             =>  'required',
            'email'              => 'required'
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        // if(!$user) {
           
        // }

        $user = User::create([
            'name' => $request->author,
            'email' => $request->email,
            'password' => Hash::make('1357abcd'),
            'website' => $request->website,
        ]);
       
        $comment = array(
            'content'               =>   $request->content,
            'post_id'             =>   $request->post_id,
            'user_id'               => $user->id
        );

        Comment::create($comment);

        redirect()->route('home');
        // return redirect()->back();
    }
}
