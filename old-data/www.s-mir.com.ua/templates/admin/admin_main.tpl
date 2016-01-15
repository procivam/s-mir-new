{include file="_mheader.tpl"}

{if !$nodomains}
<div  class="mainpanel">



<div id="overview_tab" class="overview_tab" style="background-color:#f2f2f2;">
<table width="100%" height="100%">
<tr>
<td valign="top">

{if $main.sections}
<div style="clear:both;"></div>

<div id="main_sections" style="margin-left:120px;">

<table>
	<tr>
		
		{if $auth->isExpert()}
		<td valign=top>
			<font class="mainulzag">{literal}{{/literal}&nbsp;сайт&nbsp;{literal}}{/literal}</font>
			<ul  class="mainul">
				{section name=i loop=$menu.site}
				<li>
				<a href="admin.php?mode=site&item={$menu.site[i].item}">
					{$menu.site[i].name}
				</a>
				</li>
				{/section}
			</ul>
		</td>
				<td width="100px"></td>
		{/if}
				<td valign=top>
			<font class="mainulzag">{literal}{{/literal}&nbsp;разделы&nbsp;{literal}}{/literal}</font>
			<ul  class="mainul">
				{section name=i loop=$main.sections}
				<li>
				<a href="admin.php?mode=sections&item={$main.sections[i].item}">
					{$main.sections[i].name}
				</a>
				</li>
				{/section}
				
			</ul>
		</td>
			<td width="100px"></td>
				<td valign=top>
			<font class="mainulzag">{literal}{{/literal}&nbsp;блоки&nbsp;{literal}}{/literal}</font>
			<ul  class="mainul">
				{section name=i loop=$blocks}
				<li>
				<a href="{$blocks[i].link}">
					{$blocks[i].caption}
				</a>
				</li>
				{/section}
			</ul>
		</td>
		<td width="100px"></td>
		<td valign=top>
			<font class="mainulzag">{literal}{{/literal}&nbsp;дополнительно&nbsp;{literal}}{/literal}</font>
			<ul  class="mainul">
				{section name=i loop=$main.structures}
				<li>
				<a  href="admin.php?mode=structures&item={$main.structures[i].item}">
					{$main.structures[i].name}
				</a>
				</li>
				{/section}
			</ul>
		</td>
	

	</tr>
</table>

</div>
{literal}<script type="text/javascript">
Sortable.create('main_sections',{tag:'table',constraint:'horizontal',onUpdate: setsectionssort});
</script>{/literal}
{/if}


</td>
</tr>
</table>
</div>
</div>
{else}
<a href="http://wiki.a-cms.ru" title="Руководство" target="_blank" style="float:right;margin-right:5px;margin-top:-2px;"><img width="24" height="24" src="/templates/admin/images/icons/help.gif" alt="Руководство"></a>
<div align="center" style="margin-top:10%">
<div style="width:600px" align="left">
<h1>Новый сайт</h1>
{if $errors.doubleid}<div class="warning">Указанный идентификатор уже используется!</div>{/if}
{if $errors.doubledomain}<div class="warning">Сайт с указанным доменом уже создан в системе!</div>{/if}
<div align="left" style="border: 1px solid #C5D6DA;padding:10px;margin-top:10px;margin-right:3px;">
<form name="adddomainform" method="post" onsubmit="return domain_form(this)" enctype="multipart/form-data">
<p>Идентификатор:</p>
<p>{editbox name="name" width="30%" text=$form.name}</p>
<p style="margin-top:5px">Домен:</p>
<p>{editbox name="domain" width="60%" text=$form.domain}</p>
<p style="margin-top:5px">Название:</p>
<p>{editbox name="caption" width="60%"}</p>
<p style="margin-top:5px">Файл готового сайта:</p>
<p><input type="file" name="configarch" style="width:40%"></p>
<p style="margin-top:15px"><label><input type="checkbox" id="torep" name="torep" checked>&nbsp;После создания перейти в репозиторий готовых сайтов</label></p>
<div align="center" style="margin-top:20px">
{submit caption="Создать"}
</div>
{hidden name="action" value="newdomain"}
{hidden name="authcode" value=$system.authcode}
</form>
</div>
</div>
</div>
{/if}

{include file="_mfooter.tpl"}