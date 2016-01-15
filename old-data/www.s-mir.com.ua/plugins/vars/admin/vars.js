function getaddform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новая переменная',req.responseJS.html,800);
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
    modal_window_html('Редактор переменной',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditform', true);
  req.send({ id : id });
}
function opt_form(form)
{ if(!/^[a-zA-Z0-9_\-]+$/i.test(form.name.value))
  { alert("Пожалуйста, корректно заполните идентификатор (только латинские буквы и цифры)."); return false; }
  if(form.caption.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, заполните название."); return false; }
  return true;
}
function delopt(id)
{ if(confirm('Действительно удалить переменную?'))
  goactionurl('admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=del&id='+id);
}
function setmode(check)
{ $('mode_string').style.display=check?'none':'';
  $('mode_text').style.display=check?'':'none';
  modal_refresh();
}
function getaddurlform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новое условие',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddurlform', true);
  req.send({ id: getParam('idv',0) });
}
function getediturlform(url)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор значений',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getediturlform', true);
  req.send({ id: getParam('idv',0), url : url });
}
function url_form(form)
{ if(form.url.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, укажите URL ."); return false; }
  return true;
}
function delurl(url)
{ if(confirm('Действительно удалить переменную?'))
  goactionurl('admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=delurl&id='+getParam('idv',0)+'&url='+url+'&tab=urls');
}
function setvarsort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=setsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
}