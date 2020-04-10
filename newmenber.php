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
