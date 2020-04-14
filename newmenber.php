<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'require/use_sentinel.php';

$credentials = [  
   'email'  => htmlspecialchars($_POST['email'],ENT_QUOTES),
   'password' => htmlspecialchars($_POST['password'],ENT_QUOTES),
   'first_name' => htmlspecialchars($_POST['name'],ENT_QUOTES)
 ];  



$user = Sentinel::getUserRepository()->findByCredentials($credentials);
if (is_null($user)){
    $user = Sentinel::registerAndActivate($credentials);
    header('Location: index.php');
}else{
    echo "既に登録されています";
}
?>
