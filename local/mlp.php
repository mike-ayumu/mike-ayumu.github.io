<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <title>検証用ページ</title>
    </head>
    <body> 
        <section class="container">
        
        <h1>中間ページ</h1>
        <h4>149/グループなし/ダイレクト計測/計測タグ利用(自動)/オーガニック検索ON/ローテションOFF</h4>
            
        <br>
        
        <a href="https://mike-ayumu.github.io/staging/case18/cv.html" class="btn btn-outline-secondary">成果ページへ</a><br>
        
        <hr>
        
        <a href="https://example.com">aタグ - パラメーターなし</a>
        <a href="https://example.com" data-add-c2d53562e22d12b0="AFAD">aタグ - パラメーターあり（uqIdが異なる）</a>
        <a href="https://example.com" data-add-9baz9728959157I1="AFAD">aタグ - パラメーターあり</a>
        
        <form action="https://example.com" method="post">
            <input type="submit" value="パラメーターなし">
        </form>
        <form action="https://example.com" method="post" data-add-c2d53562e22d12b0="AFAD">
            <input type="submit" value="パラメーターあり（uqIdが異なる）">
        </form>
        <form action="https://example.com" method="post" data-add-9baz9728959157I1="AFAD">
            <input type="submit" value="パラメーターあり">
        </form>
        
        <hr>
        
        <!-- 過去のタグ -->
        <!--
        <script id="ck_9baz9728959157I1" src="https://act.dev-cats.ademo.jp/ck/9baz9728959157I1/cookie.js"></script>
        <script>CATS_GroupCreate(149, "9baz9728959157I1");</script>
        -->
        
        <!-- 現在のタグ -->
        <script>
        (function(){
        var a=document.createElement("script");
        a.src="//act.dev-cats.ademo.jp/ck/9baz9728959157I1/cookie.js";
        a.id="ck_9baz9728959157I1"; 
        a.addEventListener("load",function(){CATS_Create(149,"9baz9728959157I1");});
        document.body.appendChild(a);
        })();
        </script>
        
        
        
        <h3 id="click">ローカルストレージ確認（ここをクリックして表示）</h3>
        <table>
            <tr>
                <th>キー</th>
                <th>値</th>
            </tr>
            <tbody id="tb">
            </tbody>
        </table>
            
        <hr>
        
        <button type="button" class="btn btn-outline-danger" onclick="cookieDel();">クッキー削除（消えない）</button>
        <button type="button" class="btn btn-outline-danger" onclick="localStorageDel();">ローカルストレージ削除</button>
        
        </section>
        
        <script>
            function cookieDel() {
                var cookies = document.cookie.split(";");
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];
                    var eqPos = cookie.indexOf("=");
                    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
                }
                alert('クッキーを削除しました。');
            }
            function localStorageDel() {
                window.localStorage&&window.localStorage.clear()
                alert('ローカルストレージを削除しました。');
            }
            document.getElementById('click').onclick = function() {
                // ローカルストレージのデータを表に出力
                var viewStorage = function(){
                    var tb = document.getElementById("tb")
                    // テーブルの初期化
                    while (tb.firstChild){
                      tb.removeChild(tb.firstChild);
                    }
                    // テーブルの出力
                    for (var i=0; i < localStorage.length; i++) {
                        var _key = localStorage.key(i);
                        var tr = document.createElement("tr");
                        var td1 = document.createElement("td");
                        var td2 = document.createElement("td");
                        tb.appendChild(tr);
                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        td1.innerHTML = _key;
                        td2.innerHTML = localStorage.getItem(_key);
                    }
                };
                viewStorage();
                
                
                
                let fromActionList = "";
                let formTag = document.getElementsByTagName('form');
                for (var i = 0; i < formTag.length; i++) {
                    fromActionList += formTag[i].action + "\n";
                }
                alert("クッキー\n" + document.cookie);
                alert("フォームアクションURL\n" + fromActionList);
            };
        </script>
    </body>
</html>
