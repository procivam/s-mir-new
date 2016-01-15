{include file="_header.tpl"}

{literal}<script type="text/javascript">
function runselectcat(form)
{ goactionurl('admin.php?mode=structures&item='+ITEM+'&idcat='+form.idcat.value);
}
</script>{/literal}

<div class="actionbox">
<form method="get">
<p style="float:right">
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
<select name="section" onchange="this.form.submit()">
{html_options options=$sections selected=$section}
</select>
</p>
</form>
{if $section}
<form>{treeselect id="cfidcat" name="idcat" items=$categories selected=$smarty.get.idcat emptytxt="Все категории" title="Выбор категории" onchange="runselectcat(this.form)" section=$section width="320px"}</form>
{/if}
</div>

{if $section}
{if $fields}
<form method="post">
<table class="grid">
<tr>
<th width="20">&nbsp;</th>
<th width="120" align="left">Поле</th>
<th align="left">Название</th>
</tr>
{section name=i loop=$fields}
<tr class="{cycle values="row0,row1"}">
<td width="20"><input type="checkbox" id="check{$smarty.section.i.index}" name="checkfield[]" value="{$fields[i].field}"{if $fields[i].checked} checked{/if}{if $fields[i].disabled} disabled{/if}></td>
<td width="120">{$fields[i].field}</td>
<td>{$fields[i].caption}</td>
</tr>
{/section}
</table>
<table class="actiongrid">
<tr>
<td align="right">
{submit caption="Сохранить"}
</td>
</tr>
</table>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="save"}
</form>
{else}
<div class="box">Не найдены дополнительные поля.</div>
{/if}


{else}
<div class="box">Не найдены каталоги с дополнительными полями.</div>
{/if}

{include file="_footer.tpl"}