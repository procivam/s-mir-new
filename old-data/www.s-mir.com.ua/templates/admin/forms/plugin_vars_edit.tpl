<form name="editform" method="post" onsubmit="return opt_form(this)">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="70%">{editbox name="caption" max=150 text=$form.caption}</td>
<td width="30%">&nbsp;&nbsp;{editbox name="name" max=50 width="95%" text=$form.name}</td>
</tr>
</table>
<p>Значение:</p>
<div id="mode_string"{if $form.mode==1} style="display:none"{/if}>
<p>{editbox name="value" text=$form.value}</p>
</div>
<div id="mode_text"{if $form.mode==0} style="display:none"{/if}>
<p>{textarea name="valuetxt" rows=10 text=$form.value}</p>
</div>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="edit"}
{hidden name="authcode" value=$system.authcode}
{hidden name="tab" value="vars"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="vmode" onclick="setmode(this.checked)"{if $form.mode==1} checked{/if}>&nbsp;Текст</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>