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
        $data['product'] = $product->getOneProductByStatus($id);
        $data['is_login'] = AuthHelper::checkLogin();

        if (!$data['product']) {
            die("Sản phẩm không tồn tại!");
        }

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }

    public static function getProductByCategory($id = null): void
    {
        if (!$id) {
            die("Danh mục không hợp lệ!");
        }

        $product = new Product();
        $category = new Category();

        $data = [
            'products' => $product->getAllProductByCategoryAndStatus($id) ?? [],
            'categories' => $category->getAllCategoryByStatus() ?? []
        ];

        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }

    public static function getFilterProduct(): void
    {
        $product = new Product();
        $category = new Category();

        $data = [
            'products' => $product->getFilterProduct() ?? [],
            'categories' => $category->getAllCategory() ?? []
        ];

        if (empty($data['products'])) {
            $data['message'] = "Không tìm thấy sản phẩm nào!";
        }

        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }

    public static function getSearchProducts(): void
    {
        $product = new Product();
        $category = new Category();

        $data = [
            'products' => $product->getSearchProduct() ?? [],
            'categories' => $category->getAllCategory() ?? []
        ];

        if (empty($data['products'])) {
            $data['message'] = "Không tìm thấy sản phẩm nào!";
        }

        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
    public static function category()
{
    $category = new Category();
    $data['categories'] = $category->getAllCategoryByStatus();

    $product = new Product();
    $data['products'] = $product->getAllProductByStatus();

    Header::render();
    ProductCategory::render($data);
    Footer::render();
}
}
