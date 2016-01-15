<form name="editstructureform" method="post" onsubmit="return structure_editform(this)">
<p>Название:<sup style="color:gray">*</sup></p>
{editbox name="caption" max=100 width="60%" text=$form.caption}
<table width="100%" class="invisiblegrid">
<tr>
<td width="120">Идентификатор:<sup style="color:gray">*</sup></td>
<td>Связь с разделом:</td>
</tr>
<tr>
<td width="120">{editbox name="name" max=50 width="95%" text=$form.name}</td>
<td><select name="itemeditor"><option value="">Не выбрано</option>{html_options options=$form.items selected=$form.itemeditor}</select></td>
</tr>
</table>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="edit"}
<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="icon" value="Y" {if $form.icon=='Y'}checked{/if}>&nbsp;Иконка на главной панели</label>&nbsp;&nbsp;<label><input type="checkbox" name="menu" value="Y" {if $form.menu=='Y'}checked{/if}>&nbsp;Меню панели</label></p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>