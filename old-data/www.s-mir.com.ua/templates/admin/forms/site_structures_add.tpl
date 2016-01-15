<form name="addstructureform" method="post" onsubmit="return structure_addform(this)">
<p>Название:<sup style="color:gray">*</sup></p>
{editbox name="caption" max=100 width="60%"}
<table width="100%" class="invisiblegrid">
<tr>
<td width="120">Идентификатор:<sup style="color:gray">*</sup></td>
<td width="180">Базовый плагин:<sup style="color:gray">*</sup></td>
<td>Связь с разделом:</td>
</tr>
<tr>
<td width="120">{editbox name="name" max=50 width="95%" text="newapp"}</td>
<td width="180"><select name="plugin" onchange="selplugin(this.form,this.value)" style="width:100%"><option value="" selected>Не выбрано</option>{html_options options=$form.plugins}</select></td>
<td><select name="itemeditor"><option value="">Не выбрано</option>{html_options options=$form.items}</select></td>
</tr>
</table>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="add"}
<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="icon" value="Y" checked>&nbsp;Иконка на главной панели</label>&nbsp;&nbsp;<label><input type="checkbox" name="menu" value="Y" checked>&nbsp;Меню панели</label></p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>