<div{if count($form.sections)==1} style="display:none"{/if}>
<p>Раздел:</p>
<p>
<select name="b_idsec">
{html_options options=$form.sections selected=$form.idsec}
</select>
</p>
</div>
<p>Шаблон:</p>
<p>{editbox name="b_template" max=50 width="20%" text=$form.template}</p>