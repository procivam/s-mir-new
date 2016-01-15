<div{if count($form.sections)==1} style="display:none"{/if}>
<p>Раздел:</p>
<p>
<select name="b_idsec" onchange="categories_getcategories(this.value)">
{html_options options=$form.sections}
</select>
</p>
</div>
<p>Шаблон:</p>
<p>{editbox name="b_template" text="shoplite_items.tpl" max=50 width="20%"}</p>
<p>Категория:</p>
<p>
<select name="b_idcat">
<option value="0">Не выбрано</option>
{html_options options=$form.categories}
</select>
</p>
<p>Сортировка:</p>
<select name="b_sort">
<option value="1">По названию</option>
<option value="2">По цене вверх</option>
<option value="3">По цене вниз</option>
<option value="4">По заданному порядку</option>
<option value="5">Случайно</option>
</select>
{if $auth->isSuperAdmin()}
<p>Свое правило сортировки:</p>
<p>{editbox name="b_mysort" width="20%"}</p>
{/if}
<p>Фильтр:</p>
<select name="b_filter">
<option value="0">Все</option>
<option value="1">Спецпредложения</option>
<option value="2">Новинки</option>
</select>
{if $auth->isSuperAdmin()}
<p>Свой фильтр:</p>
<p>{editbox name="b_myfilter" width="20%"}</p>
{/if}
<p>Количество выводимых позиций (0 - все):</p>
<p>{editbox name="b_rows" text="5" max=3 width=50}</p>
<p><label><input type="checkbox" name="b_nodouble" value="1">&nbsp;Исключать уже показанные на странице записи</label></p>
