<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\model\Comment;
use App\model\Reply;
use App\User;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
    public function store(Request $request)
    {   
        // dd($request);

        $request->validate([
            'content'             =>  'required',
            'author'             =>  'required',
            'email'              => 'required'
        ]);
        // dd($request);
        // $user = User::where('email', $request->email)->firstOrFail();
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

        // redirect()->route('home');
        return redirect()->back();
    }

    public function reply(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'comment_id' => 'required'
        ]);

        $reply = new Reply;
        $reply->content = $request->content;
        $reply->comment_id = $request->comment_id;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        return redirect()->back();
    }
}
