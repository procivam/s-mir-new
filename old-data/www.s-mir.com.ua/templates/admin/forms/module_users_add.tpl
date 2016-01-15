<form name="adduserform" method="post" onsubmit="return user_addform(this)" enctype="multipart/form-data">
<p>Полное имя:<sup style="color:gray">*</sup></p>
<p>{editbox name="name" max=50 width="50%"}</p>
<p>Логин:<sup style="color:gray">*</sup></p>
<p>{editbox name="login" max=20 width="30%"}</p>
<p>Пароль:<sup style="color:gray">*</sup></p>
<p>{passbox name="password" width="30%"}</p>
<p>Email:</p>
<p>{editbox name="email" max=50 width="30%"}</p>
{if $form.groups}
<p>Группа:</p>
<p>
<select name="idgroup">
{html_options options=$form.groups}
</select>
</p>
{/if}
{if $options.useavatara}
<p>Лого/Аватар:</p>
<p><input type="file" name="image"></p>
{/if}
{include file="objcomp_fieldseditor_include.tpl"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="users"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="adduser"}
<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="active" checked>&nbsp;Активирован</label></p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>