<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍を追加</title>
</head>
<body>
   <form action="regi_book.php" method="POST" enctype="multipart/form-data">
   <dl>
       <dt>イメージ画像：</dt>
       <dd><input type="file" name="bookimg"></dd>
       <dt>書籍タイトル</dt>
       <dd><input type="text" name="title"></dd>
       <dt>対象</dt>
       <dd>
            <label>初めの一冊<input type="radio" name="lv" value="1"></label>
            <br>
            <label>初心者<input type="radio" name="lv" value="2"></label>
            <br>
            <label>中級者<input type="radio" name="lv" value="3"></label>
            <br>
            <label>上級者<input type="radio" name="lv" value="4"></label>
       </dd>
       <dt>所有者：</dt>
       <dd>
            <label>会社:<input type="radio" name="owner" value="0"></label>
            <br>
            <label>個人:<input type="radio" name="owner" value="1"></label>
       </dd>
       <dt>言語：</dt>
       <select name="lang" id="">
           <option value="デザイン">デザイン</option>
           <option value="HTML">HTML/CSS</option>
           <option value="JS">JavaScript</option>
           <option value="PHP">PHP</option>
           <option value="SQL">SQL</option>
           <option value="JAVA">JAVA</option>
       </select>
   </dl>
    <input type="submit" value="登録">
    </form>
</body>
</html>