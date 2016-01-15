function getaddbaseform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS) 
    modal_window_html('Дополнительная база данных',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;    
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=system&item=bases&authcode='+AUTHCODE+'&action=getaddbaseform', true);
  req.send({  });
}
function base_form(form)
{ if(form.host.value.replace(/\s+/, '').length==0)
  { alert("Пожалуйста, укажите хост."); return false; }
  if(form.name.value.replace(/\s+/, '').length==0)
  { alert("Пожалуйста, укажите название."); return false; }
  if(form.user.value.replace(/\s+/, '').length==0)
  { alert("Пожалуйста, укажите пользователя."); return false; }
  return true;  
}
function geteditbaseform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Дополнительная база данных',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=system&item=bases&authcode='+AUTHCODE+'&action=geteditbaseform', true);
  req.send({ id: id });
}
function delbase(id)
{ if(confirm('Действительно удалить базу данных из списка дополнительных?'))
  goactionurl('admin.php?mode=system&item=bases&authcode='+AUTHCODE+'&action=del&id='+id);  
}