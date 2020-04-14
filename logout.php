<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'require/use_sentinel.php';

$user = Sentinel::check();
Sentinel::logout($user);
header('Location: index.php');

?>