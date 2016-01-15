<form name="addform" method="post" onsubmit="return url_form(this)">
<p>URL:<sup style="color:gray">*</sup></p>
<p>{editbox name="url"}</p>
{section name=i loop=$form.items}
<p>{$form.items[i].caption}:</p>
{if $form.items[i].mode}
<p>{textarea name=$form.items[i].name rows=10}</p>
{else}
<p>{editbox name=$form.items[i].name}</p>
{/if}
{hidden name="id[]" value=$form.items[i].id}
{/section}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="addurl"}
{hidden name="authcode" value=$system.authcode}
{hidden name="tab" value="urls"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>