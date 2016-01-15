<p>Список:</p>
<p>
<select name="b_idstr">
{html_options options=$form.structures selected=$form.idstr}
</select>
</p>
{if $auth->isExpert()}
<p>Шаблон:</p>
<p>{editbox name="b_template" text=$form.template max=50 width="20%"}</p>
{else}
{hidden name="b_template" value=$form.template}
{/if}
<p>Сортировка:</p>
<p>
<select name="b_random">
<option value="0"{if $form.random==0} selected{/if}>По заданному порядку</option>
<option value="1"{if $form.random==1} selected{/if}>Случайно</option>
</select>
</p>
<p>Количество (0 - все):</p>
<p>{editbox name="b_rows" text=$form.rows max=3 width=50}</p>