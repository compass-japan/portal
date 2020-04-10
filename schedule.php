<?php

    $y = date('Y');
    $m = date('m');
    $d = 1;   

    try{
    $db = new PDO('mysql:dbname=portal;host=localhost;charset=utf8','portal','compass');
    } catch (PDOException $e){
        echo 'DB接続エラー:'.$e->getMEssage();
    }
    ?>   

    <table border ="1">
    <caption><?php echo $y."年".$m  ?>月</caption>
    <tr>
       <th>Sun.</th>
       <th>Mon.</th>
       <th>Tue.</th>
       <th>Wed.</th>
       <th>Thr.</th>
       <th>Fri.</th>
       <th>Sat.</th>
    </tr>
    <tr>

<?php
    $wd1 = date("w", mktime(0, 0, 0, $m, 1, $y));
    for ($i = 1; $i <= $wd1; $i++) {
    echo '<td>　</td>';
    }
    while (checkdate($m, $d, $y)) {
        $a = $db->query('select * FROM schedule where date = "'.$y.'-'.$m.'-'.$d.'"');
        echo '<td><h2>'.$d."</h2>";
     while($b = $a->fetch()){
              $c = mb_strimwidth($b['title'], 0, 7, "...");
              echo '<form action="top.php" method="post"><input type="hidden" name="sche_id" value="'.$b['id'].'"><input type="submit" value="'.$c.'"></form>';
        
     }
        echo "</td>";
        $d++;
        if (date("w", mktime(0, 0, 0, $m, $d, $y)) == 0) {
        // 週を終了
        echo "</tr>";
            if (checkdate($m, $d + 1, $y)) {
                echo '<tr>';
            }
        }   
    }
    $wdx = date("w", mktime(0, 0, 0, $m + 1, 0, $y));
    for ($i = 1; $i < 7 - $wdx; $i++) {
        echo "<td>　</td>";
    }
?>
</table>
<a href="schedule_regi.php">予定を追加</a>








