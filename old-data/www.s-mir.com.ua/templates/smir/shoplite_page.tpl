
{include file="_header.tpl"}

 <link rel="stylesheet" href="{$system.tpldir}/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
      <script src="{$system.tpldir}/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
      {literal}
        <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
          $("area[rel^='prettyPhoto']").prettyPhoto();
          
          $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_rounded',slideshow:3000, autoplay_slideshow: false});
          $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
      
          $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
            changepicturecallback: function(){ initialize(); }
          });
  
          $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
            changepicturecallback: function(){ _bsap.exec(); }
        });
      });
      </script>
      {/literal}
	  
<body class="inerfon">
<div class="main">
{include file="order.tpl"}
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
<div class="left-col">	
{block id ="cat_list"}
</div>
<div class="middle-col">
    <div class="right-col">
<div class="zag clearfix">
    <p class="p1">{$item.name}</p>
   {object obj=$navigation}
</div>        
<table width="100%" border="0">
  <tr>
    <td class="wh1 gallery">
	{if $item.images[1].width>=$item.images[1].height}
		{image data=$item.images[1] width=373}
	{else}
		{image data=$item.images[1]  height=317}
	{/if}
	  {assign var="k" value=0}
	{section name=i loop=$item.images}       
	  {assign var="k" value=$k+1}
	{if $k>2}
		<a href="/{$item.images[i].path}" rel="prettyPhoto[gallery1]">{image data=$item.images[i] width=125 height=110}</a>
		<!--<img src="/imgsize4.php?filename={$item.images[i].path}&width=125&height=110" />-->
	{/if}
	{/section}
    </td>
    <td class="wh2">
<p class="bannazv5">{$item.name}</p>
<p class="price"><b>{$valute}.</b> {$item.price}.- </p>

{if $item.oldprice}<p class="" style="margin-top:5px;color:#ff6600 !important;font:100 14px Arial !important;"><b>Цена магазина: {$item.oldprice}{$valute}</b></p>{/if}
<p class="wline1"></p>
<a href="?action=addbasket&id={$item.id}"{* onClick="showOrder({$item.id},'{$item.name}','{$item.price}')"*} class="bye">Купить</a>
<p class="otstup25"></p>
{$item.content}

{if $item.ins}
	{filedata var="file" id=$item.ins}
	<a href="{$file.link}" class="pdf">Скачать инструкцию</a>   
{/if}

    
    </td>
  </tr>
</table>
<p class="wline2"></p>
<div class="tabshift">
  {if $item.desc}  <a rel="tabsulator1" href="javascript:void(0);">Описание</a>{/if}
    <a class="active" rel="tabsulator2" href="javascript:void(0);">Характеристики</a>
    {if $item.str}<a rel="tabsulator3" href="javascript:void(0);">Строчки</a>{/if}
   {if $item.trim} <a rel="tabsulator4" href="javascript:void(0);">Комплектация</a>{/if}
</div>
  <div class="tabsulators" id="tabsulator1" style="display:none;">
  {if $item.desc}
	{$item.desc}
  {/if}
</div>
  <div class="tabsulators" id="tabsulator3" style="display:none;">
  {if $item.str}
	{$item.str}
  {/if}
</div>
  <div class="tabsulators" id="tabsulator4" style="display:none;">
  {if $item.trim}
	{$item.trim}
  {/if}
</div>

<div class="tabsulators" id="tabsulator2">
<!--Harakteristiks-->
  {assign var="k" value=0}
  {section name=i loop=$item.fields}
  {if $item.fields[i].value!="" && $item.fields[i].field!="showmain" && $item.fields[i].field!="mainfoto" && $item.fields[i].field!="str" && $item.fields[i].field!="desc" && $item.fields[i].field!="trim" && $item.fields[i].field!="ins"}
  {assign var="k" value=$k+1}
  
	<div class="tekline{$k}">
		<table>
			<tr>		
				<td class="har1">
				{if $item.fields[i].h}
				<a href="{$item.fields[i].h}">{$item.fields[i].name}</a>
				{else}
					{$item.fields[i].name}
				{/if}	
				</td>
				<td class="har2">{$item.fields[i].value}</td>
			</tr>
		</table>
	</div>
	{if $k==2}
	{assign var="k" value=0}
  {/if}
   {/if}
  {/section}
<!--end Harakteristiks-->

</div>
<p class="wline3"></p>
<p class="otz">Отзывы</p><!--<a href="" class="otzlink"><span>Оставить отзыв </span></a>-->
{literal}
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
{/literal}
{*<div class="fb-comments" data-href="{$smarty.server.REQUEST_URI}" data-width="648" data-num-posts="2"></div>*}

<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?82"></script>
{literal}
<script type="text/javascript">
  VK.init({apiId: 3484468, onlyWidgets: true});
</script>
{/literal}
<!-- Put this div tag to the place, where the Comments block will be -->
<div id="vk_comments"></div>
<script type="text/javascript">
{literal}
VK.Widgets.Comments("vk_comments", {limit: 10, width: "648", attach: false});
{/literal}
</script>
{if $ties}
<br/>
<p class="wline4" style="margin:0 0 30px;"></p>
<p class="bannazv4">С этим товаром рекомендуем</p>
    
<table width="100%" border="0">
  <tr>
  
	  {section name=i loop=$ties}
		<td class="mach1">
    	<a href="{$ties[i].link}"><img src="/imgsize4.php?filename={$ties[i].images[0].path}&width=196&height=176" /></a>
	    <a href="{$ties[i].link}">{$ties[i].name}</a>
        <p class="price"><b>{$value}.</b> {$ties[i].price}.- </p>
		<a href="javascript:void(0);" onClick="showOrder({$item.id},'{$item.name}','{$item.price}')" class="bye">Купить</a>
    </td>
    {if !$smarty.section.i.last}<td class="mach2">&nbsp;</td>{/if}
	  {/section}

  </tr>
 
</table>
  {/if}
        
    </div>
</div>       
        


		</div>	
	</div>

		{include file="_footer.tpl"}

</div>
</body>
</html>
