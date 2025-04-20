<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
    public static function create(): bool
    {
        $is_valid = true;

        // tên đăng nhập
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'không để trống tên đăng nhập');
            $is_valid = false;
        }

        // mật khẩu
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'không để trống tên mật khẩu');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải lớn hơn 3 ký tự');
                $is_valid = false;
            }
        }

        // nhập lại mật khẩu
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'không để trống tên mật khẩu');
            $is_valid = false;
        } else {
            // kiểm tra độ dài
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Trường mật khẩu và nhập lại mật khẩu phải giống nhau');
            }
        }


        // email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'không để trống email');
            $is_valid = false;
        } else {
            //    kiểm tra đúng dạng email
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
            }
        }

        //họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'không để trống họ và tên');
            $is_valid = false;
        }

        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('name', 'không để trống trạng thái');
            $is_valid = false;
        }


        return $is_valid;
    }
    public static function edit(): bool
    {
        $is_valid = true;

        // mật khẩu
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải lớn hơn 3 ký tự');
                $is_valid = false;
            }
            // nhập lại mật khẩu
            if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
                NotificationHelper::error('re_password', 'không để trống tên mật khẩu');
                $is_valid = false;
            } else {
                // kiểm tra độ dài
                if ($_POST['password'] != $_POST['re_password']) {
                    NotificationHelper::error('re_password', 'Trường mật khẩu và nhập lại mật khẩu phải giống nhau');
                }
            }
        }




        // email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
            //    kiểm tra đúng dạng email
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
            }
        }

        //họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'không để trống họ và tên');
            $is_valid = false;
        }

        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('name', 'không để trống trạng thái');
            $is_valid = false;
        }



        return $is_valid;
    }

    public static function uploadAvatar()
    {
        return Authvalidation::uploadAvatar();
    }
}
