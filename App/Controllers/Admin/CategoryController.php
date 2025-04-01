<?php

namespace App\Controllers\Admin;
use App\Validations\CategoryValidation;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Category\Create;
use App\Views\Admin\Pages\Category\Edit;
use App\Views\Admin\Pages\Category\Index;

class CategoryController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
     
        $category = new Category();
        $data = $category-> getAllCategory();

     

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        $is_valid =CategoryValidation::create();
        
        if (!$is_valid){
            NotificationHelper::error('store','Thêm loại sản phẩm thất bại');
            header('location: /admin/categories/create');
            exit;
        }
        $name=$_POST['name'];
        $status=$_POST['status'];

       // kiểm tra tên loại có tồn tại chưa=> kh được trùng tên
      $category=new Category();
       $is_exist=$category->getOneCategoryByName($name);
       if($is_exist){
        NotificationHelper::error('store','Tên loại sản phẩm đã tồn tại');
            header('location: /admin/categories/create');
            exit;
       }
       //Thực hiện thêm
       $data=[
        'name'=>$name,
        'status'=>$status
       ];
       $result=$category->createCategory($data);
       if($result){
        NotificationHelper::success('store','Thêm loại sản phẩm thành công');
            header('location: /admin/categories');
            
       }
       else{
        NotificationHelper::error('store','Thêm loại sản phẩm thất bại');
            header('location: /admin/categories/create');
       }
    }


    // hiển thị chi tiết
       
    


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            'id' => $id,
            'name' => 'Category 1',
            'status' => 1
        ];
        if ($data) {
            Header::render();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/categories');
        }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        echo 'Thực hiện cập nhật vào database';

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        echo 'Thực hiện xoá';
        
    }
}
