<?php /* Smarty version 2.6.26, created on 2016-01-06 15:26:09
         compiled from pages_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'pages_main.tpl', 5, false),)), $this); ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="mainfon"><div class="main">
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


    <?php echo smarty_function_block(array('id' => 'slidemain'), $this);?>




<?php echo smarty_function_block(array('id' => 'catmain'), $this);?>


<table width="100%" class="ban">
  <tr>
	<?php $this->assign('type', 1); ?>
	<?php echo smarty_function_block(array('id' => 'banner'), $this);?>

	<?php $this->assign('type', 2); ?>
	<?php echo smarty_function_block(array('id' => 'banner'), $this);?>

	<?php $this->assign('type', 3); ?>
	<?php echo smarty_function_block(array('id' => 'banner'), $this);?>

  </tr>
  <tr><td colspan="10" class="ban6"></td></tr>
</table>

<table width="100%" class="mainnews">
  <tr>
    <td class="mainnews1"><p class="mainnewsnazv">Надо кого-то пришить?</p></td>
    <td rowspan="2" class="mainnews2">&nbsp;</td>
    <td colspan="3"><p class="mainnewsnazv">Полезно почитать <a href="/articles/">Читать все</a></p></td>
  </tr>
  <tr>
    <td>
<?php echo $this->_tpl_vars['page']['content']; ?>

    </td>
   <?php echo smarty_function_block(array('id' => 'articlesmain'), $this);?>

  </tr>
</table>


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