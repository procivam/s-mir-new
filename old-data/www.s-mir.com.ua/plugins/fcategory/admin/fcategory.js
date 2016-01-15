function getaddfieldform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новое поле',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddform', true);
  req.send({ });
}
function geteditfieldform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор поля',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=geteditform', true);
  req.send({ id : id });
}
function field_form(form)
{ if(!/^[a-zA-Z0-9_\-]+$/i.test(form.field.value))
  { alert("Пожалуйста, корректно заполните идентификатор поля (только латинские буквы и цифры)."); return false; }
  if(/^[0-9]+$/i.test(form.field.value))
  { alert("Пожалуйста, корректно заполните идентификатор поля (только латинские буквы и цифры)."); return false; }
  if(form['name'].value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, заполните название поля."); return false; }
  if((form.type.value=='select' || form.type.value=='mselect')&& form.idvar.length==0)
  { alert("Пожалуйста, выберите список."); return false; }
  return true;
}
function delfield(id)
{ if(confirm('Действительно удалить поле?'))
  goactionurl('admin.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=del&id='+id);
}
function fieldseltype(type)
{ $('field_typestringbox').style.display=type=='string'?'':'none';
  $('field_typeboolbox').style.display=type=='bool'?'':'none';
  $('field_typetextbox').style.display=type=='text'?'':'none';
  $('field_typeformatbox').style.display=type=='format'?'':'none';
  $('field_typeselectbox').style.display=type=='select'||type=='mselect'?'':'none';
  modal_refresh();
}
function setfieldssort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=structures&item='+ITEM+'&authcode='+AUTHCODE+'&action=setsort', true);
  if(MODE=='sections')
  req.send({ sort: Sortable.sequence(obj).join(',') });
  else
  req.send({ sort: Sortable.sequence(obj).join(',') });
}