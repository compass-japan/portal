<?php
    try{
        $db = new PDO('mysql:dbname=portal;host=localhost;charset=utf8','portal','compass');
    } catch (PDOException $e){
        echo 'DB接続エラー:'.$e->getMEssage();
    }
    $today = date("Y-m-d 00:00:00");
    $a = $db -> query('select * FROM schedule where date > "'.$today.'"');
    echo "<dl>";
    while($b = $a -> fetch()){

        echo "<dt>".$b['date']."</dt>";
        echo "<dd>".$b['title']."</dd>";
    }
    echo "</dl>";
?>