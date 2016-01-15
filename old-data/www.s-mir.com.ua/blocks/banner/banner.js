function banner_getcategories(id)
{ var req = new JsHttpRequest();
  req.onreadystatechange = function()
  { if(req.readyState==4 && req.responseJS)
    { form=document.forms.addblockform;
	  if(!form)
	  form=document.forms.editblockform;
	  form.b_idcat.length=req.responseJS.ids.length;
	  for(i=0;i<req.responseJS.names.length;i++)
	  { form.b_idcat[i].text=req.responseJS.names[i];
	    form.b_idcat[i].value=req.responseJS.ids[i];
	  }
	}
	if(req.responseText)
    $('debugbox').innerHTML = req.responseText;
  }
  req.caching = false;
  req.open('POST', 'request.php?mode=block&item=banner&authcode='+AUTHCODE+'&action=getcategories',true);
  req.send({ idstr: id });
}