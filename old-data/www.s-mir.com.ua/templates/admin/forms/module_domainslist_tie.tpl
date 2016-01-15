<form name="tieform" method="post">
<table class="grid">
{section name=i loop=$form.categories}
<tr class="row0">
<td width="10" style="padding:3px;">
<img id="{$form.categories[i].id}_bullet" hspace="2" src="/templates/admin/images/collapse.gif" width=9 height=9 onclick="getgoods({$form.categories[i].id},{$form.id})" style="cursor:pointer">
<input type="hidden" id="opencategory_{$form.categories[i].id}" name="opencategory[]" value="0">
</td>
<td style="padding:3px;">{$form.categories[i].name}&nbsp;{if $form.categories[i].noempty}<img src="/templates/admin/images/checked2.gif" width="10" height="10" alt="Содержит отмеченные позиции">{/if}</td>
</tr>
<tr class="row1">
<td colspan="2"><div id="goodsbox{$form.categories[i].id}" style="display:none;padding:3px;"></div></td>
</tr>
{/section}
</table>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="items"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="settie"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>