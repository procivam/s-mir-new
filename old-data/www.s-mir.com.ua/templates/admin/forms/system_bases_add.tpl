<form name="addbaseform" method="post" onsubmit="return base_form(this)">
<table class="invisiblegrid" width="100%">
<tr>
<td width="25%">Хост:<sup style="color:gray">*</sup></td>
<td width="25%">Название:<sup style="color:gray">*</sup></td>
<td width="25%">Пользователь:<sup style="color:gray">*</sup></td>
<td width="25%">Пароль:</td>
</tr>
<tr>
<td width="25%">{editbox name="host" text="localhost"}</td>
<td width="25%">{editbox name="name"}</td>
<td width="25%">{editbox name="user"}</td>
<td width="25%">{editbox name="password"}</td>
</tr>
</table>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="add"}
<div align="right" style="margin-top:20px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>