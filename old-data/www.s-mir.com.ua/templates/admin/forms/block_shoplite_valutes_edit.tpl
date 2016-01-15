<div{if count($form.structures)==1} style="display:none"{/if}>
<p>Дополнение:</p>
<p>
<select name="b_idstr" onchange="banner_getcategories(this.value)">
{html_options options=$form.structures selected=$form.idstr}
</select>
</p>
</div>
<p>Шаблон:</p>
<p>{editbox name="b_template" text=$form.template max=50 width="20%"}</p>