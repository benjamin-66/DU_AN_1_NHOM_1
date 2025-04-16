<?php
namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Cart\Index;

class CartController {
    public static function index()
     {
        Header::render();
        index::render();
        Footer::render();
    }


    public static function add()
    {
        {
            $data = $_POST;
            $product_id = $data['product_id'];
    
            //nếu có 1 sản phẩm đó trong giỏ hàng rồi thì tăng số lượng lên
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += 1;
                // NotificationHelper::set('success', 'Thêm sản phẩm vào giỏ hàng thành công');
                header('Location: /cart');
                return;
            }
    
            $cart = $_SESSION['cart'] ?? [];
    
            $cart[$product_id] = [
                'product_id' => $data['product_id'],
                'name' => $data['name'],
                'image' => $data['image'],
                'quantity' => 1,
                'price' => $data['price']
            ];
    
            $_SESSION['cart'] = $cart;
            // NotificationHelper::set('success', 'Thêm sản phẩm vào giỏ hàng thành công');
            header('Location: /cart');
        }
    
    }
}