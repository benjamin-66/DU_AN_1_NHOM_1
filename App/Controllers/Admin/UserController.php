<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;
use App\Validations\UserValidation;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        $user = new User();
        $data = $user->getAllUser(); // Gọi phương thức getAllUsers()

        Header::render();
        Notification::render();
        Index::render($data);
        Footer::render();
    }

    //     // hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu
        $is_valid = UserValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit;
        }

        $username = $_POST['username'];
        // $status = $_POST['status'];

        // kiểm tra tên đăng nhập  có tồn tại chưa => không được trùng tên
        $user = new User();
        $is_exist = $user->getOneUserByUsername($username);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên người dùng đã này đã tồn tại');
            header('location: /admin/users/create');
            exit;
        }
        //Thực hiện thêm 
        $data = [
            'username' => $username,
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status'],
        ];
        $is_upload = userValidation::uploadAvatar();
        if($is_upload){
            $data['avatar'] = $is_upload;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm người dùng thành công');
            header('Location: /admin/users');
        } else {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('Location: /admin/users/create');
        }
        
    }



    //     // hiển thị chi tiết
    //     public static function show()
    //     {
    //     }


    //     // hiển thị giao diện form sửa
    //     // public static function edit(int $id)
    //     // {
    //     //     // giả sử data là mảng dữ liệu lấy được từ database
    //     //     $data = [
    //     //         'id' => $id,
    //     //         'name' => 'Category 1',
    //     //         'status' => 1
    //     //     ];
    //     //     if ($data) {
    //     //         Header::render();
    //     //         Edit::render($data);
    //     //         Footer::render();
    //     //     } else {
    //     //         header('location: /admin/users');
    //     //     }
    //     // }


    // //     // xử lý chức năng sửa (cập nhật)
    // //     public static function update(int $id)
    // //     {
    // //         echo 'Thực hiện cập nhật vào database';

    // //     }


    // //     // thực hiện xoá
    // //     public static function delete(int $id)
    // //     {
    // //         echo 'Thực hiện xoá';

    // //     }
}
