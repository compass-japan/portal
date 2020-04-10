<?php
//sentinel使用表記
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;
require("../../../portal_php/use_sentinel.php");

//ログイン確認
if(Sentinel::check()){
    $user = Sentinel :: getUser();
}else{
    header('Location: ../index.php');
    exit;
}
//$filename = "/books_img/".$user['id']."_".date('YmdHis'); 
//$file = $_FILES['bookimg'];
//
// if(is_uploaded_file($file['tmp_name'])){
//     move_uploaded_file($file['tmp_name'],);
// }
echo $_FILES['bookimg']['type'];


list($file_name,$file_type)=explode(",",$file['tmp_name']);

echo $file_type;