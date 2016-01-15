<div{if count($form.structures)==1} style="display:none"{/if}>
<p>Хранилище:</p>
<p>
<select name="b_idstr" onchange="banner_getcategories(this.value)">
{html_options options=$form.structures}
</select>
</p>
</div>
<p>Шаблон:</p>
<p>{editbox name="b_template" text="banner.tpl" max=50 width="20%"}</p>
<div{if count($form.categories)<=1} style="display:none"{/if}>
<p>Категория:</p>
<p>
<select name="b_idcat">
{html_options options=$form.categories}
</select>
</p>
</div>
<p>Выбор:</p>
<p>
<select name="b_random">
<option value="0">По порядку</option>
<option value="1">Случайный</option>
</select>
</p>
