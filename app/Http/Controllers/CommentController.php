<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\model\Comment;
use App\model\Reply;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CommentController extends Controller
{
    public function store(Request $request)
    {   
        // dd($request);

        $request->validate([
            'content'             =>  'required',
            'author'             =>  'required'
        ]);

        if (Auth::check()) {
            $user = Auth::user();
        } else {
           $isExist = User::where('email', $request->email)->first();
           $admin = User::where('is_admin', 1)->first();
           if ($isExist && $isExist->email == $admin->email) {
               return redirect()->back()->with("error", "Please enter a valid email");
           }
           if ($isExist) {
            $user = $isExist;
           } else {
            $user = User::create([
                'name' => $request->author,
                'email' => $request->email,
                'password' => Hash::make('1357abcd'),
                'website' => $request->website,
              ]);
           }
        }
       
        $comment = array(
            'content'               =>   $request->content,
            'post_id'             =>   $request->post_id,
            'user_id'               => $user->id
        );

        Comment::create($comment);

        // redirect()->route('home');
        return Redirect::to(URL::previous() . "#comment-area");
    }

    public function reply(Request $request)
    {
        // dd($request);
        $request->validate([
            'content' => 'required',
            'comment_id' => 'required'
        ]);
        
        $reply = new Reply;
        $reply->content = $request->content;
        $reply->comment_id = $request->comment_id;
        if (Auth::check()) {
          $reply->user_id = Auth::user()->id;
        } else {
           $isExist = User::where('email', $request->email)->first();
           $admin = User::where('is_admin', 1)->first();
           if ($isExist && $isExist->email == $admin->email) {
               return redirect()->back()->with("error", "Please enter a email valid");
           }
           if ($isExist) {
            $user = $isExist;
           } else {
            $user = User::create([
                'name' => $request->author,
                'email' => $request->email,
                'password' => Hash::make('1357abcd'),
                'website' => $request->website,
              ]);
           }
          $reply->user_id = $user->id;
        }
        $reply->save();

        return Redirect::to(URL::previous() . "#comment-area");
    }
}
