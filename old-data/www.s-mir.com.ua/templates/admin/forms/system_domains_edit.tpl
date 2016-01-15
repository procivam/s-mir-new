<form name="editdomainform" method="post" onsubmit="return domain_form(this)">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Домен:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="70%">{editbox name="domain" text=$form.domain}</td>
<td width="30%">&nbsp;&nbsp;{editbox name="name" max=30 width="90%" text=$form.name readonly=true}</td>
</tr>
</table>
<p>Лицензионный ключ:</p>
<p>{editbox name="code" width="40%" text=$form.code}</p>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="edit"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>