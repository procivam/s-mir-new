{include file="_header.tpl"}

<div class="box" style="width:800px">
<form method="post">
<p><label><input type="checkbox" name="autoupdate"{if $options.autoupdate} checked{/if}>&nbsp;Проверять наличие обновлений</label></p>
<p><label><input type="checkbox" name="debugmode"{if $options.debugmode} checked{/if}>&nbsp;Режим отладки</label></p>
<p><label><input type="checkbox" name="smartysecurity"{if $options.smartysecurity} checked{/if}>&nbsp;Защищенный режим Smarty</label></p>
<p><label><input type="checkbox" name="smtp_use"{if $options.smtp_use} checked{/if} onclick="$('smtpbox').style.display=this.checked?'':'none';">&nbsp;SMTP для отправки писем</label></p>
<div id="smtpbox" class="box"{if !$options.smtp_use} style="display:none"{/if}>
<table>
<tr><td>Хост:</td><td>{editbox name="smtp_host" width="200" text=$options.smtp_host}</td></tr>
<tr><td>Порт:</td><td>{editbox name="smtp_port" width="50" text=$options.smtp_port}</td></tr>
<tr><td>Авторизация:</td><td><input type="checkbox" name="smtp_auth"{if $options.smtp_auth} checked{/if} onclick="$('smtpl').style.display=$('smtpp').style.display=this.checked?'':'none';"></td></tr>
<tr id="smtpl"{if !$options.smtp_auth} style="display:none"{/if}><td>Логин:</td><td>{editbox name="smtp_login" width="120" text=$options.smtp_login}</td></tr>
<tr id="smtpp"{if !$options.smtp_auth} style="display:none"{/if}><td>Пароль:</td><td>{editbox name="smtp_password" width="120" text=$options.smtp_password}</td></tr>
</table>
</div>
<p><label><input type="radio" name="caching" value="0"{if $options.caching==0} checked{/if}>&nbsp;Без кэширования</label></p>
<p><label><input type="radio" name="caching" value="1"{if $options.caching==1} checked{/if}>&nbsp;Кэширование в файлах</label></p>
<p><label><input type="radio" name="caching" value="2"{if $options.caching==2} checked{/if}{if !$memcache} disabled{/if}>&nbsp;Кэширование в memcached</label></p>
<input type="hidden" name="mode" value="system">
<input type="hidden" name="item" value="options">
<input type="hidden" name="action" value="save">
<div align="right" style="margin:5px;margin-top:10px;">
{submit caption="Сохранить"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>
</div>

{include file="_footer.tpl"}