function cookieDel() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=; domain=."+document.location.host+"; path = / ;max-age = 0";
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
    viewCookie();
    
    let fromActionList = "";
    let formTag = document.getElementsByTagName('form');
    for (var i = 0; i < formTag.length; i++) {
        fromActionList += formTag[i].action + "\n";
    }
    
    alert("クッキー\n" + document.cookie);
    alert("フォームアクションURL\n" + fromActionList);
};





function　viewCookie(){
        var tb = document.getElementById("c-tb")
        var cookies = getCookieArray();
        // テーブルの初期化
        while (tb.firstChild){
            tb.removeChild(tb.firstChild);
        }
        // テーブルの出力
        for (var i=0; i < cookies; i++) {
            var _key = localStorage.key(i);
            var tr = document.createElement("tr");
            var td1 = document.createElement("td");
            var td2 = document.createElement("td");
            tb.appendChild(tr);
            tr.appendChild(td1);
            tr.appendChild(td2);
            td1.innerHTML = i;
            td2.innerHTML = cookies[i];
        }
};


//cookie値を連想配列として取得する
function getCookieArray(){
    var arr = new Array();
    if(document.cookie != ''){
        var tmp = document.cookie.split('; ');
        for(var i=0;i<tmp.length;i++){
            var data = tmp[i].split('=');
            arr[data[0]] = decodeURIComponent(data[1]);
        }
    }
    return arr;
}
