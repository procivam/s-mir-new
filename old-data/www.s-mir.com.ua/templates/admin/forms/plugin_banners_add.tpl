<form name="addbannerform" method="post" onsubmit="return banner_form(this)" enctype="multipart/form-data">
<p>Название:</p>
<p>{editbox name="name" max=100 width="60%"}</p>
<p>Категория:</p>
<p><select name="idcat">{html_options options=$form.categories selected=$form.idcat}</select></p>
<p>Файл изображения или flash:</p>
<p><input type="file" name="bannerfile" style="width:50%"></p>
<table class="invisiblegrid">
<tr>
<td>Ширина:</td>
<td></td>
<td>Высота:</td>
</tr>
<tr>
<td>{editbox name="width" width="70" text="0"}</td>
<td>X</td>
<td>{editbox name="height" width="70" text="0"}</td>
</tr>
</table>
<p>Текст:</p>
{textarea name="text" rows=4}
<p>Целевая ссылка:</p>
<p>{editbox name="url" width="50%"}
<select name="target">
<option value="_blank" selected>В новом окне</option>
<option value="_self">В текущем окне</option>
</select></p>
<p><label><input type="checkbox" name="showall" checked onclick="showallcheck(this.checked)">&nbsp;Для всех разделов</label></p>
<div id="showoptions" class="box" style="display:none">
{section name=i loop=$form.sections}
<label><input type="checkbox" name="show[]" value="{$form.sections[i].id}">&nbsp;{$form.sections[i].caption}</label>{if !$smarty.section.i.last},  {/if}
{/section}
<p>По адресам (URL по строкам):</p>
<p>{textarea name="showurl" rows=3}
</div>
<p>Период показа:</p>
<p><input type="checkbox" name="date">
с {dateselect name="date1" onchange="this.form.date.checked=true"}
&nbsp;
по {dateselect name="date2" maxtime=true onchange="this.form.date.checked=true"}
</p>
{hidden name="tab" value="banners"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="addbanner"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active" checked>&nbsp;Включен</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>