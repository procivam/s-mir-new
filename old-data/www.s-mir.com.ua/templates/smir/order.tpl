{literal}
<script>
function showOrder(id,name,price)
{

	$('#name').text(name);
	$('#price').text(price);
	$('#id').val(id);
	$('#order').fadeToggle("fast");
}
</script>
{/literal}
{literal}
<script type="text/javascript">
function valid_form(form)
{ if(form.name.value.replace(/\s+/, '').length==0)
  { alert("Пожалуйста, заполните имя."); return false; }
  if(form.phone.value.replace(/\s+/, '').length == 0 )
  { alert("Пожалуйста, укажите телефон."); return false; }
  if(form.captcha.value.replace(/\s+/, '').length<4)
  { alert('Пожалуйста, укажите цифры на картинке.'); return false; }
  return true;
}
</script>
{/literal}
<div class="alpfa" id="order" style="display:none;">
	<div class="alpfainer">
    <a href="javascript:void(0);" onclick="$('#order').hide();" class="x"></a>
    <h1>Оформление заказа</h1>
    <p class="alpfaline1"></p>
    <p class="alpfaline2">Вы заказываете <b id ="name">Brother Innovis NV600</b> за <span class="alpfaprice" id="price">4 560.</span><i>- {$valute}</i></p>
    <p class="alpfaline3"></p>
	<form method="post" enctype="multipart/form-data" onsubmit="return valid_form(this)">
    <p class="p5"><input id="inp3" name="name" type="text" size="10" value="" class="toggle-inputs" />имя</p>   
	<p class="p5"><input id="inp3" name="phone" type="text" size="10" value="" class="toggle-inputs" />Телефон</p>
    <p class="p5"><input id="inp3" name="email" type="text" size="10" value="" class="toggle-inputs" />E-mail</p>
    <p class="p5">
	{if $couriers}
<select name="courier" class="select1">
{html_options options=$couriers selected=$courier.id}
</select>
{/if}
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
        <td class="td7">{captcha width="75" height="25"}{*<img src="img/code.jpg" alt="" width="75" height="25" />*}</td>
        <td>Введите код </td>
      </tr>
    </table>
        <br />	
			<input name="id" type="hidden" value="" id="id" />
			{hidden name="action" value="order"}
			{submit caption="Отправить" class="inerlink2"}
			</form>
	</div>
</div>