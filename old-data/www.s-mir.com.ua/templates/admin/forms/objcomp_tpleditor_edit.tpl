<form name="editfileform" method="post">
{if $form.warning}
<p>Произведенные в этом файле изменения могут быть потеряны после очередного перехода в <a class="cp_link_headding" href="http://wiki.a-cms.ru/constructor/index" title="Что это такое?" target="_blank">режим конструктора</a>.</p>
<div class="note">
<label><input type="radio" name="prop" value="0" checked>&nbsp;Ничего не предпринимать.</label><br>
<label><input type="radio" name="prop" value="2">&nbsp;Не трогать этот файл при автоматической пересборке шаблонов из конструктора.</label><br>
<label><input type="radio" name="prop" value="1">&nbsp;Отключить режим конструктора.</label>
</div>
{else}
<input type="radio" name="prop" value="0" style="display:none">
{/if}
<div class="box">
<textarea id="codearea" name="text" style="width:100%;height:{if $form.warning}580{else}650{/if}px">
{$form.text|escape:"html"}
</textarea>
</div>
<div align="right" style="margin-top:10px">
<p style="float:left">
<a href="javascript:applytpl(document.forms.editfileform)" title="Сохранить не закрывая"><img src="/templates/admin/images/save.gif" width="16" height="16" style="vertical-align:middle"></a>
{if $form.tpls}
&nbsp;&nbsp;Сопутствующие шаблоны:&nbsp;
<select onchange="if(this.value) gotpl(this.value);">
<option value="">-</option>
{html_options options=$form.tpls}
</select>
{/if}
</p>
<p style="float:right">
{button class="submit" caption="OK" onclick="savetpl(this.form)"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</p>
</div>
{hidden name="path" value=$form.path}
{hidden name="authcode" value=$system.authcode}
</form>