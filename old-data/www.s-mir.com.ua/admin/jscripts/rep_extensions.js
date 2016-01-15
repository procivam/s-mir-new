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
  runLoading();
  form.submit();
}