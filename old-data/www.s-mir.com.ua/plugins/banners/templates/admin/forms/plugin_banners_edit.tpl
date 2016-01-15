<form name="editbannerform" method="post" onsubmit="return banner_form(this)" enctype="multipart/form-data">
<p>Название:</p>
<p>{editbox name="name" max=100 width="60%" text=$form.name}</p>
<p>Категория:</p>
<p><select name="idcat2">{html_options options=$form.categories selected=$form.idcat}</select></p>
<p>Файл изображения или flash:</p>
{if $form.filepath}
<table width="100%" class="invisiblegrid">
<tr>
{if $form.type!='flash'}
<td width="80" height="80" align="center">
{image src=$form.filepath width=80}
</td>
{/if}
<td valign="top">
{if $form.type=='flash'}<p><a href="/{$form.filepath}" target="_blank">/{$form.filepath}</a></p>{/if}
<p>Заменить:</p>
<p><input type="file" name="bannerfile" style="width:40%"></p>
</td>
</tr>
</table>
{else}
<p><input type="file" name="bannerfile" style="width:50%"></p>
{/if}
<table class="invisiblegrid">
<tr>
<td>Ширина:</td>
<td></td>
<td>Высота:</td>
</tr>
<tr>
<td>{editbox name="width" width="70" text=$form.width}</td>
<td>X</td>
<td>{editbox name="height" width="70" text=$form.height}</td>
</tr>
</table>
<p>Текст:</p>
{textarea name="text" rows=4 text=$form.text}
<p>Целевая ссылка:</p>
<p>{editbox name="url" text=$form.url width="50%"}
<select name="target">
<option value="_blank"{if $form.target=="_blank"} selected{/if}>В новом окне</option>
<option value="_self"{if $form.target=="_self"} selected{/if}>В текущем окне</option>
</select></p>
<p><label><input type="checkbox" name="showall"{if $form.showall} checked{/if} onclick="showallcheck(this.checked)">&nbsp;Для всех разделов</label></p>
<div id="showoptions" class="box"{if $form.showall} style="display:none"{/if}>
{section name=i loop=$form.sections}
<label><input type="checkbox" name="show[]" value="{$form.sections[i].id}"{if $form.sections[i].checked} checked{/if}>&nbsp;{$form.sections[i].caption}</label>{if !$smarty.section.i.last},  {/if}
{/section}
<p>По адресам (URL по строкам):</p>
<p>{textarea name="showurl" rows=3 text=$form.showurl}
</div>
<p>Период показа:</p>
<p><input type="checkbox" name="date"{if $form.date=="Y"} checked{/if}>
с {dateselect name="date1" date=$form.date1 onchange="this.form.date.checked=true"}
&nbsp;
по {dateselect name="date2" date=$form.date2 maxtime=true onchange="this.form.date.checked=true"}
</p>
{hidden name="id" value=$form.id}
{hidden name="idcat" value=$form.idcat}
{hidden name="tab" value="banners"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="editbanner"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active"{if $form.active=="Y"} checked{/if}>&nbsp;Включен</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>