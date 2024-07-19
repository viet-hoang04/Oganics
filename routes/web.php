<?php
use App\http\Middleware\Authenticate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\checkAdmin;
use Illuminate\Support\Facades\Route;
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/contact',[HomeController::class,'contact']);
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/order',[OrderController::class,'order'])->name('order');
Route::get('/about',[HomeController::class,'about']);
Route::get('/blog',[HomeController::class,'blog']);

// cart
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/insertorder',[OrderController::class,'insertorder'])->name('insert_order');


//checkout
// Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');



Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'handlelogin'])->name('handlelogin');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'handleregister'])->name('handleregister');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/productdetail/{id}',[ProductController::class,'productdetail']);
Route::get('/shop',[HomeController::class,'shop']);
Route::get('/shop_cate/{categoryID}',[HomeController::class,'shop_cate']);


Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');

Route::get('/forgotpassword',[UserController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/new_password',[UserController::class,'new_password'])->name('new_password');
Route::get('/new_password',[UserController::class,'new_password']);
route::post('/handle_new_password',[UserController::class,'handle_new_password'])->name('handle_new_password');











//admin
Route::middleware([checkAdmin::class])->group(function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::get('/crudproduct',[ProductController::class,'crudProduct'])->name('crudproduct');
    Route::get('/addproduct',[ProductController::class,'addproduct']);
    
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::get('/addcategory',[CategoryController::class,'addcategory']);
    
    Route::post('/handle_category',[CategoryController::class,'handle_category'])->name('handle_category');
    Route::get('/delete_category/{id}',[CategoryController::class,'delete_category'])->name('delete_category');
    
    
    Route::post('/handle_product',[ProductController::class,'handle_product'])->name('handle_product');
    Route::get('/deleteproduct/{id}',[ProductController::class,'deleteproduct'])->name('deleteproduct');
    
    Route::get('/editproduct/{id}',[ProductController::class,'editproduct'])->name('editproduct');
    Route::put('/update_product',[ProductController::class,'update_product'])->name('update_product');
    Route::get('/list_order',[OrderController::class,'list_order'])->name('list_order');
    //user
    Route::get('/user',[UserController::class,'user'])->name('user');
    Route::get('/users', [UserController::class, 'adduser'])->name('adduser');
    Route::post('/users', [UserController::class, 'store'])->name('store');
    Route::get('/usersadd/{id}', [UserController::class, 'updatead'])->name('update_ad');
    // Route::put('/users/{id}', [UserController::class, 'updatead'])->name('update_ad');
    Route::get('/users/{id}', [UserController::class, 'destroy'])->name('destroy');
});




///helpers
// Route::get('/search',[SearchController::class,'search'])->name('search');


// Route::get('/search', function(){
//     $results = searchInTable('users', 'hoang');
//     dd($results);
// });






