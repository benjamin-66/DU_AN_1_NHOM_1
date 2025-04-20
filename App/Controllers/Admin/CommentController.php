<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;

class  CommentController
{


    // hiển thị danh sách
    public static function index()
    {
       

        $comment = new Comment();
        $data = $comment->getAllCommentJoinProductAndUser();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


   


    // // xử lý chức năng thêm
    // public static function store()
    // {
    //     // validation các trường dữ liệu
    //     $is_valid =  CommentValidation::create();
    //     if (!$is_valid) {
    //         NotificationHelper::error('store', 'thêm  bình luận thất bại');
    //         header('location: /admin/ comments/create');
    //         exit;
    //     }

    //     $name = $_POST['name'];
    //     $status = $_POST['status'];
    //     // kiểm tra tên loại có tồn tại chưa => ko đc trùng tên
    //     $ comment = new  Comment();
    //     $is_exist = $ comment->getOne CommentByName($name);

    //     if ($is_exist) {
    //         NotificationHelper::error('store', 'Tên  bình luận đã tồn tại');
    //         header('location: /admin/ comments/create');
    //         exit;
    //     }

    //     echo 'oki';

    //     // thực hiện thêm
    //     $data = [
    //         'name' => $name,
    //         'status' => $status
    //     ];

    //     $result = $ comment->create Comment($data);

    //     if ($result) {
    //         NotificationHelper::success('store', 'Thêm sản phẩm thành công');
    //         header('location: /admin/ comments');
    //         exit;
    //     }
    // }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    // public static function edit(int $id)
    // {
        
    //     $comment = new  Comment();
    //     $data = $comment->getOneCommentJoinProductAndUser($id);

    //     if (!$data) {
    //         NotificationHelper::error('edit', 'Không thể xem  bình luận này');
    //         header('location: /admin/comments');
    //         exit;
    //     }

    //     // echo '<pre>';
    //     // var_dump($data);
        

    //         Header::render();
    //         Notification::render();
    //         NotificationHelper::unset();
    //         // hiển thị form sửa
    //         Edit::render($data);
    //         Footer::render();


    // hiển thị chi tiết      
    // hiển thị chi tiết
    public static function show()
    {
    }


    //hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $Comment = new Comment();
        $data = $Comment->getOneCommentJoinProductAndUser($id);
        // echo '<pre>';
        // var_dump($data);
        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem bình luận này');
            header('location: /admin/comments');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
      
    }

    //     if($result){
    //         NotificationHelper::success('delete', 'Xóa bình luận thành công');
    //     }else{
    //         NotificationHelper::success('delete', 'Xóa bình luận thất bại');
    //     }

//     // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        $is_valid = CommentValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/comments/$id");
            exit;
        }
       
        $status = $_POST['status'];
        $Comment = new Comment();
    
        $data= [
           
            'status' => $status
        ];
        $result = $Comment->updateComment($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'cập nhật thành công');
            header('location: /admin/comments');
        } else {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/comments/$id");
        }

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $Comment = new Comment();
        $result = $Comment->deleteComment($id);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa thất bại');
        }
        header('location: /admin/comments');
    
        
    }
 
    }
