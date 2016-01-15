<form name="copyitemsform" method="post" onsubmit="return copyform(this)">
<p>Категория:<sup style="color:gray">*</sup></p>
<p>{treeselect name="idcat" items=$form.categories title="Выбор категории" selected=$form.idcat}</p>
<p>Количество копий:<sup style="color:gray">*</sup></p>
<p>{editbox name="count" width="40" max=2 text="1"}</p>
{section name=i loop=$form.items}
{hidden name="checkitem[]" value=$form.items[i]}
{/section}
{hidden name="tab" value="items"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="copyitems"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>