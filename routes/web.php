<?php

use App\Http\Controllers\Blog\BlogManage;
use App\Http\Controllers\front\IndexPage;
use App\Http\Controllers\Login\Login;
use App\Http\Controllers\Products\CategoryManage;
use App\Http\Controllers\Products\ProductsManage;
use App\Http\Controllers\Setting\ManageSetting;
use App\Http\Controllers\Testimonial\ManageTestimonial;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Front Routes
Route::get('/', [IndexPage::class,'index']);
Route::get('/contact', [IndexPage::class,'contact']);
Route::get('/about', [IndexPage::class,'about']);
Route::get('/blog/list', [IndexPage::class,'blogList']);
Route::get('/blog/{id}/detail', [IndexPage::class,'blogDetail']);
Route::get('/product/{id}/detail', [IndexPage::class,'productDetail']);
Route::get('/product/list', [IndexPage::class,'productList']);

//Login Routes
Route::get('/login', [Login::class,'login']);
Route::post('/login-post', [Login::class,'loginPost']);
Route::get('/logout', [Login::class,'logout']);


//Products Routes
Route::get('/manage/products', [ProductsManage::class,'productsManageInfo']);
Route::post('/manage/products-create', [ProductsManage::class,'productsManageCreate']);
Route::post('/manage/products-update/{id}', [ProductsManage::class,'productsManageUpdate']);
Route::post('/manage/products-json/{id}', [ProductsManage::class,'productsManageJson']);
Route::post('/manage/products-remove/{id}', [ProductsManage::class,'productsManageRemove']);

//Blog Routes
Route::get('/manage/blog', [BlogManage::class,'blogManageInfo']);
Route::post('/manage/blog-create', [BlogManage::class,'blogManageCreate']);
Route::get('/manage/blog-update/{id}', [BlogManage::class,'blogManageUpdate']);
Route::post('/manage/blog-update/{id}/post', [BlogManage::class,'blogManageUpdatePost']);
Route::post('/manage/blog-json/{id}', [BlogManage::class,'blogManageJson']);
Route::post('/manage/blog-remove/{id}', [BlogManage::class,'blogManageRemove']);
Route::post('/manage/blog-image', [BlogManage::class,'blogManageImage']);

//Category Routes
Route::get('/manage/category', [CategoryManage::class,'categoryManageInfo']);
Route::post('/manage/category-create', [CategoryManage::class,'categoryManageCreate']);
Route::post('/manage/category-update/{id}', [CategoryManage::class,'categoryManageUpdate']);
Route::post('/manage/category-json/{id}', [CategoryManage::class,'categoryManageJson']);


//Category Routes
Route::get('/manage/testimonial', [ManageTestimonial::class,'testimonialManageInfo']);
Route::post('/manage/testimonial-create', [ManageTestimonial::class,'testimonialManageCreate']);
Route::post('/manage/testimonial-update/{id}', [ManageTestimonial::class,'testimonialManageUpdate']);
Route::post('/manage/testimonial-json/{id}', [ManageTestimonial::class,'testimonialManageJson']);
Route::post('/manage/testimonial-remove/{id}', [ManageTestimonial::class,'testimonialManageRemove']);
//Category Routes
Route::get('/manage/setting', [ManageSetting::class,'manageSettingInfo']);
Route::post('/manage/setting/post', [ManageSetting::class,'manageSettingPost']);

