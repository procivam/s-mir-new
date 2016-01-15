{include file="_header.tpl"}
<body class="inerfon2">
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
    <p class="p1">Полезно почитать</p>
    <a href="/">Главная</a><span class="sp16"><i class="strelka"></i></span>
    <span class="sp17">Полезная информация</span>

</div>        
        

<table width="100%" border="0">
  <tr>
    <td class="lcol3">
	{assign var="k" value=0}
{section name=i loop=$items}
{assign var="k" value=$k+1}
<table width="100%"  class="news">
  <tr>
    <td class="lcol4"><a href="{$items[i].link}"><img src="/imgsize4.php?filename={$items[i].images[0].path}&width=168&height=122" /></a></td>
    <td class="rcol4">
        <a href="{$items[i].link}" class="link4">{$items[i].name}</a>
{$items[i].description}
        </td>
  </tr>
</table>


{if $k==3 & !$smarty.section.i.last}
{assign var="k" value=0}
</td>
    <td class="rcol3">
{else}
	<p class="otstup"></p>
{/if}
{/section}
 </td>
  </tr>
</table>

{object obj=$items_pager}
		</div>	
	</div>

{include file="_footer.tpl"}

</div>
</body>
</html>
