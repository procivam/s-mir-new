<form name="addrssform" method="post" onsubmit="return rss_form(this)">
<p>Раздел материалов:</p>
<p>
<select name="idsec" onchange="getcategories(this.value,this.form)">
<option value="0">Все</option>
{html_options options=$form.sections}
</select>
<div id="catsbox" style="display:none">
</p>
<p>Категория:</p>
<p>
<select name="idcat">
<option value="0">Все</option>
{html_options options=$form.categories}
</select>
</p>
</div>
<p>Количество материалов:</p>
<p>{editbox name="rows" width="50" text="50"}</p>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="addrss"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>