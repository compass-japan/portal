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
if(Sentinel::check()){
    header('Location: top.php');
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="wrapper">

    <section>
       <form action="login.php" method="post" enctype="multipart/form-data">
        <dl>
            <dt><img src="./images/email.svg" alt="メールアドレス" class="icon">e-mail</dt>
            <dd><input type="text" name="email"></dd>
            <dt><img src="./images/password.svg" alt="パスワード" class="icon">pass word</dt>
            <dd><input type="password" name="password"></dd>
        </dl>
        <p class="submit"><input type="submit" value="LOGIN"></p>
        </form>
            <p class="new"><a href="new.php">新規作成</a></p>   
    </section>
</div>

</body>
</html>


