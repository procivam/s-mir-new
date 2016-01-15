<form name="uploadxlsform" method="post" enctype="multipart/form-data" onsubmit="runLoading();return true;">
<p>Файл xls, csv:</p>
<p><input type="file" name="file"></p>
<div class="box">
<p><label><input type="radio" name="clear" value="0" checked>&nbsp;Обновить каталог</label></p>
<p><label><input type="radio" name="clear" value="1">&nbsp;Удалить категории и товары перед импортом</label></p>
<p><label><input type="radio" name="clear" value="2">&nbsp;Удалить только товары перед импортом</label></p>
</div>
{hidden name="tab" value="import"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="import"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="iempty" checked>&nbsp;Игнорировать пустые ячейки</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>