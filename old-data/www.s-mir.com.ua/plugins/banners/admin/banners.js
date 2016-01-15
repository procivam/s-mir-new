function getaddcatform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новая категория',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddcatform', true);
  req.send({ });
}
function geteditcatform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор категории',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditcatform', true);
  req.send({ id : id });
}
function cat_form(form)
{ if(form.elements.name.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, укажите название."); return false; }
  return true;
}
function delcat(id)
{ if(confirm('Действительно удалить категорию?'))
  document.location='admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=delcat&tab=cat&id='+id;
}
function getaddbannerform(idcat)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новый баннер',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddbannerform', true);
  req.send({ idcat: idcat });
}
function geteditbannerform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор баннера',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditbannerform', true);
  req.send({ id : id });
}
function banner_form(form)
{ if(form.elements.name.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, укажите название."); return false; }
  return true;
}
function delbanner(id)
{ if(confirm('Действительно удалить баннер?'))
  document.location='admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=delbanner&id='+id+'&tab=banners&idcat='+getParam('idcat',0)+'&page='+getParam('page',0);
}
function checkall(check)
{ for(i=0;;i++)
  if(obj=$('check'+i))
  obj.checked=check;
  else
  break;
}
function runaction(action,form)
{ count=0;
  for(i=0;;i++)
  if(obj=$('check'+i))
  { if(obj.checked)
	count++;
  }
  else
  break;
  if(count==0)
  { form.elements.action.value='';
    return;
  }
  if(action=='delete')
  { if(confirm('Действительно удалить отмеченные баннеры?'))
    form.submit();
  }
  else
  form.submit();
}
function showallcheck(checked)
{ $('showoptions').style.display=checked?'none':'';
  modal_refresh();
}
function setcategorysort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=setcatsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
}
function setbannersort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=setbansort', true);
  req.send({ sort: Sortable.sequence(obj).join(','), page: getParam('page',0) });
}