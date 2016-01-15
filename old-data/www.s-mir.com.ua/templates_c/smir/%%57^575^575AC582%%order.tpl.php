<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:46
         compiled from order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'order.tpl', 40, false),array('function', 'captcha', 'order.tpl', 59, false),array('function', 'hidden', 'order.tpl', 65, false),array('function', 'submit', 'order.tpl', 66, false),)), $this); ?>
<?php echo '
<script>
function showOrder(id,name,price)
{

	$(\'#name\').text(name);
	$(\'#price\').text(price);
	$(\'#id\').val(id);
	$(\'#order\').fadeToggle("fast");
}
</script>
'; ?>

<?php echo '
<script type="text/javascript">
function valid_form(form)
{ if(form.name.value.replace(/\\s+/, \'\').length==0)
  { alert("Пожалуйста, заполните имя."); return false; }
  if(form.phone.value.replace(/\\s+/, \'\').length == 0 )
  { alert("Пожалуйста, укажите телефон."); return false; }
  if(form.captcha.value.replace(/\\s+/, \'\').length<4)
  { alert(\'Пожалуйста, укажите цифры на картинке.\'); return false; }
  return true;
}
</script>
'; ?>

<div class="alpfa" id="order" style="display:none;">
	<div class="alpfainer">
    <a href="javascript:void(0);" onclick="$('#order').hide();" class="x"></a>
    <h1>Оформление заказа</h1>
    <p class="alpfaline1"></p>
    <p class="alpfaline2">Вы заказываете <b id ="name">Brother Innovis NV600</b> за <span class="alpfaprice" id="price">4 560.</span><i>- <?php echo $this->_tpl_vars['valute']; ?>
</i></p>
    <p class="alpfaline3"></p>
	<form method="post" enctype="multipart/form-data" onsubmit="return valid_form(this)">
    <p class="p5"><input id="inp3" name="name" type="text" size="10" value="" class="toggle-inputs" />имя</p>   
	<p class="p5"><input id="inp3" name="phone" type="text" size="10" value="" class="toggle-inputs" />Телефон</p>
    <p class="p5"><input id="inp3" name="email" type="text" size="10" value="" class="toggle-inputs" />E-mail</p>
    <p class="p5">
	<?php if ($this->_tpl_vars['couriers']): ?>
<select name="courier" class="select1">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['couriers'],'selected' => $this->_tpl_vars['courier']['id']), $this);?>

</select>
<?php endif; ?>
Способ доставки
    </p>
  <script>
 $('.select1').customStyle1();
  </script>  
    <p class="p5">
     <table width="100%" border="0">
          <tr>
            <td class="td6"><textarea name="comments" id="inp4"></textarea></td>
            <td class="td8_2" >Примечание</td>
          </tr>
        </table>
        </p>
	<table width="100%" border="0" class="tb2">
      <tr>
        <td class="td6"><input id="inp5" type="text" size="10" name="captcha" value="" class="toggle-inputs" /></td>
        <td class="td7"><?php echo smarty_function_captcha(array('width' => '75','height' => '25'), $this);?>
</td>
        <td>Введите код </td>
      </tr>
    </table>
        <br />	
			<input name="id" type="hidden" value="" id="id" />
			<?php echo smarty_function_hidden(array('name' => 'action','value' => 'order'), $this);?>

			<?php echo smarty_function_submit(array('caption' => "Отправить",'class' => 'inerlink2'), $this);?>

			</form>
	</div>
</div>