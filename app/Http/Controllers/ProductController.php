<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\imgModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   function index(){
  
     return view('product');
   }
   function productdetail($id){
      $product_id = $id;
      $prodt = ProductModel::where('ProductID',$product_id)->first();
      $data_products = ProductModel::all();
      $data_category = CategoryModel::all();
      $data_img = imgModel::where('ProductID',$product_id)->get();
 
   //   dd( $data_products);
    return view('productdetail',compact('prodt','data_category','data_img','data_products'));
   }



   // admin
   function crudProduct(){
     
      $data_products = ProductModel::orderBy('ProductID', 'desc')->get();
     
    
      return view('back_end.crudProduct',compact('data_products'));
   }


   function addproduct(){
      $data_category = CategoryModel::all();
        return view('back_end.addProduct',compact('data_category'));
   }
   function handle_product(request $rqt){

   $rules =[
      'ProductName' => 'required|string|max:255',
      'Description' => 'required|string|max:1000', // Thêm kiểm tra cho Description
      'Price' => 'required|numeric',
      'CategoryID' => 'required|integer|exists:db_categories,CategoryID', // Chỉnh lại tên cột cho đúng
      'img' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'StockQuantity' => 'required|integer|min:0', // Thêm kiểm tra cho StockQuantity
  ];
  $messages = [
      'ProductName.required'=>"Chưa nhập tên sản phẩm ",
      'Description.required'=>"Chưa nhập chi tiết sản phẩm",
      'Price.required'=>"Chua nhap gia sp "
  ];
  $validator = Validator::make($rqt->all(), $rules, $messages);

  if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    
  }


     if ($rqt->hasFile('img')) {
         $imageName = time() . '.' . $rqt->img->extension();
         $rqt->img->move(public_path('frontend/images/products'), $imageName);

         $rqt['Image'] = $imageName;
     }
    
     ProductModel::create($rqt->all());

     return redirect()->route('crudproduct')->with('success', 'Sản phẩm đã được thêm thành công!');
   }


   public function deleteproduct($ProductID)
   {
       // Tìm sản phẩm theo ID
       $product = ProductModel::find($ProductID);
   
       // Kiểm tra xem sản phẩm có tồn tại không
       if ($product) {
           $product->delete();
           return redirect()->back()->with('success', 'Product deleted successfully');
       } else {
           return redirect()->back()->with('error', 'Product not found');
       }
   }
  public function editproduct($id){
   $product_id = $id;
   $prodt = ProductModel::where('ProductID',$product_id)->first();
   $data_category = CategoryModel::all();
    
   return view('back_end.editproduct',compact('data_category','prodt'));
  }   
  public function update_product(request $request){
     // Validate the request data


    $rules =[
      'ProductName' => 'required|string|max:255',
      'Description' => 'required|string|max:1000', // Thêm kiểm tra cho Description
      'Price' => 'required|numeric',
      'CategoryID' => 'required|integer|exists:db_categories,CategoryID', // Chỉnh lại tên cột cho đúng
      'img' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'StockQuantity' => 'required|integer|min:0', // Thêm kiểm tra cho StockQuantity
  ];
  $messages = [
      'ProductName.required'=>"Chưa nhập tên sản phẩm ",
      'Description.required'=>"Chưa nhập chi tiết sản phẩm",
      'Price.required'=>"Chua nhap gia sp "
  ];
  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
   // dd($validator);
      return back()->withErrors($validator)->withInput();
    
  }  
  

  // Find the product by ID
  $product = ProductModel::find($request->input('ProductID'));

  // Check if the product exists
  if ($product) {
      // Update the product details
      $product->ProductName = $request->input('ProductName');
      $product->Description = $request->input('Description');
      $product->Price = $request->input('Price');
      $product->CategoryID = $request->input('CategoryID');
      $product->StockQuantity = $request->input('StockQuantity');

      // Handle the image upload
      if ($request->hasFile('img')) {
          $image = $request->file('img');
          $name = time() . '.' . $image->getClientOriginalExtension();
          $destinationPath = public_path('frontend/images/products');
          $image->move($destinationPath, $name);
          $product->Image = $name;
      }

      // Save the updated product
      $product->save();

      // Redirect back with success message
      return redirect()->route('crudproduct')->with('success', 'cập nh đã được thêm thành công!');
  } else {
      // If the product is not found, redirect back with an error message
      return redirect()->back()->with('error', 'Product not found');
  }
  }
   
}