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
        Index::render();
        Footer::render();
    }

    public static function add()
    {
        $data = $_POST;
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];  // Lấy số lượng từ form
    
        // Kiểm tra nếu sản phẩm đã có trong giỏ thì chỉ cần cộng số lượng
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            // Nếu chưa có sản phẩm thì thêm mới
            $_SESSION['cart'][$product_id] = [
                'product_id' => $data['product_id'],
                'name' => $data['name'],
                'image' => $data['image'],
                'quantity' => $quantity,
                'price' => $data['price']
            ];
        }
        
        // Điều hướng về giỏ hàng
        header('Location: /cart');
    }

    public function remove($id)
    {
        $cart = $_SESSION['cart'] ?? [];
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
        header('Location: /cart');
    }
}
