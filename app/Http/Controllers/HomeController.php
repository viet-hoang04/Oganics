<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // function index(){
    //     $query = DB::table('db_products')
    //     ->select('ProductID','ProductName','Description','Price','Views','Image')
    //     ->orderBy('Views','desc')
    //     ->limit(10);
    //     $data =$query ->get();
    //     $query_img = DB::table('db_imgs')
    //     ->select('ImageID','ProductID','Image');
    //     $data_img =$query_img ->get();
    //     $query_cat = DB::table('db_categories')
    //     ->select('CategoryID','CategoryName');
    //      $data_cat = $query_cat->get();
    // // dd($data);
    //     // dd($data_cat);
    //     $data_view=[
    //         'data'=>$data,
    //         'data_img'=>$data_img,
    //         '$data_cat'=>$data_cat
    //     ];
    //     return view('home',compact('data_view'));
    // }
    function index(){
        $data_category = CategoryModel::all();
        $data_products = ProductModel::all();
        // dd($data_products);
        return view('home',compact('data_products','data_category'));
    }

    function contact(){
        // $data_category = CategoryModel::all();
        return view('contact');
    }
    function checkout(){
        $cart = session()->get('cart', []);
        
        return view('checkout', compact('cart'));
    }
    function about(){
        $data_category = CategoryModel::all();
        return view('about',compact('data_category'));
    }
    function login(){
        $data_category = CategoryModel::all();
        return view('login',compact('data_category'));
    }
    function blog(){
        $data_category = CategoryModel::all();
        return view('blog',compact('data_category'));
    }
    function cart(){
        $data_category = CategoryModel::all();
        return view('cart',compact('data_category'));
    }
    function shop(){
        $data_category = CategoryModel::all();
        $data_products = ProductModel::all();
        // dd($data_products);
        return view('shop',compact('data_products','data_category'));
    }
    function shop_cate($categoryID){
        if($categoryID != null){
            $data_products = ProductModel::where('CategoryID', $categoryID)->get();
        }
        $data_category = CategoryModel::all();  
        $data_products = ProductModel::all();
        // dd($data_products);
        return view('shop',compact('data_products','data_category'));
    }
}
