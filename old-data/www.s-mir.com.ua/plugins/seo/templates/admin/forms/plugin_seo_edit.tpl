<form name="editform" method="post" onsubmit="return seo_form(this)">
<p>URL:<sup style="color:gray">*</sup></p>
<p>{editbox name="url" text=$form.url}</p>
<p>title:</p>
<p>{editbox name="title" text=$form.title}</p>
<p>keywords:</p>
<p>{textarea name="keywords" rows=4 text=$form.keywords}</p>
<p>description:</p>
<p>{textarea name="description" rows=4 text=$form.description}</p>
<p>Перенаправление (301):</p>
<p>{editbox name="move" text=$form.move}</p>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="edit"}
{hidden name="authcode" value=$system.authcode}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="notfound"{if $form.notfound=='Y'} checked{/if}>&nbsp;Страница удалена (404)</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>