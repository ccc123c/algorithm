function createTable(json, ele) {
    var table = document.createElement('table');
    ele.appendChild(table);
    table.className = "hm_table";
    var thead = document.createElement('thead');
    table.appendChild(thead);
    var trHead = document.createElement('tr');
    thead.appendChild(trHead);
    for (var i = 0; i < json.head.length; i++) {
        var th = document.createElement('th');
        th.innerHTML = json.head[i];
        trHead.appendChild(th);
    }
    var th = document.createElement('th');
    th.innerHTML = "操作";
    trHead.appendChild(th);
    var tbody = document.createElement('tbody');
    table.appendChild(tbody);
    for (var i = 0; i < json.content.length; i++) {
        var trBody = document.createElement('tr');
        for (var k in json.content[i]) {
            var td = document.createElement('td');
            td.innerHTML = json.content[i][k];
            trBody.appendChild(td);
        }
        var td = document.createElement('td');
        td.innerHTML="<a href='#'>删除</a>";
        trBody.appendChild(td);
        td.children[0].onclick=function () {
            tbody.removeChild(this.parentNode.parentNode);
        };
        tbody.appendChild(trBody);
    }
}