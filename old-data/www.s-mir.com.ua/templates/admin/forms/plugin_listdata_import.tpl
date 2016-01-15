<form name="importform" method="post" enctype="multipart/form-data">
<p>Файл xls,csv (A: Название, ?B: доп. поле, ... ):</p>
<p><input type="file" name="file"></p>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="import"}
{hidden name="tab" value="main"}
<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="clear">&nbsp;Очистить перед импортом</label></p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>