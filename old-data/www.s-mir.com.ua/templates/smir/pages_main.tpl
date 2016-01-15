{include file="_header.tpl"}
<body class="mainfon"><div class="main">
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


    {block id ="slidemain"}



{block id ="catmain"}

<table width="100%" class="ban">
  <tr>
	{assign var="type" value=1}
	{block id ="banner"}
	{assign var="type" value=2}
	{block id ="banner"}
	{assign var="type" value=3}
	{block id ="banner"}
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
{$page.content}
    </td>
   {block id ="articlesmain"}
  </tr>
</table>


		</div>	
	</div>
{include file="_footer.tpl"}


</div>
</body>
</html>