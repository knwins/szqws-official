/* $Id: listtable.js 14980 2008-10-22 05:01:19Z testyang $ */
<!--
var _edit = {
    IN: function(obj, act, id) {
        var tag = obj.firstChild.tagName;
		act=act+"&tableidv="+id;
        if (typeof(tag) != "undefined" && (tag == "INPUT" || tag == "TEXTAREA")) return;
        var org = obj.innerHTML;
        var orglen = org.replace(/[^\x00-\xff]/g, '**').length;
        if (obj.offsetHeight <= 25) {
            var val = window.ActiveXObject ? obj.innerText: obj.textContent;
            var txt = document.createElement("INPUT");
			var iwidth=obj.offsetWidth+10;
            txt.value = val;
            txt.style.background = "#FFFFFF";
            txt.style.width = iwidth + "px";
            obj.innerHTML = "";
            obj.appendChild(txt);
            txt.focus();
            txt.onblur = function(e) {
                obj.innerHTML = txt.value;
                _edit.QUERY(act, obj.innerHTML);
                return false;
            }
            return false;
        } else {
            var content = obj.innerHTML;
            var html = document.createElement('TEXTAREA');
			var iwidth=obj.offsetWidth+10;
            html.style.width = obj.iwidth + "px";
            html.style.height = obj.offsetHeight + "px";
            obj.innerHTML = "";
            html.value = content;
            obj.appendChild(html);
            html.focus();
            html.onblur = function(e) {
                obj.innerHTML = html.value;
                _edit.QUERY(act, obj.innerHTML);
            }
            return false;
        }

    },
    QUERY: function(url, postData) {
	   var req = (window.XMLHttpRequest) ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : false);
        if (!req) alert("Unable to creat an XMLHttpRequest");
		var url=url+"&tablenamevalue="+encodeURIComponent(postData);
       // var method = (postData) ? "POST": "GET";
        req.open("GET", url, true);
        if (postData) req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                if (req.status == 200) {
                } else {
                    alert("There was a problem with the request " + req.status);
                }
            }
        }
        req.send(postData);
		
	 
    }
}

var editContent = _edit.IN;
// -->