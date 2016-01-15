{include file="_header.tpl"}
{literal}
<script type="text/javascript">
function valid_form(form)
{ {/literal}{foreach from=$fields item=field}
  {if $field.fill=="Y" && $field.type!="bool" && $field.type!="select"}
  if(form.{$field.field}.value.replace(/\s+/, '').length==0)
  {literal}{{/literal} alert("Пожалуйста, заполните поле '{$field.name}'"); return false;{literal}}{/literal}
  {/if}
  {/foreach}
  {literal}
  if(form.captcha.value.replace(/\s+/, '').length<4)
  { alert('Пожалуйста, укажите цифры на картинке.'); return false; }{/literal}{literal}
  return true;
}
</script>
{/literal}


<body class="inerfon">
<div class="main">

	<div class="header"><div class="header_inner">
   			{include file="logo.tpl"}
         {block id = "search"}
		{block id = "tel"}
		{block id="basketheader"}
        <div class="clearfix"></div>
      {block id ="menu"}

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
{$content}
<p class="magaz">Наши магазины</p>    
 
{block id ="contacts_addr"}

    </td>
    <td class="td2">
    <div class="fon">
	
{if $errors.captcha}
<p style="color:red">Неверно введены контрольные цифры, попробуйте еще раз.</p>
{/if}
	<form method="post" onsubmit="return valid_form(this)" enctype="multipart/form-data">
{foreach from=$fields item=field}
	{if $field.type=="string"}
		 <p class="p5">{editbox name=$field.field max=$field.length  id="inp3" text=$field.value width="300" class="toggle-inputs"}{$field.name}</p>   
	{elseif $field.type=="text"}
		 <p class="p5">
			<table width="100%" border="0">
				<tr>
					<td class="td6">{textarea name=$field.field id="inp4" width="300" rows=$field.property text=$field.value}</td>
					<td class="td8_2" >{$field.name}</td>
				</tr>
			</table>
        </p>
	{/if}
{/foreach}
    

<table width="100%" border="0" class="tb2">
      <tr>
        <td class="td6">{editbox name="captcha" max=4 width="75px" class="toggle-inputs" id="inp5"}</td>
        <td class="td7">{captcha width="75" height="25"}</td>
        <td>Введите код </td>
      </tr>
    </table>

        <br />
    <p>{submit class="inerlink2" caption="Отправить"}</p>       
	
{hidden name="action" value="send"}
</form>	
   </div>
    </td>
  </tr>
  
</table>


		</div>	
	</div>

{include file="_footer.tpl"}

</div>
</body>
</html>
