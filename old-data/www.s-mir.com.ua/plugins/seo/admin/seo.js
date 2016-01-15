function getaddseoform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новый URL',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddform', true);
  req.send({ });
}
function geteditseoform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор URL',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditform', true);
  req.send({ id : id });
}
function seo_form(form)
{ if(form.url.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, укажите URL ."); return false; }
  return true;
}
function delurlseo(id)
{ if(confirm('Действительно удалить запись?'))
  goactionurl('admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=del&id='+id);
}
function geturlseoform(url)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('SEO оптимизация',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+SEOSTRUCTURE+'&authcode='+AUTHCODE+'&action=geturlform', true);
  req.send({ url : url });
}
function saveurlseo(form)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    Windows.closeAll();
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+SEOSTRUCTURE+'&authcode='+AUTHCODE+'&action=saveurl',true);
  req.send({ form: form });
}