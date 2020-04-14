<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'require/use_sentinel.php';

if(!isset($_POST['email']) || !isset($_POST['password'])) {
    if (htmlspecialchars($_POST["email"]) == "" || htmlspecialchars($_POST['password']) == ""){
        header('Location: index.php');
    }
}else{
  
$credentials = [  
   'email'  => htmlspecialchars($_POST['email']),  
   'password' => htmlspecialchars($_POST['password']) 
 ];  
 $user = Sentinel::authenticate($credentials);
if($user){
    header('Location: top.php');
}else{
    header('Location: index.php');
}
}
?>