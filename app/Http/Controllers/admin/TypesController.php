<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Type;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->has('search') ? $request->search : "";
        $types = Type::where("name", 'LIKE','%'.$name.'%')->paginate(10);
        return view('admin.types.index', ['types' => $types]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
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
            'name'    =>  'required'
        ]);

        $type = array(
            'name'       =>   $request->name,
            'desc'       =>   $request->desc,
            'slug'       =>   $request->slug,
        );

        $check = Type::create($type);

        if($check)
        {
            return redirect()->route('admin.types.index')->with('success', 'Thêm dữ liệu thành công.');
        }
        else
        {
            return redirect()->back()->with('error', 'Có vấn €ề xảy ra!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.edit', compact('type'));
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
            'name'    =>  'required',
        ]);

        $form_data = array(
            'name'       =>   $request->name,
            'desc'       =>   $request->desc,
            'slug'       =>   $request->slug,
        );

        $check = Type::whereId($id)->update($form_data);

        if($check)
        {
            return redirect()->route('admin.types.index')->with('success', 'Cập nhật thành công.');
        }
        else
        {
            return redirect()->back()->with('error', 'Có vấn €ề xảy ra!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = type::findOrFail($id);
        $check = $data->delete();

        if($check)
        {
            return redirect()->route('admin.types.index')->with('success', 'Xóa dữ liệu thành công');
        }
        else
        {
            return redirect()->back()->with('error', 'Có vấn €ề xảy ra!');
        }
    }
}
