<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class categoryController extends Controller
{
    public function add()
    {
        return view('admin.category.add');
    }

    public function create(Request $request)
    {
        $category = new category();
        $category->name = $request->get('name');
        $category->save();
        return redirect::to('/admin/category');
    }

    public function index()
    {
        $category = category::all();
        return view('admin.category.index')->with(['data' => $category]);
    }
    public  function edit($id)
    {
        $category = category::find($id);
        return view('admin.category.edit')->with(['data' => $category]);
    }

    public function updatecategory(Request $request)
    {
        $category = category::find($request->get('id'));
        $category->name = $request->get('name');
        $category->save();
        return Redirect::to('/admin/category');
    }

    public function delete($id)
    {
        $category = category::where('id', $id)->delete();
        return Redirect::to('/admin/category');
    }
}
