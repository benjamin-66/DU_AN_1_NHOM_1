<?php
namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
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
    $is_valid=true;
    if(isset($_POST["username"]) || $_POST['username']==='')
    {
        NotificationHelper::error('username','Không được để trống tên đăng nhập ');
      $is_valid=false;

    }
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
header('location:/');

 }else {
    header('location:/register');
// var_dump('Thêm loi');
 }
 }

}   