<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Post;
use App\model\Type;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Post::with('type')->paginate(30);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Type::all();
        return view('admin.articles.create', compact('categories'));
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
            'title'               =>  'required',
            'content'             =>  'required',
            'type_id' =>  'required'
        ]);

        $article = array(
            'title'               =>   $request->title,
            'content'             =>   $request->content,
            'slug'                =>   $request->slug,
            'type_id' =>   $request->type_id
        );

        Post::create($article);

        return redirect()->route('admin.articles.index')->with('success', 'Data Added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Type::all();
        $article = Post::findOrFail($id);
        return view('admin.articles.edit', compact('article', 'categories'));
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
            'title'               =>  'required',
            'content'             =>  'required',
            'type_id' =>  'required'
        ]);

        $form_data = array(
            'title'               =>   $request->title,
            'content'             =>   $request->content,
            'slug'                =>   $request->slug,
            'type_id' =>   $request->type_id
        );

        Post::whereId($id)->update($form_data);

        return redirect()->route('admin.articles.index')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Data is successfully deleted');
    }
}
