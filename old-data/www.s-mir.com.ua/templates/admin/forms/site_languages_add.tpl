<form method="post" onsubmit="return lang_form(this)">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="70%">{editbox name="caption"}</td>
<td width="30%">&nbsp;&nbsp;{editbox name="name" max=5 width="90%"}</td>
</tr>
</table>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="add"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>