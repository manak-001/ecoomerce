<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\category;
use App\Models\Product;
use App\Models\ProductAddon;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login/');
      }
    public function index()
    {
        $product = Product::all();
        return view('home')->with(['product'=>$product]);
    }

    public function product_deatils($id)
    {
        $product = Product::find($id);
        $produc_addon = ProductAddon::select('*','category.name','category.id as cates_ids')
        ->join('category','product_addon.cate_id','=','category.id')
        ->where('product_addon.product_id',$product->id)->get();
        $addon = ProductAddon::where('product_id',$product->id)->pluck('cate_id');
        $category_addon = Addon::whereIn('cates_id',$addon)->pluck('subcate_id');
        $sub_cates = Subcategory::whereIn('id',$category_addon)->get();
       return view('productdetails')->with(['product'=>$product,'produc_addon'=>$produc_addon,'sub_cates'=>$sub_cates]);
    }
}
