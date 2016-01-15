<?php /* Smarty version 2.6.26, created on 2015-10-23 05:33:12
         compiled from pages_page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'pages_page.tpl', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body class="inerfon">
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
    <p class="p1"><?php echo $this->_tpl_vars['page']['name']; ?>
</p>
    <a href="/">Главная</a><span class="sp16"><i class="strelka"></i></span>
    <span class="sp17"><?php echo $this->_tpl_vars['page']['name']; ?>
</span>
</div>
<?php echo $this->_tpl_vars['page']['content']; ?>

<?php if ($this->_tpl_vars['page']['addr']): ?><p><a href="<?php echo $this->_tpl_vars['page']['addr']; ?>
" class="inerlink">Смотреть адреса магазинов</a></p><?php endif; ?>


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