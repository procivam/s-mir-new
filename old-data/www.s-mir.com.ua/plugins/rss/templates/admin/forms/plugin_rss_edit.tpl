<form name="editrssform" method="post" onsubmit="return rss_form(this)">
<p>Раздел материалов:</p>
<p>
<select name="idsec" onchange="getcategories(this.value,this.form)">
<option value="0">Все</option>
{html_options options=$form.sections selected=$form.idsec}
</select>
</p>
<div id="catsbox"{if $form.idsec==0} style="display:none"{/if}>
<p>Категория:</p>
<p>
<select name="idcat">
<option value="0">Все</option>
{html_options options=$form.categories selected=$form.idcat}
</select>
</p>
</div>
<p>Количество материалов:</p>
<p>{editbox name="rows" width="50" text=$form.rows}</p>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="editrss"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>