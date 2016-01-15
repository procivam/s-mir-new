<?php /* Smarty version 2.6.26, created on 2015-10-22 23:34:49
         compiled from feedback_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'feedback_main.tpl', 25, false),array('function', 'editbox', 'feedback_main.tpl', 60, false),array('function', 'textarea', 'feedback_main.tpl', 65, false),array('function', 'captcha', 'feedback_main.tpl', 77, false),array('function', 'submit', 'feedback_main.tpl', 83, false),array('function', 'hidden', 'feedback_main.tpl', 85, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
function valid_form(form)
{ '; ?>
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
  <?php if ($this->_tpl_vars['field']['fill'] == 'Y' && $this->_tpl_vars['field']['type'] != 'bool' && $this->_tpl_vars['field']['type'] != 'select'): ?>
  if(form.<?php echo $this->_tpl_vars['field']['field']; ?>
.value.replace(/\s+/, '').length==0)
  <?php echo '{'; ?>
 alert("Пожалуйста, заполните поле '<?php echo $this->_tpl_vars['field']['name']; ?>
'"); return false;<?php echo '}'; ?>

  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  <?php echo '
  if(form.captcha.value.replace(/\\s+/, \'\').length<4)
  { alert(\'Пожалуйста, укажите цифры на картинке.\'); return false; }'; ?>
<?php echo '
  return true;
}
</script>
'; ?>



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
    <p class="p1">Контактная информация</p>
    <a href="">Главня</a><span class="sp16"><i class="strelka"></i></span>
    <span class="sp17">Контакты</span>

</div>        
        
<table width="100%">
  <tr>
    <td class="td1">
<?php echo $this->_tpl_vars['content']; ?>

<p class="magaz">Наши магазины</p>    
 
<?php echo smarty_function_block(array('id' => 'contacts_addr'), $this);?>


    </td>
    <td class="td2">
    <div class="fon">
	
<?php if ($this->_tpl_vars['errors']['captcha']): ?>
<p style="color:red">Неверно введены контрольные цифры, попробуйте еще раз.</p>
<?php endif; ?>
	<form method="post" onsubmit="return valid_form(this)" enctype="multipart/form-data">
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
	<?php if ($this->_tpl_vars['field']['type'] == 'string'): ?>
		 <p class="p5"><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['field']['field'],'max' => $this->_tpl_vars['field']['length'],'id' => 'inp3','text' => $this->_tpl_vars['field']['value'],'width' => '300','class' => "toggle-inputs"), $this);?>
<?php echo $this->_tpl_vars['field']['name']; ?>
</p>   
	<?php elseif ($this->_tpl_vars['field']['type'] == 'text'): ?>
		 <p class="p5">
			<table width="100%" border="0">
				<tr>
					<td class="td6"><?php echo smarty_function_textarea(array('name' => $this->_tpl_vars['field']['field'],'id' => 'inp4','width' => '300','rows' => $this->_tpl_vars['field']['property'],'text' => $this->_tpl_vars['field']['value']), $this);?>
</td>
					<td class="td8_2" ><?php echo $this->_tpl_vars['field']['name']; ?>
</td>
				</tr>
			</table>
        </p>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
    

<table width="100%" border="0" class="tb2">
      <tr>
        <td class="td6"><?php echo smarty_function_editbox(array('name' => 'captcha','max' => 4,'width' => '75px','class' => "toggle-inputs",'id' => 'inp5'), $this);?>
</td>
        <td class="td7"><?php echo smarty_function_captcha(array('width' => '75','height' => '25'), $this);?>
</td>
        <td>Введите код </td>
      </tr>
    </table>

        <br />
    <p><?php echo smarty_function_submit(array('class' => 'inerlink2','caption' => "Отправить"), $this);?>
</p>       
	
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'send'), $this);?>

</form>	
   </div>
    </td>
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