<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:54
         compiled from catmain.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'imagedata', 'catmain.tpl', 6, false),)), $this); ?>
<table width="100%" border="1">
 <tr>
<?php $this->assign('k', 0); ?>
<?php $this->assign('kk', 0); ?>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo smarty_function_imagedata(array('var' => 'img','id' => $this->_tpl_vars['categories'][$this->_sections['i']['index']]['foto']), $this);?>

<?php $this->assign('k', $this->_tpl_vars['k']+1); ?>
<?php $this->assign('kk', $this->_tpl_vars['kk']+1); ?>

	<td class="tdblock">
        <div class="block" rel="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/fonkv<?php echo $this->_tpl_vars['kk']; ?>
.jpg">
           <a href="<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['link']; ?>
"><img src="/imgsize4.php?filename=<?php echo $this->_tpl_vars['img']['path']; ?>
&width=<?php echo $this->_tpl_vars['img']['width']; ?>
&height=<?php echo $this->_tpl_vars['img']['height']; ?>
" /><p><?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['name']; ?>
</p></a>
        </div>
    </td>
		<?php if ($this->_tpl_vars['kk'] == '4'): ?>
  <?php $this->assign('kk', 0); ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['k'] == '5'): ?>
  </tr>
  <tr>
  <?php $this->assign('k', 0); ?>
<?php endif; ?>
<?php endfor; endif; ?>
</tr>
</table>