<form name="edituserform" method="post" onsubmit="return user_editform(this)" enctype="multipart/form-data">
<p>Полное имя:<sup style="color:gray">*</sup></p>
<p>{editbox name="name" max=50 width="50%" text=$form.name}</p>
<p>Логин:<sup style="color:gray">*</sup></p>
<p>{editbox name="login" max=20 width="30%" text=$form.login}</p>
<p>Новый пароль:</p>
<p>{passbox name="password" width="30%"}</p>
<p>Email:</p>
<p>{editbox name="email" max=50 width="30%" text=$form.email}</p>
{if $form.groups}
<p>Группа:</p>
<p>
<select name="idgroup">
{html_options options=$form.groups selected=$form.idgroup}
</select>
</p>
{/if}
{if $options.useavatara}
<p>Лого/Аватар:</p>
{if $form.idimg>0}
<table width="100%" class="invisiblegrid">
<tr>
<td width="80" align="center">
{image id=$form.idimg width=80 height=80 popup=true}
</td>
<td valign="top">
<p>Заменить:</p>
<p><input type="file" name="image"></p>
<p><label><input type="checkbox" name="imagedel">Удалить</label></p>
</td>
</tr>
</table>
{else}
<p><input type="file" name="image" style="width:40%"></p>
{/if}
{/if}
{include file="objcomp_fieldseditor_include.tpl"}
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="users"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="edituser"}
<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="active"{if $form.active=="Y"} checked{/if}>&nbsp;Активирован</label></p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>