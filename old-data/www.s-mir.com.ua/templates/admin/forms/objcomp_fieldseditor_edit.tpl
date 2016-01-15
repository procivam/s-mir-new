<form name="editfieldform" method="post" onsubmit="return field_form(this)">
<p>Идентификатор:<sup style="color:gray">*</sup></p>
<p>{editbox name="field" max=20 width=100 text=$form.field}</p>
<p>Название:<sup style="color:gray">*</sup></p>
{section name=i loop=$form.languages}
{if count($form.languages)>1}
<h3>{$form.languages[i].caption}</h3>
{/if}
<p>{editbox name=$form.languages[i].name max=100 width="60%" text=$form.languages[i].text}</p>
{/section}
<p>Тип:<sup style="color:gray">*</sup></p>
<p>
<select name="type" onchange="fieldseltype(this.value)">
<option value="string"{if $form.type=="string"} selected{/if}>Строка</option>
<option value="int"{if $form.type=="int"} selected{/if}>Целое число</option>
<option value="float"{if $form.type=="float"} selected{/if}>Дробное число</option>
<option value="bool"{if $form.type=="bool"} selected{/if}>Логический (Да/Нет)</option>
<option value="date"{if $form.type=="date"} selected{/if}>Дата</option>
<option value="text"{if $form.type=="text"} selected{/if}>Текст</option>
<option value="format"{if $form.type=="format"} selected{/if}>Форматированный текст</option>
<option value="select"{if $form.type=="select"} selected{/if}>Значение из списка</option>
<option value="mselect"{if $form.type=="mselect"} selected{/if}>Множество значений из списка</option>
<option value="image"{if $form.type=="image"} selected{/if}>Изображение</option>
<option value="file"{if $form.type=="file"} selected{/if}>Файл</option>
</select>
</p>
<div id="field_typestringbox"{if $form.type!="string"} style="display:none"{/if}>
<p>Длина:<sup style="color:gray">*</sup></p>
{if $form.type=="string"}
<p>{editbox name="length" width="50" max=3 text=$form.property}</p>
{else}
<p>{editbox name="length" width="50" max=3 text="50"}</p>
{/if}
</div>
<div id="field_typeboolbox"{if $form.type!="bool"} style="display:none"{/if}>
<p>По умолчанию:&nbsp;
{if $form.type=="bool"}
<label><input type="radio" name="booldef" value="1"{if $form.property} checked{/if}>&nbsp;Да</label>&nbsp;&nbsp;<label><input type="radio" name="booldef" value="0"{if !$form.property} checked{/if}>&nbsp;Нет</label></p>
{else}
<label><input type="radio" name="booldef" value="1">&nbsp;Да</label>&nbsp;&nbsp;<label><input type="radio" name="booldef" value="0" checked>&nbsp;Нет</label></p>
{/if}
</div>
<div id="field_typetextbox"{if $form.type!="text"} style="display:none"{/if}>
<p>Высота редактора (строки):<sup style="color:gray">*</sup></p>
{if $form.type=="text"}
<p>{editbox name="rows" width="50" max=3 text=$form.property}</p>
{else}
<p>{editbox name="rows" width="50" max=3 text="5"}</p>
{/if}
</div>
<div id="field_typeformatbox"{if $form.type!="format"} style="display:none"{/if}>
<p>Высота редактора (пиксели):<sup style="color:gray">*</sup></p>
{if $form.type=="format"}
<p>{editbox name="height" width="50" max=3 text=$form.property}</p>
{else}
<p>{editbox name="height" width="50" max=3 text="200"}</p>
{/if}
</div>
<div id="field_typeselectbox"{if $form.type!="select" && $form.type!="mselect"} style="display:none"{/if}>
<p>
<select name="idvar">
{if $form.type=="select" || $form.type=="mselect"}
{html_options options=$form.vars selected=$form.property}
{else}
{html_options options=$form.vars}
{/if}
<option value="">+Создать список+</option>
</select>
</p>
</div>
<div{if $form.usesearch || $form.usenofront || $form.usefill} class="box" style="margin-top:10px;"{/if}>
{if $form.usesearch}
<p><label><input type="checkbox" name="search"{if $form.search=="Y"} checked{/if}>&nbsp;Фильтр по полю для администратора.</label></p>
{/if}
{if $form.usenofront}
<p><label><input type="checkbox" name="nofront"{if $form.nofront=="Y"} checked{/if}>&nbsp;Не использовать во внешних формах.</label></p>
{/if}
{if $form.usefill}
<p><label><input type="checkbox" name="fill"{if $form.fill=="Y"} checked{/if}>&nbsp;Обязательно для заполнения во внешних формах.</label></p>
{/if}
</div>
{hidden name="id" value=$form.id}
{hidden name="tab" value=$form.tab}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="obj_action" value="fld_edit"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>