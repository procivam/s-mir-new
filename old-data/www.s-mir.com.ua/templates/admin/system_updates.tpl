{include file="_header.tpl"}

{if $newversion || $extensions}
<div class="box" style="width:800px;margin-bottom:15px;">
<form name="autoform" method="post" onsubmit="showLoading();return true;">
<h2>Автообновление:</h2>
{if $newversion}
<h3>Система:</h3>
<div class="box">
<label><input type="checkbox" name="system" value="{$newversion}" checked>&nbsp;Обновить до версии {$newversion|regex_replace:"/([0-9][0-9])$/":".\\1"}</label>
</div>
{/if}
{if $extensions}
<h3>Расширения:</h3>
<table class="grid">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="100">Тип</th>
<th align="left">Название</th>
<th align="left" width="100">Версия</th>
</tr>
{section name=i loop=$extensions}
<tr class="{cycle values="row0,row1"}">
<td width="20"><input type="checkbox" name="ext[]" value="{$extensions[i].file}" checked></td>
<td width="100">{$extensions[i].type}</td>
<td>{$extensions[i].name}</td>
<td width="100">{$extensions[i].version|regex_replace:"/([0-9][0-9])$/":".\\1"}</td>
</tr>
{/section}
</table>
{/if}

{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="autoupdate"}
<div align="right" style="margin-top:10px">
{submit caption="Обновить"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>
</div>
{/if}

<div class="box" style="width:800px">
<form name="uploadform" method="post" enctype="multipart/form-data" onsubmit="showLoading();return true;">
<h3>Загрузить файл:</h3>
<br>
<p><input type="file" name="updatefile"></p>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="update"}
<div align="right" style="margin:5px;margin-top:10px">
{submit caption="Загрузить"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>
</div>

{if $smarty.get.update=="ok"}
{assign var='debugdata' value='<script type="text/javascript">alert("Обновление установлено!")</script>'}
{elseif $smarty.get.update=="err_unpack"}
{assign var='debugdata' value='<script type="text/javascript">alert("Не удалось обновить файлы!")</script>'}
{elseif $smarty.get.update=="err_version"}
{assign var='debugdata' value='<script type="text/javascript">alert("Обновление не требуется!")</script>'}
{elseif $smarty.get.update=="err_file"}
{assign var='debugdata' value='<script type="text/javascript">alert("Неверный формат файла!")</script>'}
{/if}

{include file="_footer.tpl"}
