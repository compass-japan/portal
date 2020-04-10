<div id="detail">
    <?php
    try{
    $db = new PDO('mysql:dbname=portal;host=localhost;charset=utf8','portal','compass');
    } catch (PDOException $e){
        echo 'DB接続エラー:'.$e->getMEssage();
    }
    $a = $db->query('select * FROM schedule where id="'.$_POST['sche_id'].'"');
    
    ?>
    
    <?php if($b = $a->fetch()) : ?>
    <h1><?php echo $b['title']; ?></h1>
    <p><?php echo $b['memo']; ?></p>
    <p><a href="top.php">もどる</a></p>
    <form action="delete_schedule.php" method="post">
    <?php echo '<input type="hidden" name="del_id" value="'.$_POST['sche_id'].'">' ?>
    <input type="submit" value="予定を削除"></form>
    <?php endif; ?>      
</div>
<div id="detail_back"><a href="top.php"></a></div>

