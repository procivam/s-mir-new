{hidden name="b_idsec" value=$form.idsec}
<p>Шаблон:</p>
<p>{editbox name="b_template" text="bytags.tpl" max=50 width="20%"}</p>
<p>Разделы:</p>
<p>{html_checkboxes name="b_idsections" options=$form.sections separator=", "}</p>
<p>Теги (через запятую):</p>
<p>{tags name="b_tags"}</p>
<p>Количество:</p>
<p>{editbox name="b_rows" text="5" width="80px"}</p>