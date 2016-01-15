<?php /* Smarty version 2.6.26, created on 2015-10-22 16:32:58
         compiled from admin_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'admin_main.tpl', 102, false),array('function', 'submit', 'admin_main.tpl', 111, false),array('function', 'hidden', 'admin_main.tpl', 113, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_mheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['nodomains']): ?>
<div  class="mainpanel">



<div id="overview_tab" class="overview_tab" style="background-color:#f2f2f2;">
<table width="100%" height="100%">
<tr>
<td valign="top">

<?php if ($this->_tpl_vars['main']['sections']): ?>
<div style="clear:both;"></div>

<div id="main_sections" style="margin-left:120px;">

<table>
	<tr>
		
		<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
		<td valign=top>
			<font class="mainulzag"><?php echo '{'; ?>
&nbsp;сайт&nbsp;<?php echo '}'; ?>
</font>
			<ul  class="mainul">
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']['site']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<li>
				<a href="admin.php?mode=site&item=<?php echo $this->_tpl_vars['menu']['site'][$this->_sections['i']['index']]['item']; ?>
">
					<?php echo $this->_tpl_vars['menu']['site'][$this->_sections['i']['index']]['name']; ?>

				</a>
				</li>
				<?php endfor; endif; ?>
			</ul>
		</td>
				<td width="100px"></td>
		<?php endif; ?>
				<td valign=top>
			<font class="mainulzag"><?php echo '{'; ?>
&nbsp;разделы&nbsp;<?php echo '}'; ?>
</font>
			<ul  class="mainul">
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['main']['sections']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<li>
				<a href="admin.php?mode=sections&item=<?php echo $this->_tpl_vars['main']['sections'][$this->_sections['i']['index']]['item']; ?>
">
					<?php echo $this->_tpl_vars['main']['sections'][$this->_sections['i']['index']]['name']; ?>

				</a>
				</li>
				<?php endfor; endif; ?>
				
			</ul>
		</td>
			<td width="100px"></td>
				<td valign=top>
			<font class="mainulzag"><?php echo '{'; ?>
&nbsp;блоки&nbsp;<?php echo '}'; ?>
</font>
			<ul  class="mainul">
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['blocks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<li>
				<a href="<?php echo $this->_tpl_vars['blocks'][$this->_sections['i']['index']]['link']; ?>
">
					<?php echo $this->_tpl_vars['blocks'][$this->_sections['i']['index']]['caption']; ?>

				</a>
				</li>
				<?php endfor; endif; ?>
			</ul>
		</td>
		<td width="100px"></td>
		<td valign=top>
			<font class="mainulzag"><?php echo '{'; ?>
&nbsp;дополнительно&nbsp;<?php echo '}'; ?>
</font>
			<ul  class="mainul">
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['main']['structures']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<li>
				<a  href="admin.php?mode=structures&item=<?php echo $this->_tpl_vars['main']['structures'][$this->_sections['i']['index']]['item']; ?>
">
					<?php echo $this->_tpl_vars['main']['structures'][$this->_sections['i']['index']]['name']; ?>

				</a>
				</li>
				<?php endfor; endif; ?>
			</ul>
		</td>
	

	</tr>
</table>

</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'main_sections\',{tag:\'table\',constraint:\'horizontal\',onUpdate: setsectionssort});
</script>'; ?>

<?php endif; ?>


</td>
</tr>
</table>
</div>
</div>
<?php else: ?>
<a href="http://wiki.a-cms.ru" title="Руководство" target="_blank" style="float:right;margin-right:5px;margin-top:-2px;"><img width="24" height="24" src="/templates/admin/images/icons/help.gif" alt="Руководство"></a>
<div align="center" style="margin-top:10%">
<div style="width:600px" align="left">
<h1>Новый сайт</h1>
<?php if ($this->_tpl_vars['errors']['doubleid']): ?><div class="warning">Указанный идентификатор уже используется!</div><?php endif; ?>
<?php if ($this->_tpl_vars['errors']['doubledomain']): ?><div class="warning">Сайт с указанным доменом уже создан в системе!</div><?php endif; ?>
<div align="left" style="border: 1px solid #C5D6DA;padding:10px;margin-top:10px;margin-right:3px;">
<form name="adddomainform" method="post" onsubmit="return domain_form(this)" enctype="multipart/form-data">
<p>Идентификатор:</p>
<p><?php echo smarty_function_editbox(array('name' => 'name','width' => "30%",'text' => $this->_tpl_vars['form']['name']), $this);?>
</p>
<p style="margin-top:5px">Домен:</p>
<p><?php echo smarty_function_editbox(array('name' => 'domain','width' => "60%",'text' => $this->_tpl_vars['form']['domain']), $this);?>
</p>
<p style="margin-top:5px">Название:</p>
<p><?php echo smarty_function_editbox(array('name' => 'caption','width' => "60%"), $this);?>
</p>
<p style="margin-top:5px">Файл готового сайта:</p>
<p><input type="file" name="configarch" style="width:40%"></p>
<p style="margin-top:15px"><label><input type="checkbox" id="torep" name="torep" checked>&nbsp;После создания перейти в репозиторий готовых сайтов</label></p>
<div align="center" style="margin-top:20px">
<?php echo smarty_function_submit(array('caption' => "Создать"), $this);?>

</div>
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'newdomain'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</div>
</div>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_mfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>