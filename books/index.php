<?php
//sentinel使用表記
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;
require("../../../portal_php/use_sentinel.php");

//ログイン確認
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
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>蔵書一覧</title>
    <link rel="stylesheet" href="../css/top.css">
    <link rel="stylesheet" href="../css/books.css">
    <script>
        //かんすう
        let create_html = (ary) =>{
        let html = "";
        for(let i = 0; i < ary.length; i++){
            html += '<div class="book lv';
            html += ary[i].level;
            html += (ary[i].type === 0)?" kojin":" kaisha";
            html += '"><h3>';
            html += ary[i].title;
            html += '</h3><p><img src="/portal_test/books/books_img/';
            html += ary[i].image;
            html += '"></p></div>';
            }
            return html;
        }
        //ここまでかんすう
        //ここからセレクトとAjax
            let createBook = (num,ary) => {
            let books = document.getElementById("books");
            let html = "<div class=book>"    
            for(let i = 0; i < num; i++){
                books.insertAdjacentHTML('afterbegin','<div class=book></div>');
            }
                
            
            
        }
        
        var request = new XMLHttpRequest();
        function selectboxChange() {
        selindex = document.form1.id.selectedIndex;
            switch (selindex) {
                case 1:
                request.open('POST', 'http://localhost/portal_test/test.php?str=HTML', true);
                request.responseType = 'json';
                request.addEventListener('load', function (response) {
                var data = this.response;
                let html = create_html(data);
                document.getElementById("books").innerHTML = html;
                
              });
              request.send();
              break;
            case 2:
              request.open('GET', 'http://localhost/portal_test/test.php?str=PHP', true);
              request.responseType = 'json';
              request.addEventListener('load', function (response) {
                var data = this.response;
                let html = create_html(data);
                document.getElementById("books").innerHTML = html;
              });
              request.send();
              break;
            case 3:
              request.open('GET', 'http://localhost/portal_test/test.php?str=デザイン', true);
              request.responseType = 'json';
              request.addEventListener('load', function (response) {
                var data = this.response;
                let html = create_html(data);
                document.getElementById("books").innerHTML = html;
              });
              request.send();
              break;
          }
        }    
    
    

    </script>
</head>


<body>
    <div class="wrapper">
    <?php include("../include/header.php") ?>
    <main>
        <section class="sbooks">
        <div class="booknews">
            <h2>新着書籍</h2>
        </div>
        <form action="" name="form1" class="select">
            <select id="id" onchange="selectboxChange();">
                <option value="">言語を選択してください</option>
                <option value="1">HTML</option>
                <option value="2">PHP</option>
                <option value="3">デザイン</option>
            </select>
        </form>
        <div class="books" id="books">
          <div class="noselect">
            <p>言語を選択してください</p>
          </div>
        </div>
        </section>
    </main>
    <?php include("../include/footer.php") ?>
    </div>
        <p><?php echo $user["first_name"]."さんろぐいんちゅう"; ?></p>
        <p><a href="regist_book.php">とうろく</a></p>
</body>
</html>