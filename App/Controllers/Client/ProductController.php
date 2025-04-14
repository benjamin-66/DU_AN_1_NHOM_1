<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    public static function index()
    {
      
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();
      
        //$productwithdetail = $product->getAllProductsWithDetails();

        $data = [
            'products' => $products,
            'categories' => $categories,             //'productWithDetail' => $productwithdetai

        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }

    public static function detail($id): void
    {
        $product = new Product();
        $product_detail = $product->getOneProductBystatus($id);
        $data= [
            'product'=>$product_detail];


        Header::render();
      
        Detail::render($data);
        Footer::render();
    }

    public static function getProductByCategory($id )
{
    $product = new Product();
    $products = $product->getAllProductByCategoryAndStatus($id);
    $category = new Category();

    $categories = $category->getAllCategoryByStatus() ;

    $data = [
        'products' => $products,
        'categories' => $categories          //'productWithDetail' => $productwithdetai

    ];
   // kiểm tra id truyền vào
//    echo'<pre>';
// var_dump($data);
    Header::render();
    ProductCategory::render($data);
    Footer::render();
}



//     public static function category()
// {
//     $category = new Category();
//     $data['categories'] = $category->getAllCategoryByStatus();

//     $product = new Product();
//     $data['products'] = $product->getAllProductByStatus();

//     Header::render();
//     ProductCategory::render($data);
//     Footer::render();
// }
 }
