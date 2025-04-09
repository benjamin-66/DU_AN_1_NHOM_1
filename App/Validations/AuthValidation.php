<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;


class AuthValidation
{

public static function uploadAvatar()
    {
        if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            return false;
        }
        $target_dir = 'public/uploads/users/';
        $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Vui lòng up các file JPG, JPEG, PNG, GIF');
            return false;
        }
        $nameImage = date('YmdHmi') . '.' . $imageFileType;
        $target_file = $target_dir . $nameImage;
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thẻ tải ảnh vào thư mục đã lưu trữ');
            return false;
        }
        return $nameImage;
    }
}
    ?>