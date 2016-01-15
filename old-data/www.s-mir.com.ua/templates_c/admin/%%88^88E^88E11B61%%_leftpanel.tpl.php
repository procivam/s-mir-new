<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:05
         compiled from _leftpanel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', '_leftpanel.tpl', 22, false),)), $this); ?>
<?php if ($this->_tpl_vars['system']['mode'] == 'sections' || $this->_tpl_vars['system']['mode'] == 'structures' || $this->_tpl_vars['auth']->isExpert()): ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td width="5" height="5"></td>
<td width="190" ></td>
<td width="5" height="5"></td>
</tr>
<tr>
<td valign="top" width="5" ></td>
<td width="190" valign="top" align="center">
<div align="center" style=" margin-top:5;margin-bottom:5;"><font style="font-size:23px !important;font-family: arial;font-weight:regular;" color="da0866"><?php echo '{'; ?>
 управление <?php echo '}'; ?>
</font></div>
<center>
<div id="leftmenubox">
<Br/>
<?php $_from = $this->_tpl_vars['leftmenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menuitem']):
?>
<table <?php if ($this->_tpl_vars['menuitem']['id']): ?> id="leftmenuitem_<?php echo $this->_tpl_vars['menuitem']['id']; ?>
"<?php endif; ?> width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#DAEBF0" style="margin-bottom:3">
<tr>

<td  bgcolor="#ffffff" nowrap >
<ul class="left_m">
<?php if ($this->_tpl_vars['menuitem']['item'] == $this->_tpl_vars['system']['item']): ?>
<li><img class="bgimg_act" src="/templates/admin/images/bg_l_menu_act.png"><a class="cp_link_headding_leftmenu lact" href="admin.php?mode=<?php echo $this->_tpl_vars['system']['mode']; ?>
&item=<?php echo $this->_tpl_vars['menuitem']['item']; ?>
" title="<?php echo $this->_tpl_vars['menuitem']['name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menuitem']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18, "...", true) : smarty_modifier_truncate($_tmp, 18, "...", true)); ?>
</a></li>
<?php else: ?>
<li><img class="bgimg" src="/templates/admin/images/bg_l_menu_act.png"><a class="cp_link_headding_leftmenu" href="admin.php?mode=<?php echo $this->_tpl_vars['system']['mode']; ?>
&item=<?php echo $this->_tpl_vars['menuitem']['item']; ?>
" title="<?php echo $this->_tpl_vars['menuitem']['name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menuitem']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18, "...", true) : smarty_modifier_truncate($_tmp, 18, "...", true)); ?>
</a></li>
<?php endif; ?>
</ul>
</td>
</tr>
</table>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php if ($this->_tpl_vars['system']['mode'] == 'sections'): ?>
<?php echo '<script type="text/javascript">
Sortable.create(\'leftmenubox\',{tag:\'table\',onUpdate: setsectionssort});
</script>'; ?>

<?php elseif ($this->_tpl_vars['system']['mode'] == 'structures'): ?>
<?php echo '<script type="text/javascript">
Sortable.create(\'leftmenubox\',{tag:\'table\',onUpdate: setstructuressort});
</script>'; ?>

<?php endif; ?>
</center>
</td>
<td valign="top" width="5" ><img src="/templates/admin/images/spacer00.gif" width="1" height="1" border="0"></td>
</tr>
<tr>
<td width="5" height="5"><img src="/templates/admin/images/rp_corng.gif" width="5" height="5" border="0" alt=""></td>
<td width="190" ></td>
<td width="5" height="5"><img src="/templates/admin/images/rp_cornh.gif" width="5" height="5" border="0" alt=""></td>
</tr>
</table>
<?php endif; ?>