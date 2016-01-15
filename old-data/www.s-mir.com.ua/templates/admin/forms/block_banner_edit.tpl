<div{if count($form.structures)==1} style="display:none"{/if}>
<p>Хранилище:</p>
<p>
<select name="b_idstr" onchange="banner_getcategories(this.value)">
{html_options options=$form.structures selected=$form.idstr}
</select>
</p>
</div>
{if $auth->isExpert()}
<p>Шаблон:</p>
<p>{editbox name="b_template" text=$form.template max=50 width="20%"}</p>
{else}
{hidden name="b_template" value=$form.template}
{/if}
<div{if count($form.categories)<=1} style="display:none"{/if}>
<p>Категория:</p>
<p>
<select name="b_idcat">
{html_options options=$form.categories selected=$form.idcat}
</select>
</p>
</div>
<p>Выбор:</p>
<p>
<select name="b_random">
<option value="0"{if $form.random==0} selected{/if}>По порядку</option>
<option value="1"{if $form.random==1} selected{/if}>Случайный</option>
</select>
</p>