<form name="addtransform" method="post" onsubmit="return trans_addform(this)">
<p>Приход:</p>
<p>{editbox name="in" width="60"} {$options.valute}</p>
<p>Расход:</p>
<p>{editbox name="out" width="60"} {$options.valute}</p>
<p>Описание:</p>
{textarea name="description" rows=3}
{hidden name="idusers" value=$form.idusers}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{if $form.box=='userbox'}
{hidden name="tab" value="users"}
{else}
{hidden name="tab" value="trans"}
{/if}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="addtrans"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>