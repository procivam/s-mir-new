<form name="addcatform" method="post" onsubmit="return cat_form(this)">
<p>Название:</p>
<p>{editbox name="name" width="50%"}</p>
{hidden name="tab" value="cat"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="addcat"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>