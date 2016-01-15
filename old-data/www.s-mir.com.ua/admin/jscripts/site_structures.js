function getaddstructureform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новое дополнение',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=site&item=structures&authcode='+AUTHCODE+'&action=getaddstructureform', true);
  req.send({  });
}
function structure_addform(form)
{ if(form.elements.caption.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, заполните название."); return false; }
  else if(!/^[a-zA-Z0-9]+$/i.test(form.elements.name.value))
  { alert("Пожалуйста, корректно заполните идентификатор (только латинские буквы и цифры)."); return false; }
  else if(form.elements.plugin.value=='')
  { alert("Пожалуйста, укажите базовый плагин."); return false; }
  return true;
}
function structure_editform(form)
{ if(form.elements.caption.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, заполните название."); return false; }
  else if(!/^[a-zA-Z0-9]+$/i.test(form.elements.name.value))
  { alert("Пожалуйста, корректно заполните идентификатор (только латинские буквы и цифры)."); return false; }
  return true;
}
function geteditstructureform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Свойства дополнения',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=site&item=structures&authcode='+AUTHCODE+'&action=geteditstructureform', true);
  req.send({ id: id });
}
function delstructure(id)
{ if(confirm('Все данные из этого дополнения будут утеряны! Действительно удалить?'))
  goactionurl('admin.php?mode=site&item=structures&authcode='+AUTHCODE+'&action=del&id='+id);
}
function checkall(check)
{ for(i=0;i<cstructures;i++)
  { obj=$('check'+i);
    if(obj)
	obj.checked=check;
  }
}
function runaction(action,form)
{ count=0;
  for(i=0;i<cstructures;i++)
  { obj=$('check'+i);
    if(obj && obj.checked)
	count++;
  }
  if(count==0)
  { form.elements.action.value='';
    return;
  }
  if(action=='delete')
  { if(confirm('Действительно удалить отмеченные дополнения? Все данные из них будут потеряны!'))
    form.submit();
  }
  else
  form.submit();
}
function setstructuresort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=site&item=structures&authcode='+AUTHCODE+'&action=setsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
}
function selplugin(form,plugin)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    { if(form.name.value.length==0 || form.name.value=='newapp')
      form.name.value=req.responseJS.name;
      else
      { for(i=0;i<form.plugin.options.length;i++)
        if(form.name.value==form.plugin.options[i].value)
        { form.name.value=req.responseJS.name;
          break;
        }
      }
      if(form.caption.value.length==0)
      form.caption.value=form.plugin.options[form.plugin.selectedIndex].text;
      else
      { for(i=0;i<form.plugin.options.length;i++)
        if(form.caption.value==form.plugin.options[i].text)
        { form.caption.value=plugin.length>0?form.plugin.options[form.plugin.selectedIndex].text:'';
          break;
        }
      }
    }
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=site&item=structures&authcode='+AUTHCODE+'&action=getnewname', true);
  req.send({ plugin: plugin });
}