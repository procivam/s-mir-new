<form name="edititemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%">{editbox name="name" text=$form.name}</td>
<td width="30%">&nbsp;&nbsp;{editbox name="urlname" max=100 width="90%" text=$form.urlname}</td>
</tr>
<tr>
<td width="70%">Категория:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Артикул:</td>
</tr>
<tr>
<td width="70%">
<p>{treeselect name="idcat" items=$form.categories selected=$form.idcat title="Выбор категории" width="70%"}</p>
{if $options.usecats}
<p>{treeselect id="treecat1" name="idcat1" items=$form.categories selected=$form.idcat1 title="Выбор категории" width="70%"}</p>
<p>{treeselect id="treecat2" name="idcat2" items=$form.categories selected=$form.idcat2 title="Выбор категории" width="70%"}</p>
{/if}
</td>
<td width="30%" valign="top">&nbsp;&nbsp;{editbox name="art" max=30 width="90%" text=$form.art}</td>
</tr>
</table>
<p>Текст:</p>
{if $options.fckeditor}
{fckeditor name="content" height=250 toolbar="Medium" text=$form.content}
{else}
{textarea name="content" rows=6 text=$form.content}
{/if}
{if !$options.autoanons}
<p>Аннотация:</p>
<p>{textarea name="description" rows=3 text=$form.description}</p>
{/if}
{if $options.usetags}
<p>Теги (через запятую):</p>
<p>{tags text=$form.tags}</p>
{else}
{hidden name="tags" value=$form.tags}
{/if}
{if $options.useimages}
<p>Фото:</p>
{$form.imagesbox->getContent()}
{/if}
{if $options.usefiles}
<p>Прикрепленные файлы:</p>
{$form.filesbox->getContent()}
{/if}
<div class="box">
<table class="invisiblegrid" width="100%">
<tr><td width="120">Цена:</td><td width="120">Прошлая цена:</td><td>{if $options.onlyavailable}Количество:{else}&nbsp;{/if}</td><td>&nbsp;</td></tr>
<tr>
<td width="120">{editbox name="price" width="80px" text=$form.price} {$options.valute}</td>
<td width="120">{editbox name="oldprice" width="80px" text=$form.oldprice} {$options.valute}</td>
<td>{if $options.onlyavailable}{editbox name="iscount" width="80px" text=$form.iscount}{else}{hidden name="iscount" value=$form.iscount}{/if}</td>
<td>
{if $options.modprices}
<a class="cp_link_headding" href="javascript:getmpricesform()" style="float:right">Модификаторы цены</a>
<div id="mpricesbox" style="display:none">
<div id="mprices">
<table width="600">
<tr>
<td align="left"><h3 style="margin:0px">Название</h3></td>
<td align="left" width="80"><h3 style="margin:0px">Цена</h3></td>
</tr>
{section name=i loop=$form.mprices}
<tr>
<td>{editbox name=$form.mprices[i].textname text=$form.mprices[i].textvalue}</td>
<td width="80">{editbox name=$form.mprices[i].pricename text=$form.mprices[i].pricevalue}</td>
</tr>
{/section}
</table>
</div>
</div>
{/if}
</td>
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