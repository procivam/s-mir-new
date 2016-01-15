var images_count=0;
var files_count=0;
function getadditemform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новая запись',req.responseJS.html,900,'files_count=1;images_count=1;');
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getadditemform', true);
  req.send({ idcat: cur_idcat });
}
function after_showedititem(id)
{ if($('images_gridbox'))
  { images_iditem=id;
    images_refresh();
  }
  if($('files_gridbox'))
  { files_iditem=id;
    files_refresh();
  }
}
function getedititemform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Редактор записи',req.responseJS.html,900,'after_showedititem('+id+');');
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getedititemform', true);
  req.send({ id : id });
}
function item_form(form)
{ if(!/^[a-zA-Zа-яА-Я0-9_ \-]*$/i.test(form.urlname.value))
  { alert("Пожалуйста, корректно укажите идентификатор URL."); return false; }
  if(form.name.value.replace(/\s+/,'').length==0)
  { alert("Пожалуйста, заполните название."); return false; }
  if(form.idcat.value==0)
  { alert("Пожалуйста, укажите категорию."); return false; }
  if(typeof FCKeditorAPI!='undefined')
  form.content.value=FCKeditorAPI.GetInstance('content').GetHTML();
  return true;
}
function delitem(id)
{ if(confirm('Действительно удалить запись?'))
  goactionurl('admin.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=delitem&tab=items&id='+id+'&idcat='+cur_idcat+'&page='+getParam('page',0));
}
function cancelfilter()
{ $('filterbox').innerHTML = '';
}
function runselectcat(form)
{ goactionurl('admin.php?mode=sections&item='+ITEM+'&idcat='+form.idcat.value+'&tab=items');
}
function getfilterform()
{ var req = new JsHttpRequest();
  message_loading('filterbox');
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    { $('filterbox').innerHTML = req.responseJS.html;
	  document.forms.filterform.elements.savebutton.focus();
	}
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getfilterform', true);
  req.send({ idcat: cur_idcat });
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
  var items = new Array();
  for(i=0;;i++)
  if(obj=$('check'+i))
  { if(obj.checked)
	{ items[i]=obj.value;
	  count++;
	}
  }
  else
  break;
  if(count==0)
  { form.elements.action.value='save';
    return;
  }
  if(action=='move')
  { runLoading();
    var req = new JsHttpRequest();
    req.onreadystatechange = function()
    { if(req.readyState==4 && req.responseJS)
      { modal_window_html('Перемещение',req.responseJS.html,600);
	    form.elements.action.value='save';
	  }
	  if(req.responseText)
      $('debugbox').innerHTML = req.responseText;
    }
    req.caching = false;
    req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getmoveitemsform', true);
    req.send({ idcat: cur_idcat, items : items });
  }
  else if(action=='copy')
  { runLoading();
    var req = new JsHttpRequest();
    req.onreadystatechange = function()
    { if(req.readyState==4 && req.responseJS)
      { modal_window_html('Копирование',req.responseJS.html,600);
	    form.elements.action.value='save';
	  }
	  if(req.responseText)
      $('debugbox').innerHTML = req.responseText;
    }
    req.caching = false;
    req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getcopyitemsform', true);
    req.send({ idcat: cur_idcat, items : items });
  }
  else if(action=='delete')
  { if(confirm('Действительно удалить отмеченные записи?'))
    form.submit();
  }
  else
  form.submit();
}
function moveform(form)
{ if(form.idto.value==0)
  { alert("Пожалуйста, укажите категорию."); return false; }
  return true;
}
function copyform(form)
{ if(form.idcat.value==0)
  { alert("Пожалуйста, укажите категорию."); return false; }
  return true;
}
function additemimage()
{ images_count++;
  if(images_count>5) return;
  obj=$('imageitems'+images_count);
  if(obj)
  { content='<table class="invisiblegrid" width="100%">';
    content+='<tr>';
    content+='<td>Фото '+images_count+':</td>';
    content+='<td width="80%">Описание '+images_count+':</td>';
    content+='</tr>';
    content+='<tr>';
    content+='<td><input type="file" name="image'+images_count+'"></td>';
    content+='<td width="80%"><input type="text" name="imagedescription'+images_count+'" style="width:100%"></td>';
    content+='</tr>';
    content+='</table>';
	obj.innerHTML = content;
	modal_refresh();
  }
}
function additemfile()
{ files_count++;
  if(files_count>5) return;
  obj=$('fileitems'+files_count);
  if(obj)
  { content='<table class="invisiblegrid" width="100%">';
    content+='<tr>';
    content+='<td>Файл '+files_count+':</td>';
    content+='<td width="80%">Описание '+files_count+':</td>';
    content+='</tr>';
    content+='<tr>';
    content+='<td><input type="file" name="file'+files_count+'"></td>';
    content+='<td width="80%"><input type="text" name="filedescription'+files_count+'" style="width:100%"></td>';
    content+='</tr>';
    content+='</table>';
	obj.innerHTML = content;
	modal_refresh();
  }
}
function gettiesform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html(req.responseJS.title,req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=gettiesform', true);
  req.send({ id : id });
}
function getgoods(id,idgood)
{ if(!(img=$(id+'_bullet'))) return false;
  if(!(obj=$('goodsbox'+id))) return false;
  if(!obj.style) return false;
  if(obj.style.display=="none")
  { obj.style.display='';
	img.src="/templates/admin/images/expand.gif";
    var req = new JsHttpRequest();
    message_loading('goodsbox'+id);
    req.onreadystatechange = function()
    { if(req.readyState==4 && req.responseJS)
      { $('goodsbox'+id).innerHTML = req.responseJS.html;
	    $('opencategory_'+id).value=id;
		modal_refresh();
	  }
	  if(req.responseText)
      $('debugbox').innerHTML = req.responseText;
    }
    req.caching = true;
    req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getgoods', true);
    req.send({ id : id, idgood: idgood });
  }
  else
  {	obj.style.display="none";
	img.src="/templates/admin/images/collapse.gif";
	$('opencategory_'+id).value=0;
	modal_refresh();
  }
}
function getmpricesform()
{ contentWin = new Window({
  className:'alphacube',
  title:'Модификаторы цены',
  maximizable: false,
  minimizable:false,
  resizable: false,
  showEffect:Element.show,
  hideEffect:Element.hide,
  width: 600,
  height: 240,
  destroyOnClose: true});
  contentWin.setContent('mprices');
  contentWin.showCenter(true);
  closeObserver = {
  onClose: function(eventName, win)
  { if (win == contentWin)
	{ $('mpricesbox').appendChild($('mprices'));
      contentWin = null;
      Windows.removeObserver(this);
    }
  }}
  Windows.addObserver(closeObserver);
}
function getorderform(id)
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html(req.responseJS.title,req.responseJS.html,800);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getorderform', true);
  req.send({ id : id });
}
function delorder(id)
{ if(confirm('Действительно удалить заявку?'))
  goactionurl('admin.php?mode=sections&item='+ITEM+'&tab=orders&authcode='+AUTHCODE+'&action=delorder&id='+id+'&page1='+getParam('page1',0));
}
function checkall2(check)
{ for(i=0;;i++)
  if(obj=$('ocheck'+i))
  obj.checked=check;
  else
  break;
}
function runaction2(action,form)
{ count=0;
  for(i=0;;i++)
  if(obj=$('ocheck'+i))
  { if(obj.checked) count++;
  }
  else
  break;
  if(count==0)
  { form.elements.action.value='';
    return;
  }
  if(action=='odelete')
  { if(confirm('Действительно удалить отмеченные заказы?'))
    form.submit();
  }
  else
  form.submit();
}
function getaddcolform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Новый столбец',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = true;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getaddcolform', true);
  req.send({ });
}
function delcol(id)
{ if(confirm('Действительно удалить столбец?'))
  goactionurl('admin.php?mode=sections&item='+ITEM+'&tab=import&authcode='+AUTHCODE+'&action=delcol&id='+id);
}
function getimportform()
{ runLoading();
  var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    modal_window_html('Импортировать из файла',req.responseJS.html,600);
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=getimportform', true);
  req.send({ });
}
function runexport()
{ if(confirm('Экспортировать данные каталога?'))
  goactionurl('admin.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=export');
}
function setimportsort(obj)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=setimportsort', true);
  req.send({ sort: Sortable.sequence(obj).join(',') });
  sort = Sortable.sequence(obj);
  nums = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  for(i=0;i<sort.length;i++)
  if(cell=$('colname'+sort[i]))
  cell.innerHTML=nums[i]?nums[i]:'';
}
function applyitem(form)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    { if(!req.responseJS.result)
	  alert('Не удалось сохранить данные!');
	  else
	  $('applydate').innerHTML=req.responseJS.date;
    }
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=sections&item='+ITEM+'&authcode='+AUTHCODE+'&action=applyitem',true);
  req.send({ form: form });
}