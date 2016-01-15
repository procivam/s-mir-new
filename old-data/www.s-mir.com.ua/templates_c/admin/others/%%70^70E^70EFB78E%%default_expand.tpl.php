<?php /* Smarty version 2.6.26, created on 2015-10-22 16:40:05
         compiled from default_expand.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'image', 'default_expand.tpl', 5, false),array('function', 'popup', 'default_expand.tpl', 5, false),)), $this); ?>
<div id="treeitem_<?php echo $this->_tpl_vars['idcat']; ?>
"<?php if (strpos ( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' ) !== false): ?> style="position:fixed"<?php endif; ?>>
<table class="expand" cellpadding=0 cellspacing=0>
<tr<?php if (! $this->_tpl_vars['active']): ?> class="close"<?php endif; ?>>
<td width="16"><?php if ($this->_tpl_vars['bexpand']): ?><img id="<?php echo $this->_tpl_vars['idpic']; ?>
" hspace="2" src="/templates/admin/images/collapse.gif" width="9" height="9" onclick="<?php echo $this->_tpl_vars['jfun']; ?>
" style="cursor:pointer"><?php else: ?>&nbsp;<?php endif; ?></td>
<?php if ($this->_tpl_vars['idimg']): ?><td width="20"><?php ob_start(); ?><?php echo smarty_function_image(array('id' => $this->_tpl_vars['idimg'],'width' => 150), $this);?>
<?php $this->_smarty_vars['capture']['cimage'] = ob_get_contents(); ob_end_clean(); ?><img src="/templates/admin/images/image.gif" width="16" height="16" <?php echo smarty_function_popup(array('text' => $this->_smarty_vars['capture']['cimage'],'fgcolor' => "#F3FCFF",'width' => 150,'bgcolor' => "#86BECD",'left' => true), $this);?>
></td><?php endif; ?>
<?php if ($this->_tpl_vars['selected']): ?><td><b><?php echo $this->_tpl_vars['title']; ?>
<?php if ($this->_tpl_vars['count']): ?>  (<?php echo $this->_tpl_vars['count']; ?>
)<?php endif; ?></b></td><?php else: ?><td><?php echo $this->_tpl_vars['title']; ?>
<?php if ($this->_tpl_vars['count']): ?>  (<?php echo $this->_tpl_vars['count']; ?>
)<?php endif; ?></td><?php endif; ?>
<?php if ($this->_tpl_vars['bedit']): ?>
<td width="25" align="center"><a href="javascript:getaddcatform(<?php echo $this->_tpl_vars['idcat']; ?>
,<?php echo $this->_tpl_vars['idker']; ?>
,<?php echo $this->_tpl_vars['level']; ?>
)" title="Добавить подкатегорию"><img src="/templates/admin/images/add.gif" width="16" height="16" alt="Добавить подкатегорию"></a></td>
<td width="25" align="center"><?php echo $this->_tpl_vars['bedit']; ?>
</td>
<td width="25" align="center"><?php if ($this->_tpl_vars['blink']): ?><a href="<?php echo $this->_tpl_vars['blink']; ?>
" target="_blank" title="Просмотр на сайте"><img src="/templates/admin/images/browse.gif" width="16" height="16" alt="Просмотр на сайте"></a><?php else: ?>&nbsp;<?php endif; ?></td>
<?php if ($this->_tpl_vars['seo']): ?><td width="25" align="center"><a href="javascript:geturlseoform('<?php echo $this->_tpl_vars['blink']; ?>
')" title="SEO оптимизация"><img src="/templates/admin/images/addpage.gif" width="16" height="16"></a></td><?php endif; ?>
<td width="25" align="center"><a href="javascript:getmovecatform(<?php echo $this->_tpl_vars['idcat']; ?>
)" title="Переместить"><img src="/templates/admin/images/move.gif" width="16" height="16" alt="Переместить"></a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['bdel']): ?><td width="20" align="center"><?php echo $this->_tpl_vars['bdel']; ?>
</td><?php endif; ?>
</tr>
</table>
<input type="hidden" id="treeiteml_<?php echo $this->_tpl_vars['idcat']; ?>
" value="<?php echo $this->_tpl_vars['level']; ?>
">
<div id="<?php echo $this->_tpl_vars['id']; ?>
" style="display:none" class="expand_content">
<?php echo $this->_tpl_vars['content']; ?>

</div>
</div>