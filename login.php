<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

// Include the composer autoload file
require '../../vendor/autoload.php';

// Setup a new Eloquent Capsule instance
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'portal',
    'username'  => 'portal',
    'password'  => 'compass',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);

$capsule->bootEloquent();
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