<form name="importform" method="post" enctype="multipart/form-data">
<p>Файл конфигурации:</p>
<p><input type="file" name="configarch" style="width:40%"></p>
{section name=i loop=$form.domains}
{hidden name="domains[]" value=$form.domains[i].name}
{/section}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="import"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>