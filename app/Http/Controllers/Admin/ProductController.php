<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAddon;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function add()
    {
        $cate = Category::all();
        return view('admin.Product.add')->with(['data' => $cate]);
    }

    public function create(Request $request)
    {
       $path = $request->file('image')->store('image','public');
        $Product = new Product();
        $Product->name = $request->get('name');
        $Product->price = $request->get('price');
        $Product->image = $path;
        $Product->description = $request->get('description');
        $Product->save();
        foreach($request->get('category') as $pruduct_cate)
        {
            $product_addon = new ProductAddon();
            $product_addon->product_id = $Product->id;
            $product_addon->cate_id = $pruduct_cate;
            $product_addon->save();
       
        }
        return redirect ::to('/admin/product');
    }

    public function index()
    {
    //     $Product = Product::all();
    //     $product_addon = ProductAddon::where('product_id', $Product->id)->get();
    //     $cate = Category::all();
    //    $pruduct_cate = Category::where('id',$Product->cates_id)->get();
       $Product = Product::select('product.*','product_addon.cate_id','Category.name as cate_name')
       ->join('product_addon','product.id','=','product_addon.product_id')
       ->join('Category','product_addon.cate_id','=','Category.id')->groupBy('product.id')->get();
        return view('admin.Product.index')->with(['data' => $Product]);
    }
    public  function edit($id)
    {
        $Product = Product::select('product.*','product_addon.cate_id','Category.name as cate_name')
       ->join('product_addon','product.id','=','product_addon.product_id')
       ->join('Category','product_addon.cate_id','=','Category.id')
       ->where('product.id',$id)->first();
        $cate = Category::all();
        
        return view('admin.Product.edit')->with(['product' => $Product,'data'=>$cate]);
    }

    public function updateProduct(Request $request)
    {
        $Product = Product::find($request->get('id'));
        $path = ""; 
        if($request->file('image'))
        {
            $path = $request->file('image')->store('image','public');
        }
       else{
        $path =$Product->image;
       }
       
        $Product->name = $request->get('name');
        $Product->price = $request->get('price');
        $Product->image = $path;
        $Product->description = $request->get('description');
        $Product->save();
        foreach($request->get('category') as $pruduct_cate)
        {
            $product_addon = new ProductAddon();
            $product_addon->product_id = $Product->id;
            $product_addon->cate_id = $pruduct_cate;
            $product_addon->save();
       
        }
        return redirect ::to('/admin/product');
    }

    public function delete($id)
    {
        $Product = Product::where('id', $id)->delete();
        return Redirect::to('/admin/product');
    }

    public function loadeSubCate(Request $request)
    {
        $sub_cate  = Addon::select('*','sub_Category.name','Category.id')
        ->join('sub_Category','addon.cates_id','=','Category.id')
        ->join('Category','addon.cates_id','=','Category.id')
        ->where('cates_id',$request->get('id'))->get();
        dd($sub_cate);
       $sub_Category =  view('admin.Product.sub_cate')->with(['sub_cates'=>$sub_cate])->render();
       return response(['status'=>1,'data'=>$sub_Category]);
    }
}
