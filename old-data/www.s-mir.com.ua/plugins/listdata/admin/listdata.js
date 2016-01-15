function getaddform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новая запись',req.responseJS.html,800);
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
    modal_window_html('Редактор записи',req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditform', true);
  req.send({ id : id });
}
function getimportform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Импорт',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getimportform', true);
  req.send({ });
}
function data_form(form)
{ if(form.elements['name_'+LANG].value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, укажите название."); return false; }
  return true;
}
function deldata(id)
{ if(confirm('Действительно удалить запись?'))
  goactionurl('admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=del&tab=listdata&id='+id);
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
  { if(obj.checked)	count++;
  }
  else
  break;
  if(count==0)
  { form.elements.action.value='';
    return;
  }
  if(action=='sortname')
  { if(confirm('Действительно сортировать отмеченные записи?'))
    form.submit();
  }
  else if(action=='delete')
  { if(confirm('Действительно удалить отмеченные записи?'))
    form.submit();
  }
}
function setlistitemsort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=setsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
}