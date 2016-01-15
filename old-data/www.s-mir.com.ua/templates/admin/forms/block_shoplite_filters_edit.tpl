<div{if count($form.sections)==1} style="display:none"{/if}>
<p>Раздел:</p>
<p>
<select name="b_idsec">
{html_options options=$form.sections selected=$form.idsec}
</select>
</p>
</div>
<p>Шаблон:</p>
<p>{editbox name="b_template" text=$form.template max=50 width="20%"}</p>
<h3>Фильтры:</h3>
<table class="grid">
<tr>
<th width="20">&nbsp;</th>
<th align="left">Надпись</th>
<th align="left" width="60">Порядок</th>
</tr>
{section name=i loop=$form.fields}
<tr>
<td width="20"><input type="checkbox" name="b_fields[]" value="{$form.fields[i].field}"{if $form.fields[i].checked} checked{/if}></td>
<td><input type="text" name="b_caption_{$form.fields[i].field}" value="{$form.fields[i].caption|escape}" style="width:100%"></td>
<td width="60"><input type="text" name="b_sort_{$form.fields[i].field}" value="{$form.fields[i].sort|escape}" style="width:100%"></td>
</tr>
{/section}
</table>