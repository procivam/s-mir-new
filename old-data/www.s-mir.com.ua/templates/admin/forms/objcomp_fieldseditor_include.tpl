{section name=i loop=$form.fields}
{if $form.fields[i].type=="string"}
<p>{$form.fields[i].name}:</p>
<p>{editbox name=$form.fields[i].field max=$form.fields[i].property text=$form.fields[i].value width="40%"}</p>
{elseif $form.fields[i].type=="int" || $form.fields[i].type=="float"}
{if $form.fields[i].field!='userid'}
<p>{$form.fields[i].name}:</p>
<p>{editbox name=$form.fields[i].field max=10 width=70 text=$form.fields[i].value}</p>
{/if}
{elseif $form.fields[i].type=="bool"}
<p><label><input type="checkbox" name="{$form.fields[i].field}"{if $form.fields[i].value=="Y"} checked{/if}>&nbsp;{$form.fields[i].name}</label></p>
{elseif $form.fields[i].type=="date"}
<p>{$form.fields[i].name}:</p>
<p>{dateselect name=$form.fields[i].field date=$form.fields[i].value}</p>
{elseif $form.fields[i].type=="text"}
<p>{$form.fields[i].name}:</p>
<p>{textarea name=$form.fields[i].field rows=$form.fields[i].property text=$form.fields[i].value}</p>
{elseif $form.fields[i].type=="format"}
<p>{$form.fields[i].name}:</p>
<p>{fckeditor name=$form.fields[i].field height=$form.fields[i].property text=$form.fields[i].value toolbar="Basic"}</p>
{elseif $form.fields[i].type=="select"}
<p>{$form.fields[i].name}:</p>
<p>{combobox name=$form.fields[i].field options=$form.fields[i].options selected=$form.fields[i].value size=35}</p>
{elseif $form.fields[i].type=="mselect"}
<p>{$form.fields[i].name}:</p>
<div class="box">
{html_checkboxes name=$form.fields[i].field options=$form.fields[i].options checked=$form.fields[i].value separator=", "}
</div>
{elseif $form.fields[i].type=="image"}
<p>{$form.fields[i].name}:</p>
{if $form.fields[i].value>0}
<table width="100%" class="invisiblegrid">
<tr>
<td width="80" align="center">
{image id=$form.fields[i].value width=80 height=80 popup=true}
</td>
<td valign="top">
<p>Заменить:</p>
<p><input type="file" name="{$form.fields[i].field}" style="width:40%"></p>
<p><label><input type="checkbox" name="{$form.fields[i].field}_del">&nbsp;Удалить</label></p>
</td>
</tr>
</table>
{else}
<p><input type="file" name="{$form.fields[i].field}" style="width:40%"></p>
{/if}
{elseif $form.fields[i].type=="file"}
<p>{$form.fields[i].name}:&nbsp;{if $form.fields[i].value>0}{download id=$form.fields[i].value}&nbsp;&nbsp;<label><input type="checkbox" name="{$form.fields[i].field}_del">&nbsp;Удалить</label>{/if}</p>
{if $form.fields[i].value>0}
<p>Заменить:</p>
{/if}
<p><input type="file" name="{$form.fields[i].field}" style="width:40%"></p>
{/if}
{/section}