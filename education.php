<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;
require("../../portal_php/use_sentinel.php");
//上記　sentinel使用表記




if(Sentinel::check()){
    $user = Sentinel :: getUser();
}else{
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/top.css">
</head>
<body>
   <div class="wrapper">
        <?php include("include/header.php"); ?>
        <main>
            <a href="/portal_test/books/index.php">蔵書</a>
        </main>
        <?php include("include/footer.php"); ?>
   </div>

</body>
</html>