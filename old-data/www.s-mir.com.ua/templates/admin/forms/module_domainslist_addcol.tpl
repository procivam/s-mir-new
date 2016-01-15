<form name="addcolform" method="post" onsubmit="return col_form(this)">
<p>Значение:</p>
<p>
<select name="field">
{foreach from=$form.fields item=field}
<option value="{$field.field}">{$field.name}</option>
{/foreach}
</select>
</p>
{hidden name="tab" value="import"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="addcol"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>