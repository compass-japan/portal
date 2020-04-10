<?php
    try{
        $db = new PDO('mysql:dbname=portal;host=localhost;charset=utf8','portal','compass');
    } catch (PDOException $e){
        echo 'DB接続エラー:'.$e->getMEssage();
    }
    $array = [];
    $a = $db -> query('select * FROM books where category = "'.$_GET['str'].'"');

    while($b = $a -> fetch()){
        $array[] = ['id'=>$b['id'],'title'=>$b['name'],'level'=>$b['level'],'image'=>$b['image'],'type'=>$b['type']];
    }



header("Content-Type: text/javascript; charset=utf-8");
echo json_encode($array);


?>