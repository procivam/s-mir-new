function getaddform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новый вид доставки',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddform', true);
  req.send({ });
}
function geteditform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор вида доставки',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditform', true);
  req.send({ id : id });
}
function courier_form(form)
{ if(form.name.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, укажите название."); return false; }
  return true;
}
function delcourier(id)
{ if(confirm('Действительно удалить вид доставки?'))
  goactionurl('admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=del&id='+id);
}
function setsort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=setsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
}