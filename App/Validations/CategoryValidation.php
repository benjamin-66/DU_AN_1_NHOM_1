<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CategoryValidation
{
    public static function create(): bool
    {
        $is_valid = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Vui lòng k để trống tên');
            $is_valid = false;
        }
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Vui lòng k để trống trạng thái');
            $is_valid = false;
        }
        return $is_valid;
    }
    public static function edit(): bool
    {
        $is_valid = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Vui lòng k để trống tên loại');
            $is_valid = false;
        }
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Vui lòng k để trống trạng thái');
            $is_valid = false;
        }
        return $is_valid;
    }
}
