<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class subcategoryController extends Controller
{
    public function add()
    {
        $cat = Category::all();
        return view('admin.subcategeory.add')->with(['data' => $cat]);
    }

    public function create(Request $request)
    {

        $subcategory = new subcategory();
        $subcategory->name = $request->get('name');
        $subcategory->save();
        foreach ($request->get('subcategory') as $sub_cates) {
            $addon = new Addon;
            $addon->subcate_id =  $subcategory->id;
            $addon->cates_id = $sub_cates;
            $addon->save();
        }
        return Redirect::to('/admin/subcategory');
    }

    public function index()
    {
        $subcategory = subcategory::all();
        return view('admin.subcategeory.index')->with(['data' => $subcategory]);
    }
    public  function edit($id)
    {
         $subcategory = subcategory::find($id);
       $cate = Category::all();
        $addon = Addon::where('subcate_id',$subcategory->id)->get();
       
     return view('admin.subcategeory.edit')->with(['data' => $subcategory, 'cates' => $cate ,'addon'=>$addon]);
    }

    public function updatesubcategory(Request $request)
    {
        $subcategory = subcategory::find($request->get('id'));
        $subcategory->name = $request->get('name');
       $subcategory->save();
        foreach ($request->get('subcategoery') as $sub_cates) {
            $addon = new Addon;
            $addon->subcate_id =  $subcategory->id;
            $addon->cates_id = $sub_cates;
            $addon->save();
        }
        return Redirect::to('/admin/subcategory');
    }

    public function delete($id)
    {
        $subcategory = subcategory::where('id', $id)->delete();
        return Redirect::to('/admin/subcategory');
    }
}
