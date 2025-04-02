<?php

namespace App\Helpers;

class NotificationHelper
{
    // Lưu thông báo thành công vào session
    public static function success($key, $message)
    {
        $_SESSION['success'][$key] = $message;
    }

    // Lưu thông báo lỗi vào session
    public static function error($key, $message)
    {
        $_SESSION['error'][$key] = $message;
    }

    // Xóa thông báo khỏi session
    public static function unset()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }

    // Phương thức hiển thị thông báo
    public static function display()
    {
        // Hiển thị thông báo thành công
        if (!empty($_SESSION['success']['contact_form'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success']['contact_form'] . '</div>';
        }

        // Hiển thị thông báo lỗi
        if (!empty($_SESSION['error']['contact_form'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error']['contact_form'] . '</div>';
        }

        // Xóa thông báo sau khi hiển thị
        self::unset();
    }
}


