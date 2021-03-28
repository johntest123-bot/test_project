<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Post;
use App\model\Comment;
use App\model\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;

class TagsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::whereSlug($id)->firstOrFail();
        $post = $tag->post;
        $user = User::where('is_admin', 1)->first();
        return view('tags.show', compact('post', 'tag', 'user'));
    }
}
