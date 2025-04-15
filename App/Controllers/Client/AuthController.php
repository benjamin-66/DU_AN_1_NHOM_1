<?php
namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;


class AuthController {
    public static function register()
     {
        Header::render();
        // hiển thị thông báo 
        Notification::render();
        // hủy seesion thông báo 
        NotificationHelper::unset();
       Register::render();
       
        Footer::render();
    }

 public static function registerAction(){


    // bắt lỗi validation 
  $is_valid=AuthValidation::register();
    if(!$is_valid){

        NotificationHelper::error('register_valid','Đăng Ký Thất Bại ');
        header('location:/register');
        exit();
    }

    $username=$_POST['username'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
     $email=$_POST['email'];
     $name=$_POST['name'];

$data=[


    'username'=> $username,
    'password'=> $hash_password,
    'email'=> $email,
    'name'=> $name

];
     

$result =AuthHelper ::register($data);
if($result){
//  var_dump('Thêm oki');
header('location:/login');

 }else {
    header('location:/register');
// var_dump('Thêm loi');
 }
 }


 // hiện thị giao diện form đăng nhập
 public static function login()
 {
//    $category = new Category();
//        $categories = $category->getAllCategoryByStatus();
//        $data = [

//            'categories' => $categories
//        ];
   Header::render();
   Notification::render();
   NotificationHelper::unset();
Login::render();
   Footer::render();
 }


 public static function loginAction()
 {  // bắt lỗi 
$is_valid=AuthValidation::login();
if(!$is_valid){
    NotificationHelper::error('login','Đăng nhập thất bại ');

    header('location:/login');
    exit();

 };

 $data = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'remember' => isset($_POST['remember'])
];

$result = AuthHelper::login($data);

if ($result) {
    NotificationHelper::success('login', 'Đăng nhập thành công');
    header('location: /');
} else {
    NotificationHelper::error('login', 'Đăng nhập thất bại');
    header('location: /login');
}
 }


}   