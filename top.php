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

if(isset($_POST['sche_id'])){
    include("sche_det.php");
}
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TOP</title>
    <link rel="stylesheet" href="css/top.css">
</head>
<body>
    <div class="wrapper">
    <?php include("include/header.php"); ?>
       <main>
           <section>
               <div class="calender">
                   <?php
                        include("schedule.php");
                   ?>

               </div>
               <ul>
                    <li><a href="education.php">教育</a></li>
                    <li><a href="">各種書類</a></li>
                    <li><a href="">日報LOG</a></li>
                    <li><a href="">面談報告書</a></li>                  
               </ul>
               <div class="news">
                   <h2>NEWS</h2>
                   <?php include("news.php"); ?>
               </div>
           </section>
           
       </main>
       <?php include("include/footer.php"); ?>
       
   </div>
    <p><?php echo $user["first_name"]."さんろぐいんちゅう"; ?></p>

</body>
</html>