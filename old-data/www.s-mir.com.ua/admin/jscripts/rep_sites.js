function setconf(id)
{ if(confirm('Импорт выбранного сайта приведет к потере всех данных текущего сайта. Продолжить?'))
  { runLoading();
    goactionurl('admin.php?mode=rep&item=sites&action=install&id='+id+'&authcode='+AUTHCODE);
  }
}
function setconf2(id)
{ runLoading();
  goactionurl('admin.php?mode=rep&item=sites&action=install&id='+id+'&authcode='+AUTHCODE);
}