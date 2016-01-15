<form name="adddomainform" method="post" onsubmit="return domain_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Домен:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="70%">{editbox name="domain" text=$form.domain}</td>
<td width="30%">&nbsp;&nbsp;{editbox name="name" max=30 width="90%" text=$form.name}</td>
</tr>
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;База данных:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="70%">{editbox name="caption" text=$form.caption}</td>
<td width="30%">&nbsp;&nbsp;<select name="idbase">{html_options options=$form.bases}</select></td>
</tr>
</table>
<p>Файл готового сайта:</p>
<p><input type="file" name="configarch" style="width:40%"></p>
<p>Лицензионный ключ:</p>
<p>{editbox name="code" width="40%"}</p>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="add"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="userep" checked>&nbsp;Доступный репозиторий</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>