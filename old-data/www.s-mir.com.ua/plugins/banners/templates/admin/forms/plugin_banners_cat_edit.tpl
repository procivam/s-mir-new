<form name="editcatform" method="post" onsubmit="return cat_form(this)">
<p>Название:</p>
<p>{editbox name="name" width="50%" text=$form.name}</p>
{hidden name="id" value=$form.id}
{hidden name="tab" value="cat"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="editcat"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>