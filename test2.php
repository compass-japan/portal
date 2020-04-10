<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>sample</title>
  <script>

    var request = new XMLHttpRequest();
    function selectboxChange() {
          selindex = document.form1.id.selectedIndex;
          switch (selindex) {
            case 1:
              request.open('POST', 'http://localhost/portal_test/test.php?str=HTML', true);
              request.responseType = 'json';
              request.addEventListener('load', function (response) {
                var data = <?php print "this.response" ?>;
                let html = create_html(data);
                document.getElementById("ans1").innerHTML = html;
                document.getElementById("ans2").innerHTML = data[0].level;
               
              });
              request.send();
              break;
            case 2:
              request.open('GET', 'http://localhost/portal_test/test.php?str=PHP', true);
              request.responseType = 'json';
              request.addEventListener('load', function (response) {
                var data = <?="this.response"?>;
                document.getElementById("ans1").innerHTML = "ans1=" + data[0];
                document.getElementById("ans2").innerHTML = "ans2=" + data.ans2;
              });
              request.send();
              break;
            case 3:
              request.open('GET', 'http://localhost/portal_test/test.php?str=デザイン', true);
              request.responseType = 'json';
              request.addEventListener('load', function (response) {
                var data = <?="this.response"?>;
                document.getElementById("ans1").innerHTML = "ans1=" + data[0];
                document.getElementById("ans2").innerHTML = "ans2=" + data.ans2;
              });
              request.send();
              break;
          }
        }    
    

</script>
</head>
<body>

<form action="" name="form1">
<select id="id" onchange="selectboxChange();">
<option value="">選択してください</option>
<option value="1">HTML</option>
<option value="2">PHP</option>
<option value="3">デザイン</option>
</select>
</form>
  <div id="ans1"></div>
  <div id="ans2"></div>

</body>
</html>