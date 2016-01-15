<form name="additemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%">{editbox name="name"}</td>
<td width="30%">&nbsp;&nbsp;{editbox name="urlname" max=100 width="90%"}</td>
</tr>
<tr>
<td width="70%">Категория:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Артикул:</td>
</tr>
<tr>
<td width="70%">
<p>{treeselect name="idcat" items=$form.categories selected=$form.idcat title="Выбор категории" width="70%"}</p>
{if $options.usecats}
<p>{treeselect id="treecat1" name="idcat1" items=$form.categories title="Выбор категории" width="70%"}</p>
<p>{treeselect id="treecat2" name="idcat2" items=$form.categories title="Выбор категории" width="70%"}</p>
{/if}
</td>
<td width="30%" valign="top">&nbsp;&nbsp;{editbox name="art" max=30 width="90%"}</td>
</tr>
</table>
<p>Текст:</p>
{if $options.fckeditor}
{fckeditor name="content" height=250 toolbar="Medium"}
{else}
{textarea name="content" rows=6}
{/if}
{if !$options.autoanons}
<p>Аннотация:</p>
<p>{textarea name="description" rows=3}</p>
{/if}
{if $options.usetags}
<p>Теги (через запятую):</p>
<p>{tags}</p>
{else}
{hidden name="tags" value=""}
{/if}
{if $options.useimages}
<div class="box">
<div id="imageitems1">
<table class="invisiblegrid" width="100%">
<tr>
<td>Фото 1:</td>
<td width="80%">Описание 1:</td>
</tr>
<tr>
<td><input type="file" name="image1"></td>
<td width="80%"><input type="text" name="imagedescription1" style="width:100%"></td>
</tr>
</table>
</div>
<div id="imageitems2"></div>
<div id="imageitems3"></div>
<div id="imageitems4"></div>
<div id="imageitems5"></div>
<p><a href="javascript:additemimage()" title="Добавить"><img src="/templates/admin/images/add.gif" width="16" height="16" alt="Добавить"></a></p>
</div>
{/if}
{if $options.usefiles}
<p>Прикрепленные файлы:</p>
<div class="box">
<div id="fileitems1">
<table class="invisiblegrid" width="100%">
<tr>
<td>Файл 1:</td>
<td width="80%">Описание 1:</td>
</tr>
<tr>
<td><input type="file" name="file1"></td>
<td width="80%"><input type="text" name="filedescription1" style="width:100%"></td>
</tr>
</table>
</div>
<div id="fileitems2"></div>
<div id="fileitems3"></div>
<div id="fileitems4"></div>
<div id="fileitems5"></div>
<p><a href="javascript:additemfile()" title="Добавить"><img src="/templates/admin/images/add.gif" width="16" height="16" alt="Добавить"></a></p>
</div>
{/if}
<div class="box">
<table class="invisiblegrid" width="100%">
<tr><td width="120">Цена:</td><td width="120">Прошлая цена:</td><td>{if $options.onlyavailable}Количество:{else}&nbsp;{/if}</td><td>&nbsp;</td></tr>
<tr>
<td width="120">{editbox name="price" width="80px"} {$options.valute}</td>
<td width="120">{editbox name="oldprice" width="80px"} {$options.valute}</td>
<td>{if $options.onlyavailable}{editbox name="iscount" width="80px" text="1"}{else}{hidden name="iscount" value=1}{/if}</td>
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
<tr>
<td>{editbox name="mprice1_text"}</td>
<td width="80">{editbox name="mprice1_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice2_text"}</td>
<td width="80">{editbox name="mprice2_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice3_text"}</td>
<td width="80">{editbox name="mprice3_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice4_text"}</td>
<td width="80">{editbox name="mprice4_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice5_text"}</td>
<td width="80">{editbox name="mprice5_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice6_text"}</td>
<td width="80">{editbox name="mprice6_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice7_text"}</td>
<td width="80">{editbox name="mprice7_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice8_text"}</td>
<td width="80">{editbox name="mprice8_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice9_text"}</td>
<td width="80">{editbox name="mprice9_price"}</td>
</tr>
<tr>
<td>{editbox name="mprice10_text"}</td>
<td width="80">{editbox name="mprice10_price"}</td>
</tr>
</table>
</div>
</div>
{/if}
</td>
</tr>
</table>
</div>
{include file="objcomp_fieldseditor_include.tpl"}
{hidden name="tab" value="items"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="additem"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active" checked>&nbsp;Активно</label>&nbsp;&nbsp;
<label><input type="checkbox" name="favorite">&nbsp;Спецпредложение</label>&nbsp;&nbsp;
<label><input type="checkbox" name="new">&nbsp;Новинка</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>