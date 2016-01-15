function getadddomainform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новый сайт',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=system&item=domains&authcode='+AUTHCODE+'&action=getadddomainform', true);
  req.send({  });
}
function geteditdomainform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Свойства сайта',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=system&item=domains&authcode='+AUTHCODE+'&action=geteditdomainform', true);
  req.send({ id: id });
}
function deldomain(id)
{ if(confirm('Действительно удалить сайт?'))
  { if(confirm('Все данные этого сайта будут потеряны! Продолжить?'))
    goactionurl('admin.php?mode=system&item=domains&authcode='+AUTHCODE+'&action=del&id='+id+'&page='+getParam('page',0));
  }
}
function checkall(check)
{ for(i=0;;i++)
  if(obj=$('check'+i))
  obj.checked=check;
  else
  break;
}
function runaction(action,form)
{ var count=0;
  var domains = new Array();
  for(i=0;;i++)
  if(obj=$('check'+i))
  { if(obj.checked)
	{ domains[i]=obj.value;
	  count++;
	}
  }
  else
  break;
  if(count==0)
  { form.elements.action.value='';
    return;
  }
  if(action=='import')
  getimportform(domains);
  else if(action=='delete')
  { if(confirm('Действительно удалить отмеченные сайты? Все их данные будут потеряны!'))
    form.submit();
  }
}
function getimportform(domains)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Импорт конфигурации',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=system&item=domains&authcode='+AUTHCODE+'&action=getimportform', true);
  req.send({ domains: domains  });
}