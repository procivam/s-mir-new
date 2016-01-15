<form name="addform" method="post" onsubmit="return seo_form(this)">
<p>URL:<sup style="color:gray">*</sup></p>
<p>{editbox name="url"}</p>
<p>title:</p>
<p>{editbox name="title"}</p>
<p>keywords:</p>
<p>{textarea name="keywords" rows=4}</p>
<p>description:</p>
<p>{textarea name="description" rows=4}</p>
<p>Перенаправление (301):</p>
<p>{editbox name="move"}</p>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="add"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="notfound">&nbsp;Страница удалена (404)</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>