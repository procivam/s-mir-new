function getaddrssform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новый RSS канал',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddrssform', true);
  req.send({ });
}
function geteditrssform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор RSS канала',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditrssform', true);
  req.send({ id : id });
}
function rss_form(form)
{ if(!/^[0-9]+$/i.test(form.rows.value))
  { alert("Пожалуйста, укажите размер."); return false; }
  return true;
}
function delrss(id)
{ if(confirm('Действительно удалить rss канал?'))
  document.location='admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=delrss&id='+id;
}
function getcategories(id,form)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    { form.idcat.length=req.responseJS.ids.length+1;
	  form.idcat[0].text='Все';
	  form.idcat[0].value=0;
	  for(i=1;i<=req.responseJS.names.length;i++)
	  { form.idcat[i].text=req.responseJS.names[i-1];
	    form.idcat[i].value=req.responseJS.ids[i-1];
	  }
	  form.idcat.value=0;
	  $('catsbox').style.display=req.responseJS.names.length>0?'':'none';
	  modal_refresh();
	}
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getcategories',true);
  req.send({ id: id });
}