function getaddlangform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новая языковая версия',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=site&item=languages&authcode='+AUTHCODE+'&action=getaddlangform', true);
  req.send({  });
}
function lang_form(form)
{ if(!/^[a-zA-Z]+$/i.test(form.name.value))
  { alert("Пожалуйста, корректно заполните идентификатор (только латинские буквы и цифры)."); return false; }
  if(form.caption.value.replace(/\s+/, '').length==0)
  { alert("Пожалуйста, укажите название."); return false; }
  return true;
}
function geteditlangform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Свойства языковой версии',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=site&item=languages&authcode='+AUTHCODE+'&action=geteditlangform', true);
  req.send({ id: id });
}
function dellang(id)
{ if(confirm('Действительно удалить языковую версию?'))
  { if(confirm('Все разделы для этой языковой версии будут потеряны! Продолжить?'))
    goactionurl('admin.php?mode=site&item=languages&authcode='+AUTHCODE+'&action=del&id='+id);
  }
}
function setlangssort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=site&item=languages&authcode='+AUTHCODE+'&action=setsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
}