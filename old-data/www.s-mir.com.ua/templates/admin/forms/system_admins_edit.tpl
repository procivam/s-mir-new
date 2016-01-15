<form method="post" onsubmit="return editadmin_form(this)">
<p>Имя:<sup style="color:gray">*</sup></p>
<p>{editbox name="name" width="40%" text=$form.name}{if $form.id!=$auth->id}&nbsp;&nbsp;<label><input type="checkbox" name="active" value="Y"{if $form.active=='Y'} checked{/if}>&nbsp;Активен</label>{else}&nbsp;&nbsp;<input type="checkbox" name="active" checked disabled>&nbsp;Активен<input type="hidden" name="active" value="Y">{/if}</p>
<p>Логин:<sup style="color:gray">*</sup></p>
<p>{editbox name="login" max=20 width="20%" text=$form.login}</p>
<p>Новый пароль (если хотите сменить):</p>
<p>{passbox name="password"}</p>
<p>Email:</p>
<p>{editbox name="email" max=50 width="20%" text=$form.email}</p>
<h3>Доступ к сайтам:</h3>
<p><label><input type="checkbox" name="check_accessall"{if $form.accessall} checked{/if}{if $form.id==$auth->id} disabled{else} onclick="checksuper()"{/if}>&nbsp;Все (суперадмин)</label></p>
<div id="boxall"{if $form.accessall} style="display:none"{/if}>
{section name=i loop=$form.domains}
<div id="box_{$form.domains[i].name}"{if !$form.domains[i].selected} style="display:none"{/if}>
<p>
<select onchange="changedomain(this,'{$form.domains[i].name}',this.value)">
{html_options options=$form.sdomains selected=$form.domains[i].name}
</select>&nbsp;
<label><input type="checkbox" name="domains[]" value="{$form.domains[i].name}"{if $form.domains[i].checked} checked{/if} onclick="checkdomain('box__{$form.domains[i].name}')">&nbsp;Все</label>
</p>
<div id="box__{$form.domains[i].name}"{if $form.domains[i].checked} style="display:none"{/if}>
{if $form.domains[i].files}
<div class="box">
{section name=j loop=$form.domains[i].files}
<nobr><label><input type="checkbox" name="items[]" value="{$form.domains[i].files[j].item}"{if $form.domains[i].files[j].checked} checked{/if}>&nbsp;{$form.domains[i].files[j].caption}</label>{if !$smarty.section.j.last}, {/if}</nobr>
{/section}
</div>
{/if}
{if $form.domains[i].sections}
<div class="box">
{section name=j loop=$form.domains[i].sections}
<nobr><label><input type="checkbox" name="items[]" value="{$form.domains[i].sections[j].section}"{if $form.domains[i].sections[j].checked} checked{/if}>&nbsp;{$form.domains[i].sections[j].caption}</label>{if !$smarty.section.j.last}, {/if}</nobr>
{/section}
</div>
{/if}
{if $form.domains[i].structures}
<div class="box">
{section name=j loop=$form.domains[i].structures}
<nobr><label><input type="checkbox" name="items[]" value="{$form.domains[i].structures[j].structure}"{if $form.domains[i].structures[j].checked} checked{/if}>&nbsp;{$form.domains[i].structures[j].caption}</label>{if !$smarty.section.j.last}, {/if}</nobr>
{/section}
</div>
{/if}
</div>
</div>
{/section}
</div>
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="action" value="edit"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="expert"{if $form.expert=='Y'} checked{/if}{if $form.id==$auth->id} disabled{/if}>&nbsp;Эксперт</label>
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
{hidden name="authcode" value=$system.authcode}
</form>