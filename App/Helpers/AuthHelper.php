<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{
    public static function register($data)
    {
        $user = new User();
        // bắt tồn tại username
        $is_exist = $user->getOneUserByUsername($data['username']);
        if ($is_exist) {
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('register', 'Đăng ký thành công');
            return true;
        }
        NotificationHelper::error('register', 'Đăng ký thất bại');
        return false;
    }

    public static function login($data)
    {
        //kiểm tra có tồn tại username trong database => nếu ko: thông báo, trả về false
        $user = new User();
        // bắt tồn tại username
        $is_exist = $user->getOneUserByUsername($data['username']);
        if (!$is_exist) {
            NotificationHelper::error('username', 'Tên đăng nhập không tồn tại');
            return false;
        }

        //nếu có: kiểm tra password có trùng không => nếu ko: thông báo , trả về false
        // password người dùng nhập: $data['password]
        // password trong cơ sở dữ liệu: $is_exist['password']
        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không chính xác');
            return false;
        }


        //nếu có: kiểm tra status == 0 => thông báo, trả về false
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }

        //nếu có: kiểm tra remember => lưu session/ cookie => thông báo thành công, trả về true
        if ($data['remember']) {
            //lưu cookie, lưu session
            self::updateCookie($is_exist['id']);
        } else {
            // lưu session
            self::updateSession($is_exist['id']);
        }
        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }

    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            //chuyển array thành string json để lưu vào cookie user
            $user_data = json_encode($result);

            //Lưu cookie 
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            $_SESSION['user'] = $result;
        }
        return true;
    }

    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {


            $_SESSION['user'] = $result;
        }
        return true;
    }

    public static function checklogin()
    {
       if(isset($_COOKIE['user'])){
          $user=$_COOKIE['user'];
          $user_data=json_decode($user);
         $_SESSION['user']=(array)$user_data;
         return true;
       }
      
        if(isset($_SESSION['user'])){
    return true;
        }
        return false;
    }
 
public static function logout(){

    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
}

if(isset($_COOKIE['user'])){
    setcookie('user','', time() - 3600 * 24 * 30 * 12, '/');
}

}

public static function edit($id): bool
{
   if (!self::checklogin()) {

    NotificationHelper::error('login','Vui lòng đăng nhập để xem thông tin ');
    return false;
   }

   $data=$_SESSION['user'];
   $user_id=$data['id'];
   if($user_id!=$id){
    NotificationHelper::error('user_id','Không có quyền xem thông tin tài khoản này ');
    return false;
   }
   return true;

}
public static function update($id, $data)
{
    $user = new User();
    
    // Cập nhật người dùng
    $result = $user->updateUser($id, $data);

    if (!$result) {
        NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
        return false;
    }

    // Kiểm tra session
    if (isset($_SESSION['user'])) {
        self::updateSession($id);
    }

    // Kiểm tra cookie
    if (isset($_COOKIE['user'])) {
        self::updateCookie($id);
    }

    NotificationHelper::success('update_user', 'Cập nhật thông tin tài khoản thành công');
    return true;
}

    


    // public static function forgotPassword($data)
    // {
    //     $user = new User();

    //     $result = $user->getOneUserByUsername($data['username']);

    //     return $result;
    // }

    // public static function resetPassword($data)
    // {
    //     $user = new User();
    //     $result = $user->updateUserByUsernameAndEmail($data);

    //     return $result;
    // }



    
    public static function middleware()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($admin);
        $admin = $admin[1];

        if ($admin == 'admin') {
            // if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
            //     header('location: /login');
            //     exit;
            // }

                if (!isset($_SESSION['user'])) {
                    NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                    header('location: /login');
                    exit;
                }

                if ($_SESSION['user']['role'] != 1) {
                    NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
                    header('location: /login');
                    exit;
                }
        }
    }
}
