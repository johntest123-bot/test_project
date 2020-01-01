<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
            'name'    =>  'required',
            'desc'     =>  'required',
            'slug'     =>  'required',
            'logo'         =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = $request->file('logo');

        $new_name = time().'.'.$logo->getClientOriginalExtension();
        $logo->move(public_path('images'), $new_name);
        $brand = array(
            'name'       =>   $request->name,
            'desc'       =>   $request->desc,
            'slug'       =>   $request->slug,
            'logo'       =>   $new_name
        );

        Brand::create($brand);

        return redirect()->route('brands.index')->with('success', 'Data Added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('logo');
        if($image)
        {
            $request->validate([
                'name'    =>  'required',
                'desc'    =>  'required',
                'slug'    =>  'required',
                'logo'    =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'desc'    =>  'required',
                'slug'    =>  'required',
            ]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'desc'       =>   $request->desc,
            'slug'       =>   $request->slug,
            'logo'       =>   $image_name
        );

        Brand::whereId($id)->update($form_data);

        return redirect()->route('brands.index')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::findOrFail($id);
        $data->delete();
        return redirect()->route('brands.index')->with('success', 'Data is successfully deleted');
    }
}