<?php /* Smarty version 2.6.26, created on 2015-10-23 05:28:06
         compiled from articles_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'articles_main.tpl', 7, false),array('function', 'object', 'articles_main.tpl', 53, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="inerfon2">
<div class="main">

	<div class="header"><div class="header_inner">
   	  	   		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "logo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php echo smarty_function_block(array('id' => 'search'), $this);?>

		<?php echo smarty_function_block(array('id' => 'tel'), $this);?>

		<?php echo smarty_function_block(array('id' => 'basketheader'), $this);?>

        <div class="clearfix"></div>
         <?php echo smarty_function_block(array('id' => 'menu'), $this);?>

    </div></div>

	<div class="content clearfix">	
		<div class="wrapper">
<div class="zag clearfix">
    <p class="p1">Полезно почитать</p>
    <a href="/">Главная</a><span class="sp16"><i class="strelka"></i></span>
    <span class="sp17">Полезная информация</span>

</div>        
        

<table width="100%" border="0">
  <tr>
    <td class="lcol3">
	<?php $this->assign('k', 0); ?>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php $this->assign('k', $this->_tpl_vars['k']+1); ?>
<table width="100%"  class="news">
  <tr>
    <td class="lcol4"><a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
"><img src="/imgsize4.php?filename=<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['images'][0]['path']; ?>
&width=168&height=122" /></a></td>
    <td class="rcol4">
        <a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
" class="link4"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</a>
<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['description']; ?>

        </td>
  </tr>
</table>


<?php if ($this->_tpl_vars['k'] == 3 & ! $this->_sections['i']['last']): ?>
<?php $this->assign('k', 0); ?>
</td>
    <td class="rcol3">
<?php else: ?>
	<p class="otstup"></p>
<?php endif; ?>
<?php endfor; endif; ?>
 </td>
  </tr>
</table>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['items_pager']), $this);?>

		</div>	
	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
</body>
</html>