<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/productsDeatail', 'App\Controllers\Client\ProductController@detail');
Route::get('/products/categories/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');
Route::get('/productsCategory', 'App\Controllers\Client\ProductController@category');
Route::get('/productsCheckout', 'App\Controllers\Client\ProductController@checkout');

// trang giỏ hàng
Route::get('/cart', 'App\Controllers\Client\CartController@index');


//trang bài viết
Route::get('/post', 'App\Controllers\Client\PostController@index');

// login cient
Route::get('/login', 'App\Controllers\Client\AuthController@index');
// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');

// hiển thị danh sách hóa đơn 
Route::get('/admin/invoices', 'App\Controllers\Admin\InvoiceController@index');

// *** Invoice ***
Route::get('/admin/invoices', 'App\Controllers\Admin\InvoiceController@index');
Route::get('/admin/invoices/create', 'App\Controllers\Admin\InvoiceController@create');
Route::post('/admin/invoices', 'App\Controllers\Admin\InvoiceController@store');
Route::get('/admin/invoices/{id}/edit', 'App\Controllers\Admin\InvoiceController@edit');
Route::put('/admin/invoices/{id}', 'App\Controllers\Admin\InvoiceController@update');
Route::delete('/admin/invoices/{id}', 'App\Controllers\Admin\InvoiceController@delete');
/// product
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');




Route::dispatch($_SERVER['REQUEST_URI']);
