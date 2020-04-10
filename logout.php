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

$user = Sentinel::check();
Sentinel::logout($user);
header('Location: index.php');

?>