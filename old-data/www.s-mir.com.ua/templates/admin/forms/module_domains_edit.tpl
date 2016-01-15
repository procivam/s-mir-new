<form name="edititemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="100%">Название:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="100%">{editbox name="name" text=$form.name}</td>
</tr>
<tr>
<td width="100%">Категория:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="100%">
<p>{treeselect name="idcat" items=$form.categories selected=$form.idcat title="Выбор категории" width="90%"}</p>
{if $options.usecats}
<p>{treeselect id="treecat1" name="idcat1" items=$form.categories selected=$form.idcat1 title="Выбор категории" width="90%"}</p>
<p>{treeselect id="treecat2" name="idcat2" items=$form.categories selected=$form.idcat2 title="Выбор категории" width="90%"}</p>
{/if}
</td>
</tr>
</table>
<div class="box">
<table class="invisiblegrid" width="100%">
<tr><td width="120">Цена:</td></tr>
<tr>
<td width="120">{editbox name="price" width="80px" text=$form.price} {$options.valute}</td>
</tr>
</table>
</div>
{include file="objcomp_fieldseditor_include.tpl"}
{hidden name="id" value=$form.id}
{hidden name="tab" value="items"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="edititem"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active"{if $form.active=="Y"} checked{/if}>&nbsp;Активно</label>&nbsp;&nbsp;
<label><input type="checkbox" name="favorite"{if $form.favorite=="Y"} checked{/if}>&nbsp;Спецпредложение</label>&nbsp;&nbsp;
<label><input type="checkbox" name="new"{if $form.new=="Y"} checked{/if}>&nbsp;Новинка</label>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:applyitem(document.forms.edititemform)" title="Сохранить не закрывая"><img src="/templates/admin/images/save.gif" width="16" height="16" style="vertical-align:middle"></a>
<span id="applydate">{$form.date|date_format:"%d.%m.%Y %T"}&nbsp;&nbsp;</span>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>