{section name=i loop=$form.fields}
{if $form.fields[i].type=="string"}
<p>{$form.fields[i].name}:</p>
<p>{editbox name=$form.fields[i].field max=$form.fields[i].property text=$form.fields[i].value width="20%"}</p>
{elseif $form.fields[i].type=="int" || $form.fields[i].type=="float"}
<p>{$form.fields[i].name}:</p>
<p>
от&nbsp;{editbox name=$form.fields[i].field1 max=12 width=70 text=$form.fields[i].value1}
до&nbsp;{editbox name=$form.fields[i].field2 max=12 width=70 text=$form.fields[i].value2}</p>
{elseif $form.fields[i].type=="bool"}
<p>{$form.fields[i].name}:</p>
<p>
<select name="{$form.fields[i].field}">
<option value="0">Не выбрано</option>
<option value="Y" {if $form.fields[i].value=="Y"} selected{/if}>Да</option>
<option value="N" {if $form.fields[i].value=="N"} selected{/if}>Нет</option>
</select>
</p>
{elseif $form.fields[i].type=="text" || $form.fields[i].type=="format"}
<p>{$form.fields[i].name}:</p>
{editbox name=$form.fields[i].field max=$form.fields[i].property text=$form.fields[i].value width="20%"}
{elseif $form.fields[i].type=="select"}
<p>{$form.fields[i].name}:</p>
<p>
<select name="{$form.fields[i].field}">
<option value="0">Не выбрано</option>
{html_options options=$form.fields[i].options selected=$form.fields[i].value}
</select>
</p>
{elseif $form.fields[i].type=="mselect"}
<p>{$form.fields[i].name}:</p>
<div class="box">
<input type="checkbox" name="{$form.fields[i].field}[]" value="0"{if in_array(0,$form.fields[i].value)} checked{/if}>&nbsp;&Oslash;, {html_checkboxes name=$form.fields[i].field options=$form.fields[i].options checked=$form.fields[i].value separator=", "}
</div>
{/if}
{/section}