<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation
{
  public static function create(): bool
  {
    $is_valid = true;
    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', 'Vui lòng k để trống tên sản phẩm');
      $is_valid = false;
    }

    if (!isset($_POST['price']) || $_POST['price'] === '') {
      NotificationHelper::error('price', 'Vui lòng k để trống giá tiền');
      $is_valid = false;
    } elseif ((int)$_POST['price'] <= 0) {
      NotificationHelper::error('price', 'Giá tiền phải > 0');
      $is_valid = false;
    }

    if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
      NotificationHelper::error('discount_price', 'Vui lòng k để trống giá giảm');
      $is_valid = false;
    } elseif ((int)$_POST['discount_price'] < 0) {
      NotificationHelper::error('discount_price', 'Giá giảm phải >= 0');
      $is_valid = false;
    } elseif ((int)$_POST['discount_price'] > (int) $_POST['price']) {
      NotificationHelper::error('discount_price', 'Giá giảm phải < giá tiền');
      $is_valid = false;
    }

    if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
      NotificationHelper::error('category_id', 'Vui lòng k để trống tên loại');
      $is_valid = false;
    }

    if (!isset($_POST['is_feature']) || $_POST['is_feature'] === '') {
      NotificationHelper::error('is_feature', 'Vui lòng k để trống sản phẩm nổi bật');
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
    return self::create();
  }
  public static function uploadImage()
  {
    if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
      return false;
    }
    //nơi lưu trữ hình ảnh
    $target_dir = 'public/uploads/products/';
    //kiểm tra loại file
    $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
      NotificationHelper::error('type_upload', 'Vui lòng upload file JPG, JPEG, PNG, GIF');
      return false;
    }
    $nameImage = date('YmdHmi') . '.' . $imageFileType;
    $target_file = $target_dir . $nameImage;
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
      NotificationHelper::error('move_upload', 'Không thẻ tải ảnh');
      return false;
    }
    return $nameImage;
  }
}
