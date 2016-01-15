<form method="post" onsubmit="return addadmin_form(this)">
<p>Имя:<sup style="color:gray">*</sup></p>
<p>{editbox name="name" width="40%"}&nbsp;&nbsp;<label><input type="checkbox" name="active" value="Y" checked>&nbsp;Активен</label></p>
<p>Логин:<sup style="color:gray">*</sup></p>
<p>{editbox name="login" max=20 width="20%"}</p>
<p>Пароль:<sup style="color:gray">*</sup></p>
<p>{passbox name="password"}</p>
<p>Email:</p>
<p>{editbox name="email" max=50 width="20%"}</p>
<h3>Доступ к сайтам:</h3>
<p><label><input type="checkbox" name="check_accessall" checked onclick="checkdomain('boxall')">&nbsp;Все (суперадмин)</label></p>
<div id="boxall" style="display:none">
{section name=i loop=$form.domains}
<div id="box_{$form.domains[i].name}"{if !$form.domains[i].selected} style="display:none"{/if}>
<p>
<select onchange="changedomain(this,'{$form.domains[i].name}',this.value)">
{html_options options=$form.sdomains selected=$form.domains[i].name}
</select>&nbsp;
<label><input type="checkbox" name="domains[]" value="{$form.domains[i].name}" onclick="checkdomain('box__{$form.domains[i].name}')">&nbsp;Все</label>
</p>
<div id="box__{$form.domains[i].name}">
{if $form.domains[i].files}
<div class="box">
{section name=j loop=$form.domains[i].files}
<nobr><label><input type="checkbox" name="items[]" value="{$form.domains[i].files[j].item}">&nbsp;{$form.domains[i].files[j].caption}</label>{if !$smarty.section.j.last}, {/if}</nobr>
{/section}
</div>
{/if}
{if $form.domains[i].sections}
<div class="box">
{section name=j loop=$form.domains[i].sections}
<nobr><label><input type="checkbox" name="items[]" value="{$form.domains[i].sections[j].section}">&nbsp;{$form.domains[i].sections[j].caption}</label>{if !$smarty.section.j.last}, {/if}</nobr>
{/section}
</div>
{/if}
{if $form.domains[i].structures}
<div class="box">
{section name=j loop=$form.domains[i].structures}
<nobr><label><input type="checkbox" name="items[]" value="{$form.domains[i].structures[j].structure}">&nbsp;{$form.domains[i].structures[j].caption}</label>{if !$smarty.section.j.last}, {/if}</nobr>
{/section}
</div>
{/if}
</div>
</div>
{/section}
</div>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="add"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="expert" checked>&nbsp;Эксперт</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>