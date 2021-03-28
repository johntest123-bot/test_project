<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Post;
use App\model\Type;
use App\model\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::with('post')->paginate(30);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('admin.tags.create', compact('posts'));
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
            'name'               =>  'required',
            'post_id' =>  'required'
        ]);

        $tag = array(
            'name'               =>   $request->name,
            'slug'                =>   $request->slug,
            'post_id' =>   $request->post_id
        );

        Tag::create($tag);

        return redirect()->route('admin.tags.index')->with('success', 'Data Added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::all();
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag', 'posts'));
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
       
        $request->validate([
            'name'               =>  'required',
            'post_id' =>  'required'
        ]);

        $form_data = array(
            'name'               =>   $request->name,
            'slug'                =>   $request->slug,
            'post_id' =>   $request->post_id
        );

        Tag::whereId($id)->update($form_data);

        return redirect()->route('admin.tags.index')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tag::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Data is successfully deleted');
    }
}
