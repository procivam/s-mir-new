{include file="_mheader.tpl"}

<div class="mainpanel">
<a href="http://wiki.a-cms.ru" title="Руководство" target="_blank" style="float:right;margin-right:5px;"><img width="24" height="24" src="/templates/admin/images/icons/help.gif" alt="Руководство"></a>
<a href="admin.php" style="float:right;margin-right:10px;" title="Обзор панели управления"><img width="24" height="24" src="/templates/admin/images/icons/home.gif" alt="Обзор панели управления"></a>
<a href="http://{$domain}" style="float:right;margin-right:10px;" target="_blank" title="Просмотр сайта"><img width="24" height="24" src="/templates/admin/images/icons/browse.gif" alt="Просмотр сайта"></a>


<div id="overview_tab" class="overview_tab">

<h2 style="margin-top:10px;margin-bottom:10px;"></h2>
<form method="get">
{hidden name="mode" value="rep"}
<select name="item" onchange="this.form.type.value=0;this.form.submit();" style="width:180px">
<option value="extensions">Расширения</option>
<option value="sites" selected>Готовые сайты</option>
</select>
&nbsp;&nbsp;
<select name="type" onchange="this.form.submit()" style="width:180px">
<option value="0">Все</option>
{html_options options=$types selected=$type}
</select>
</form>

{if $errors.invalid}
<div class="warning">Не удалось импортировать сайт.</div>
{/if}
{if $noload}
<div class="warning">Не удалось загрузить даннные.</div>
{/if}

{if $items}
<div style="margin-top:10px;"></div>
{section name=i loop=$items}
<div class="box" style="width:282;height:300;float:left;">
<h3 align="center">{$items[i].name}</h3>
<p align="center"><a href="{window url=$items[i].image width=820 height=830}" title="{if $items[i].description}{$items[i].description}{else}Увеличить{/if}"><img src="{$items[i].simage}" width="280" height="240"></a></p>
<p align="center" style="margin-top:10px;">
{if $items[i].warning}
<input type="button" class="button" value="Импортировать" onclick="setconf({$items[i].id})" style="width:120px">
{else}
<input type="button" class="button" value="Импортировать" onclick="setconf2({$items[i].id})" style="width:120px">
{/if}
</p>
</div>
{/section}
{else}
<div class="box" style="margin-top:20px">Нет данных.</div>
{/if}

</div>
</div>

{if $smarty.get.ok}
{assign var="debugdata" value="<script type='text/javascript'>alert('Импорт сайта успешно завершен.');goactionurl('admin.php');</script>"}
{/if}

{include file="_mfooter.tpl"}