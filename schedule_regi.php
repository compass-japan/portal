<?php
    try{
        $db = new PDO('mysql:dbname=portal;host=localhost;charset=utf8','portal','compass');
    }catch(PDOException $e){
        echo 'DB接続エラー';
    }
if(isset($_POST['title'])){
    $memo = nl2br($_POST['memo']);
    $db->exec('insert into schedule set memo="'.$memo.'",title="'.$_POST['title'].'",date="'.$_POST['date'].'"');
    header("Location: top.php");
}

?>
   

   
<form action="" method="post">
    <input type="text" name="title" value="title">
    <textarea name="memo">memo</textarea>
    <input type="text" name="date" value="<?php  echo date("Y-m-d"); ?>">
    <input type="submit" value="とーろく">

</form>


