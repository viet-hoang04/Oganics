<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    function index(){
        $data_category = CategoryModel::all();
       
        // dd($data_products);
        return view('back_end.Category_list',compact('data_category'));
    }
    function addcategory(){
        return view('back_end.addcategory');
    }
    function handle_category(Request $request){
        $name =  $request->namecategory;
        $status =  $request->statuscategory;
        $Description = $request->Description;
        CategoryModel::create([
            'CategoryName' => $name,
            'Status' => $status,
            'Description'=>$Description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $data_category = CategoryModel::all();
       
        // dd($data_products);
        return view('back_end.Category_list',compact('data_category'));
       
    }
    function delete_category($CategoryID){
        $category = CategoryModel::find($CategoryID); // Sẽ sử dụng 'CategoryID' làm khóa chính

        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }
   
}

