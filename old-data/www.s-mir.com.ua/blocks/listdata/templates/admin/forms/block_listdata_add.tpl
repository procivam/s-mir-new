<p>Список:</p>
<p>
<select name="b_idstr">
{html_options options=$form.structures}
</select>
</p>
<p>Шаблон:</p>
<p>{editbox name="b_template" text="listdata.tpl" max=50 width="20%"}</p>
<p>Сортировка:</p>
<p>
<select name="b_random">
<option value="0">По заданному порядку</option>
<option value="1">Случайно</option>
</select>
</p>
<p>Количество (0 - все):</p>
<p>{editbox name="b_rows" text="0" max=3 width=50}</p>