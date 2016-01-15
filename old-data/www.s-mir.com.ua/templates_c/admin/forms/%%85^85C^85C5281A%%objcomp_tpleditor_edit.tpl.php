<?php /* Smarty version 2.6.26, created on 2015-12-13 17:25:31
         compiled from objcomp_tpleditor_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'objcomp_tpleditor_edit.tpl', 14, false),array('function', 'html_options', 'objcomp_tpleditor_edit.tpl', 24, false),array('function', 'button', 'objcomp_tpleditor_edit.tpl', 29, false),array('function', 'hidden', 'objcomp_tpleditor_edit.tpl', 33, false),)), $this); ?>
<form name="editfileform" method="post">
<?php if ($this->_tpl_vars['form']['warning']): ?>
<p>Произведенные в этом файле изменения могут быть потеряны после очередного перехода в <a class="cp_link_headding" href="http://wiki.a-cms.ru/constructor/index" title="Что это такое?" target="_blank">режим конструктора</a>.</p>
<div class="note">
<label><input type="radio" name="prop" value="0" checked>&nbsp;Ничего не предпринимать.</label><br>
<label><input type="radio" name="prop" value="2">&nbsp;Не трогать этот файл при автоматической пересборке шаблонов из конструктора.</label><br>
<label><input type="radio" name="prop" value="1">&nbsp;Отключить режим конструктора.</label>
</div>
<?php else: ?>
<input type="radio" name="prop" value="0" style="display:none">
<?php endif; ?>
<div class="box">
<textarea id="codearea" name="text" style="width:100%;height:<?php if ($this->_tpl_vars['form']['warning']): ?>580<?php else: ?>650<?php endif; ?>px">
<?php echo ((is_array($_tmp=$this->_tpl_vars['form']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

</textarea>
</div>
<div align="right" style="margin-top:10px">
<p style="float:left">
<a href="javascript:applytpl(document.forms.editfileform)" title="Сохранить не закрывая"><img src="/templates/admin/images/save.gif" width="16" height="16" style="vertical-align:middle"></a>
<?php if ($this->_tpl_vars['form']['tpls']): ?>
&nbsp;&nbsp;Сопутствующие шаблоны:&nbsp;
<select onchange="if(this.value) gotpl(this.value);">
<option value="">-</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['tpls']), $this);?>

</select>
<?php endif; ?>
</p>
<p style="float:right">
<?php echo smarty_function_button(array('class' => 'submit','caption' => 'OK','onclick' => "savetpl(this.form)"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</p>
</div>
<?php echo smarty_function_hidden(array('name' => 'path','value' => $this->_tpl_vars['form']['path']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>