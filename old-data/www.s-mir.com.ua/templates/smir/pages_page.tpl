{include file="_header.tpl"}

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
    <p class="p1">{$page.name}</p>
    <a href="/">Главная</a><span class="sp16"><i class="strelka"></i></span>
    <span class="sp17">{$page.name}</span>
</div>
{$page.content}
{if $page.addr}<p><a href="{$page.addr}" class="inerlink">Смотреть адреса магазинов</a></p>{/if}


		</div>	
	</div>

	{include file="_footer.tpl"}

</div>
</body>
</html>
