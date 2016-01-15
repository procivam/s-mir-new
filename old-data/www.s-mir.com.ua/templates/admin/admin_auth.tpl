<!DOCTYPE html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Панель управления Astra.CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/templates/admin/style{if strpos($smarty.server.HTTP_USER_AGENT,"MSIE")!==false}_ie{elseif strpos($smarty.server.HTTP_USER_AGENT,"Opera")!==false}_opera{else}_firefox{/if}.css?{$options.version}" type="text/css">
<script type="text/javascript" src="/system/jsaculous/prototype.js"></script>
<link rel="stylesheet" href="/cms/css/style_ww.css" type="text/css" />
<script type="text/javascript" src="/system/jsaculous/scriptaculous.js?load=effects,controls,dragdrop"></script>
<script type="text/javascript" src="/system/jsaculous/window.js"></script>
{literal}<script type="text/javascript">
function auth_form(form)
{ if(form.login.value.length==0)
  { alert("Пожалуйста, корректно заполните поле Логин."); return false; }
  else if(form.password.value.length==0)
  { alert("Пожалуйста, корректно заполните поле Пароль."); return false; }
  return true;
}
function remember_form(form)
{ if(form.login.value.length==0)
  { alert("Пожалуйста, корректно заполните поле Логин."); return false; }
  return true;
}
</script>{/literal}
</head>
<body align="center" topmargin=0 leftmargin=0 marginheight=0 marginwidth=0 bgcolor="#EBEBE2">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-top:50px;" bgcolor="#FFFFFF" align="center"><img src="/templates/admin/images/ww.gif" width="270" height="103"></td>
  </tr>
  <tr>
    <td bgcolor="#313131"><img src="/templates/admin/images/alpha.gif" width="1" height="5"></td>
  </tr>
  <tr>
    <td align="center" style="padding:20px 0 0 55px;">
	<form method="post" onsubmit="return auth_form(this);">
		<table width="100"  border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="185"><input name="login" value="" style="padding: 0px 0px 0px 5px; margin: 0px;width: 185px;  height:16px; text-align: left; font-size:13px; font-family: Arial, Tahoma, Verdana,  Helvetica, sans-serif; font-weight:normal; background-color: #FEFEF3; border: 0px solid #FEFEF3; color: #393939"></td>
			<td width="10" colspan="3"><img src="/templates/admin/images/alpha.gif" width="10" height="1"></td>
			<td class="black13">Логин</td>
		  </tr>
		  <tr>
			<td colspan="3"><img src="/templates/admin/images/alpha.gif" width="1" height="10"></td>
		  </tr>
		  <tr>
			<td width="185"><input name="password" type="password" value="" style="padding: 0px 0px 0px 5px; margin: 0px;width: 185px;  height:16px; text-align: left; font-size:13px; font-family: Arial, Tahoma, Verdana,  Helvetica, sans-serif; font-weight:normal; background-color: #FEFEF3; border: 0px solid #FEFEF3; color: #393939"></td>
			<td width="10" colspan="3"><img src="/templates/admin/images/alpha.gif" width="10" height="1"></td>
			<td class="black13">Пароль</td>
		  </tr>
		  <tr>
			<td colspan="3"><img src="/templates/admin/images/alpha.gif" width="1" height="10"></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="submit" name="cmsenter" value="" style="background-image:url(/templates/admin/images/login.gif); width:183px; height:25px; border:0;"/></td>
		  </tr>
		</table>
		<input type="hidden" name="mode" value="auth">
<input type="hidden" name="action" value="login">
	</form>
	</td>
  </tr>
</table>
</body>
<script type="text/javascript" src="http://a-cms.ru/counter.php?type=full&host={$smarty.server.HTTP_HOST}"></script>
</html>