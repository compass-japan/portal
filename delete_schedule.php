<?php
        try{
        $db = new PDO('mysql:dbname=portal;host=localhost;charset=utf8','portal','compass');
    }catch(PDOException $e){
        echo 'DB接続エラー';
    }
    if(isset($_POST['del_id'])){
    $db->exec('DELETE FROM schedule WHERE schedule.id = "'.$_POST['del_id'].'"');
    header("Location: top.php");
}
?>