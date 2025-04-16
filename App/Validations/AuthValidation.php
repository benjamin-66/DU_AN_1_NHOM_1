<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation
{
  // bắt lỗi form đăng ký
  public static function register(): bool
  {
    $is_valid = true;
    // Tên đăng nhập
    if (!isset($_POST['username']) || $_POST['username'] === '') {
      NotificationHelper::error('username', 'Vui lòng không để trống tên đăng nhập');
      $is_valid = false;
    }
  
     // Maat khau
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        NotificationHelper::error('password', 'Vui lòng không được để trống mật khẩu');
        $is_valid = false;

    }
    else {
        // Kiểm tra độ dài
        if (strlen($_POST['password']) < 3) {
          NotificationHelper::error('password', 'Mật khẩu phải từ 3 ký tự');
          $is_action = false;
        }
      }

        // Nhập lại mật khẩu
    if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
        NotificationHelper::error('re_password', ' Không để trống nhập lại mật khẩu');
        $is_valid = false;
      } else {
        if ($_POST['password'] != $_POST['re_password']) {
          NotificationHelper::error('re_password', ' Trường mật khẩu và mật khẩu nhập lại phải giống nhau');
          $is_valid = false;
        }
      }

   // email
 if (!isset($_POST['email']) || $_POST['email'] === '') {
    NotificationHelper::error('email', ' Không được để trống email');
    //echo "<div class='alert alert-danger'>Vui lòng nhập email.</div>";
    $is_valid = false;
  } else {
    // Kiểm tra định dạng email
    $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (!preg_match($emailPattern, $_POST['email'])) {
      NotificationHelper::error('email', 'Email không đúng định dạng ');
      $is_action = false;
    }
  }

    

    // Họ Và Tên 
    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', ' Không được để trống họ và tên');
      $is_valid = false;
    }
  
    return $is_valid;
  }


  public static function login(): bool
  {
    $is_valid = true;
    // Tên đăng nhập
    if (!isset($_POST['username']) || $_POST['username'] === '') {
      NotificationHelper::error('username', 'Vui lòng không để trống tên đăng nhập');
      $is_valid = false;
    }
  
     // Maat khau
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        NotificationHelper::error('password', 'Vui lòng không được để trống mật khẩu');
        $is_valid = false;

    }

    
    return $is_valid;
  }

  public static function edit(): bool
  {
      $is_valid = true;

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
          NotificationHelper::error('name', 'không để họ và tên');
          $is_valid = false;
      }

      return $is_valid;
  }


  public static function uploadAvatar() {
    if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
        return false;
    }

    $target_dir = 'public/uploads/users/';
    
    // Kiểm tra thư mục upload có tồn tại không
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa có
    }

    // Kiểm tra loại file upload có hợp lệ không
    $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF');
        return false;
    }

    // Thay đổi tên file thành dạng năm tháng ngày giờ phút giây
    $nameImage = date('YmdHis') . '.' . $imageFileType;

    // Đường dẫn đầy đủ để di chuyển file
    $target_file = $target_dir . $nameImage;

    // Di chuyển file từ tạm thời vào thư mục đích
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
        NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
        return false;
    }

    return $nameImage;
}

}