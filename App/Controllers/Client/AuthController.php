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
use App\Views\Client\Pages\Auth\Edit;
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



public static function logout()
{

    AuthHelper::logout();
    NotificationHelper::success('logout','Đăng xuất thành công ');
    header('location:/');
}

public static function edit($id)
{
    // Lấy thông tin người dùng dựa trên $id từ cơ sở dữ liệu hoặc session
    // Ví dụ: Lấy thông tin người dùng theo ID
    $result = AuthHelper::edit($id);

    if (!$result) {
        if (isset($_SESSION['error']['login'])) {
            header('location:/login');
            exit();
        }

        if (isset($_SESSION['error']['user_id'])) {
            $data = $_SESSION['user']; // Lấy thông tin người dùng từ session
            $user_id = $data['id'];
            header("location: /users/$user_id");
            exit();
        }
    }

    // Kiểm tra nếu session không có dữ liệu người dùng
    if (!isset($_SESSION['user'])) {
        header('location:/login');
        exit();
    }

    $data = $_SESSION['user']; // Lấy dữ liệu người dùng từ session
    Header::render();
    Notification::render();
    NotificationHelper::unset();

    // Gọi render để hiển thị trang chỉnh sửa thông tin người dùng
    Edit::render($data);
    Footer::render();
}


public static function update($id)
{

$is_valid=AuthValidation::edit();

if (!$is_valid) {
NotificationHelper::error('update_user','Cập Nhật thông tin tài khoản thất bại ');
header("location:/users/$id");
exit(); 

}
$data = [
    'email' => $_POST['email'],
    'name' => $_POST['name'],
    
];
// kiểm tra có upload hình ảnh không 
$is_upload=AuthValidation::uploadAvatar();
if($is_upload){
  $data['avatar']=$is_upload;

}
   //gọi helper để update
   $result = AuthHelper::update($id, $data);
   //kiểm tra kết quả trả về và chuyển hướng
   header("location: /users/$id");

}

}   