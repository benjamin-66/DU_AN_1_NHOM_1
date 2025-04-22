<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;
use App\Helpers\ViewProductHelper;

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
            'categories' => $categories,             
        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }

    public static function detail($id)
    {
        // $product_detail = [
        //     'id' => $id,
        //     'name' => 'Product 1',
        //     'description' => 'Description Product 1',
        //     'price' => 100000,
        //     'discount_price' => 10000,
        //     'image' => 'product.jpg',
        //     'status' => 1
        // ];

        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);

        if(!$product_detail){
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }


        $comment = new Comment();
        $comments = $comment->get5CommentNewsByProductAndStatus($id);



        $data = [
            'product' => $product_detail,
            'comments' => $comments
        ];

        $view_result=ViewProductHelper::cookView($id, $product_detail['view']);
        // var_dump($view_result);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
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
