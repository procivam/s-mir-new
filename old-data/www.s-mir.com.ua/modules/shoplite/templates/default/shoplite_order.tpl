{include file="_header.tpl"}

<h1>Заказ</h1>

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

<h3>Информация о Вашем заказе:</h3>

{section name=i loop=$basket}
{$basket[i].data.name} - {$basket[i].count} шт. {$basket[i].sum} {$valute}<br>
{/section}
Общая сумма заказа: {$all.sum} {$valute}<br><br>
<a href="{$basketlink}">Вернуться в корзину</a><br>

<h3>Для оформления покупки, пожалуйста, заполните следующую форму.</h3>

{if $errors.captcha}
<p style="color:red">Неверно введены контрольные цифры, попробуйте еще раз.</p>
{/if}

<form method="post" onsubmit="return valid_form(this)">
Ф.И.О.:<br>
{editbox name="name" width="40%" text=$form.name}<br>
Контактный телефон:<br>
{editbox name="phone" width="40%" text=$form.phone}<br>
Е-mail:<br>
{editbox name="email" width="40%" text=$form.email}<br>
Адрес доставки:<br>
{textarea name="address" rows=5 text=$form.address}<br>
Комментарий к заказу:<br>
{textarea name="comments" rows=5 text=$form.comments}<br>
{if $pay}
Способ оплаты<br>
<select name="pay">{html_options options=$pay selected=$form.pay}</select>
{/if}
{captcha style="float:right"}
Введите цифры на картинке: {editbox name="captcha" max=4 width="40px"}
<div class="clear"></div>
{submit caption="Заказать"}
{hidden name="action" value="order"}
</form>

{include file="_footer.tpl"}