<form name="editbaseform" method="post" onsubmit="return base_form(this)">
<table class="invisiblegrid" width="100%">
<tr>
<td width="25%">Хост:<sup style="color:gray">*</sup></td>
<td width="25%">Название:<sup style="color:gray">*</sup></td>
<td width="25%">Пользователь:<sup style="color:gray">*</sup></td>
<td width="25%">Пароль:</td>
</tr>
<tr>
<td width="25%">{editbox name="host" text=$form.host}</td>
<td width="25%">{editbox name="name" text=$form.name}</td>
<td width="25%">{editbox name="user" text=$form.user}</td>
<td width="25%">{editbox name="password" text=$form.password}</td>
</tr>
</table>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="edit"}
<div align="right" style="margin-top:20px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>