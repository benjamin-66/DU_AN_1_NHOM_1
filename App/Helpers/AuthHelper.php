<?php  

namespace App\Helpers;

use App\Models\User;

class AuthHelper  
{  
    public static function register($data)  
    {  
        // bắt tồn tại username  
      
        $user=new User();
    
       
        $is_exist=$user->getOneUserByUsername($data['username']); 
        if($is_exist) {   
            NotificationHelper::error('exist_register', 'Tên đăng nhập  đã tồn tại');
            return false;  
        }

        $result = $user->createUser($data);

        if ($result) {  
            NotificationHelper::success(key: 'register', message: 'Đăng ký thành công');
            return true;  
        }
        NotificationHelper::error(key: 'register', message: 'Đăng ký thất bại ');

        return false;
    }
}  