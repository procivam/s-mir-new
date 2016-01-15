<form name="editform" method="post" onsubmit="return data_form(this)" enctype="multipart/form-data">
<p>Название:</p>
{section name=i loop=$form.languages}
{if count($form.languages)>1}
<div class="box">
<h3>{$form.languages[i].caption}</h3>
{else}
<div>
{/if}
<p>{editbox name=$form.languages[i].field max=150 width="60%" text=$form.languages[i].value}</p>
</div>
{/section}
{include file="objcomp_fieldseditor_include.tpl"}
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="edit"}
{hidden name="tab" value="main"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>