{hidden name="b_idsec" value=$form.idsec}
<p>Шаблон:</p>
<p>{editbox name="b_template" max=50 width="20%" text=$form.template}</p>
<p>Разделы:</p>
<p>{html_checkboxes name="b_idsections" options=$form.sections separator=", " checked=$form.idsections}</p>
<p>Теги (через запятую):</p>
<p>{tags name="b_tags" text=$form.tags}</p>
<p>Количество:</p>
<p>{editbox name="b_rows" text=$form.rows width="80px"}</p>