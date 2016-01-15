<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Панель управления Astra.CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/templates/admin/style{if strpos($smarty.server.HTTP_USER_AGENT,"MSIE")!==false}_ie{elseif strpos($smarty.server.HTTP_USER_AGENT,"Opera")!==false}_opera{else}_firefox{/if}.css?{$options.version}" type="text/css">
<link rel="stylesheet" href="/templates/admin/windows/default.css" type="text/css">
<link rel="stylesheet" href="/templates/admin/windows/alphacube.css" type="text/css">
<link rel="stylesheet" href="/templates/admin/windows/alert.css" type="text/css">
<script type="text/javascript" src="/system/jsaculous/prototype.js"></script>
<script type="text/javascript" src="/system/jsaculous/scriptaculous.js?load=effects,controls,dragdrop"></script>
<script type="text/javascript" src="/system/jsaculous/window.js"></script>
<script type="text/javascript" src="/system/jsaculous/dateselect.js"></script>
<script type="text/javascript" src="/system/jsaculous/sselect.js"></script>
<script type="text/javascript" src="/system/jsoverlib/overlib.js"></script>
<script type="text/javascript" src="/system/jsoverlib/overlib_hideform.js"></script>
<script type="text/javascript" src="/system/jscodemirror/codemirror.js"></script>
<script type="text/javascript" src="/system/jshttprequest/jshttprequest.js"></script>
{$jscripts}<script type="text/javascript">runLoading();</script>
</head>
<!-- fix start-->

<body>

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="15" align="left" width="100%" class="hline">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="80" height="45px" align="center"><a class="cp_link_headding" href="http://whiteweb.com.ua" target="_blank"><img style="margin-left:20px;"src="/templates/admin/images/whiteweb.png"></a></td>
<td width="25">{if $activate}<img style="margin-left:35px;" src="/templates/admin/images/site_active_ok.png"  />{else}<a href="http://a-cms.ru" title="Сайт неактивирован" target="_blank"><img style="margin-left:35px;" src="/templates/admin/images/site_active_no.png"  /></a>{/if}</td>
<td valign="middle"><div class="gray"><a style="margin-left:5px;" class="cp_link_headding" href="http://{$domain}" target="_blank">{$domain}{if $site_name} - {$site_name}{/if}</a></div></td>
<td align="right" valign="middle">
{if $system.mode=='sections'}
	<a href="{if strpos($system.sectionlink,'http://')===0}{$system.sectionlink}{else}http://{$domain}{$system.sectionlink}{/if}" target="_blank" title="Просмотр на сайте" onmouseover="srcSwitch('explorer','/templates/admin/images/explorer_active.png')" onmouseout="srcSwitch('explorer','/templates/admin/images/explorer.png')"><img id="explorer" src="/templates/admin/images/explorer.png"/></a>
{else}
	<a href="http://{$domain}" target="_blank" title="На главную сайта" onmouseover="srcSwitch('explorer','/templates/admin/images/explorer_active.png')" onmouseout="srcSwitch('explorer','/templates/admin/images/explorer.png')"><img id="explorer" src="/templates/admin/images/explorer.png"/></a>
{/if}
{if $auth->isExpert()}
<a href="?mode=rep&item=extensions" title="Репозиторий"><img src="/templates/admin/images/mode_off.png" onmouseout="this.src='/templates/admin/images/mode_off.png'" onmouseover="this.src='/templates/admin/images/mode_on.png'"/></a>
{/if}
<a onmouseover="srcSwitch('hint','/templates/admin/images/hint_active.png')" onmouseout="srcSwitch('hint','/templates/admin/images/hint.png')" href="http://wiki.a-cms.ru{if $system.module}/modules/{$system.module}{elseif $system.plugin}/plugins/{$system.plugin}{/if}" title="Руководство" target="_blank"><img id="hint" src="/templates/admin/images/hint.png"/></a>


</td>
<td width="140px" align="right" valign="middle">
<form method="post" id="mode_switch" name="mode_switch">
<input id="expert" type="hidden" name="expert" value="{if $auth->isExpert()}0{else}1{/if}"/>

	{hidden name="mode" value="main"}
	{hidden name="action" value="setexpert"}
	{hidden name="authcode" value=$system.authcode}
</form>
	
	<a href="javascript:void();"onClick="
		document.forms.mode_switch.submit(); 
		$( '#mode_switch' ).submit();
	">
{if $auth->isExpert()}
	<img src="/templates/admin/images/mode_newbie.png"/>
{else}
	<img src="/templates/admin/images/mode_pro.png"/>
{/if}</a>
</td>
<!--
<td width="80" align="center"><a class="cp_link_headding" href="http://a-cms.ru" target="_blank"><b>Astra.CMS</b></a></td>
<td width="25">{if $activate}<img src="/templates/admin/images/mode_green.gif" width="16" height="16" alt="Лицензия Astra.CMS">{else}<a href="http://a-cms.ru" title="Сайт неактивирован" target="_blank"><img src="/templates/admin/images/mode_gray.gif" width="16" height="16" alt="Сайт неактивирован"></a>{/if}</td>
<td valign="middle"><div class="gray"><a class="cp_link_headding" href="http://{$domain}" target="_blank">{$domain}</a>{if $site_name} - {$site_name}{/if}</div></td>
<td align="right" valign="middle">{if $lifetime}<span style="font-size:10px">{if $lifetime>$smarty.now}Сайт активирован до: {$lifetime|date_format:"%d.%m.%Y"}{else}Сайт заблокирован{/if}</span>{else}v.{$options.version|regex_replace:"/([0-9][0-9])$/":".\\1"}{/if}&nbsp;</td>
-->
</tr>
<!-- fix end-->
</table>
</td>
</tr>
<tr >
<td width="100%" height="26" align="left">
<table border="0" bgcolor="#2f2f2f"  cellspacing="0" cellpadding="0" width="100%">
<tr height="42px">
{if $auth->isExpert()}
{assign var="menux" value=0}
{if $menu.system}
{if $system.mode=="system"}
<td width="100" height="26" class="tp_link_button" bgcolor="#ffffff" valign="bottom" align="left">
<img width="16" height="16" src="/templates/admin/images/icons/main_system.gif" style="float:left;margin-left:5px;">
&nbsp;Система
</td>
{else}
{capture name=system_menu}
<table width="100%" bgcolor="#2f2f2f" >
{section name=i loop=$menu.system}
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=system&item={$menu.system[i].item}">{$menu.system[i].name}</a></td>
</tr>
{/section}
</table>
{/capture}
<td width="66" height="42" valign="bottom" class="tp_link_button0a_3" align="left"
{popup sticky=true text=$smarty.capture.system_menu fgcolor="#2f2f2f" border="0" bgcolor="86BECD" noclose=true fixx=$menux+22 fixy=87}>

&nbsp;<font color="#8d8d8d">{literal}{{/literal}</font><a href="admin.php?mode=system" class="tp_link_button0">Система</a>
</td>
{if $system.mode!="site"}
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
{assign var="menux" value=$menux+5}
{/if}
{/if}
{assign var="menux" value=$menux+100}
{/if}
{if $menu.site}
{if $system.mode=="site"}
<td width="100" height="26" class="tp_link_button" bgcolor="#ffffff" valign="bottom" align="left">
<img width="16" height="16" src="/templates/admin/images/icons/main_site.gif" style="float:left;margin-left:5px;">
&nbsp;Сайт
</td>
{else}
{capture name=site_menu}
<table width="100%" >
{section name=i loop=$menu.site}
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=site&item={$menu.site[i].item}">{$menu.site[i].name}</a></td>
</tr>
{/section}
</table>
{/capture}
<td width="38" height="26" valign="bottom" class="tp_link_button0a" align="left"
{popup sticky=true text=$smarty.capture.site_menu fgcolor="#2f2f2f" border="0" bgcolor="86BECD" noclose=true fixx=$menux+5 fixy=87}>

<a href="admin.php?mode=site" class="tp_link_button0">Сайт</a>
</td>
{if $system.mode!="files"}
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
{assign var="menux" value=$menux+10}
{/if}
{/if}
{assign var="menux" value=$menux+100}
{/if}
{if $menu.files}
{if $system.mode=="files"}
<td width="100" height="26" class="tp_link_button" bgcolor="#ffffff" valign="bottom" align="left">
<img width="16" height="16" src="/templates/admin/images/icons/main_files.gif" style="float:left;margin-left:5px;">
&nbsp;Файлы
</td>
{else}
{capture name=site_files}
<table width="100%">
{section name=i loop=$menu.files}
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=files&item={$menu.files[i].item}">{$menu.files[i].name}</a></td>
</tr>
{/section}
</table>
{/capture}
<td width="50" height="26" valign="bottom" class="tp_link_button0a" align="left"
{popup sticky=true text=$smarty.capture.site_files fgcolor="#2f2f2f" border="0" bgcolor="86BECD" noclose=true fixx=$menux-44 fixy=87}>

<a {if $auth->isAdmin()}href="admin.php?mode=files"{/if} class="tp_link_button0">Файлы</a>
</td>
{if $system.mode!="sections"}
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
{assign var="menux" value=$menux+10}
{/if}
{/if}
{assign var="menux" value=$menux+95}
{/if}
{if $menu.sections}
{if $system.mode=="sections"}
<td width="100" height="26" class="tp_link_button" bgcolor="#ffffff" valign="bottom" align="left">

&nbsp;<a href="admin.php?mode=sections" class="cp_link_headding">Разделы</a>
</td>
{else}
{capture name=site_sections}
<table width="100%">
{section name=i loop=$menu.sections}
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=sections&item={$menu.sections[i].item}">{$menu.sections[i].name|truncate:25:"...":true}</a></td>
</tr>
{/section}
</table>
{/capture}
<td width="60" height="26" valign="bottom" class="tp_link_button0a" align="left"
{popup sticky=true text=$smarty.capture.site_sections fgcolor="#2f2f2f" border="0" bgcolor="86BECD" noclose=true fixx=$menux-72 fixy=87}>

<a href="admin.php?mode=sections" class="tp_link_button0">Разделы</a>
</td>
{if $system.mode!="plugins"}
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
{assign var="menux" value=$menux+10}
{/if}
{/if}
{assign var="menux" value=$menux+100}
{/if}
{if $menu.structures}
{if $system.mode=="structures"}
<td width="110" height="26" class="tp_link_button" bgcolor="#ffffff" valign="bottom" align="left">
<img width="16" height="16" src="/templates/admin/images/icons/main_structures.gif" style="float:left;margin-left:5px;">
&nbsp;<a href="admin.php?mode=structures" class="cp_link_headding">Дополнения</a>
</td>
{else}
{capture name=site_structures}
<table width="100%">
{section name=i loop=$menu.structures}
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=structures&item={$menu.structures[i].item}">{$menu.structures[i].name|truncate:25:"...":true}</a></td>
</tr>
{/section}
</table>
{/capture}
<td width="85" height="26" valign="bottom" class="tp_link_button0a" align="left"
{popup sticky=true text=$smarty.capture.site_structures fgcolor="#2f2f2f" border="0" bgcolor="86BECD" noclose=true fixx=$menux-94 fixy=87}>

&nbsp;<a href="admin.php?mode=structures" class="tp_link_button0">Дополнения</a>
</td>
<td width="10" height="26" valign="bottom" class="tp_link_button1" style="padding-left:12px;"><font color="#8d8d8d">{literal}}{/literal}</font></td>
{/if}
{/if}
{/if}
<td>&nbsp;</td>
<td width="160" align="right" nowrap><font class="ujoin">Вы вошли как </font><font class="authname">{$auth->data.name}</font>&nbsp;&nbsp;&nbsp;</td>

<td width="10" height="26" valign="bottom" class="tp_link_button1_2">&nbsp;|</td>
<td width="60" height="26" valign="bottom" class="tp_link_button0a_2" align="center"><a href="admin.php?mode=auth&authcode={$system.authcode}&action=logout" class="tp_link_button0_exit">Выйти</a>&nbsp;&nbsp;&nbsp;<img src="/templates/admin/images/arrow_exit.png"/></td>
</tr>
</table>
</td>
</tr>

<tr height=87><td><center>
{if !$smarty.get.mode}{if $mode}<font class="zag0">{$mode}</font><font class="zag1" style="font-size:26px;padding:0 6px 0 6px;">/</font>{/if}<font class="zagstart">БЫСТРЫЙ СТАРТ</font>&nbsp;&nbsp;&nbsp;
		
		{if $itemstatistic}
		<a href="/admin.php?mode={$smarty.get.mode}"><font onmouseover="test.style.display='none';test2.style.display='';" onmouseout="test.style.display='';test2.style.display='none';">
			<img id="test" src="/templates/admin/images/eco.png" alt=" статистика " {popup text=$itemstatistic fgcolor="#2f2f2f" caption="&nbsp;&nbsp;&#123; статистика &#125;" noclose=true sticky=false bgcolor="2f2f2f" width=200}>
			<img id="test2" style="display:none;" src="/templates/admin/images/stat_active.png" alt=" статистика " {popup text=$itemstatistic fgcolor="#2f2f2f" caption="&nbsp;&nbsp;&#123; статистика &#125;" noclose=true sticky=false bgcolor="2f2f2f" width=200}>
		</font></a>
		{/if}
{else}
<br/>
<font class="zag">РЕПОЗИТОРИЙ&nbsp;
<a href="/admin.php" onmouseover="srcSwitch('house','/templates/admin/images/house_active.png')" onmouseout="srcSwitch('house','/templates/admin/images/house.png')"><img style="position:absolute;margin-top:12px;" id="house" src="/templates/admin/images/house.png" alt="Обзор панели управления" {popup text='<font class="nav_button">&nbsp;Обзор панели управления</font>' fgcolor="#2f2f2f" caption="" noclose=true sticky=false bgcolor="2f2f2f" width=185}></a>
	{if $itemstatistic}
		<a href="/admin.php?mode={$smarty.get.mode}"><font onmouseover="test.style.display='none';test2.style.display='';" onmouseout="test.style.display='';test2.style.display='none';">
			<img id="test" src="/templates/admin/images/eco.png" alt=" статистика " {popup text=$itemstatistic fgcolor="#2f2f2f" caption="&nbsp;&nbsp;&#123; статистика &#125;" noclose=true sticky=false bgcolor="2f2f2f" width=200}>
			<img id="test2" style="display:none;" src="/templates/admin/images/stat_active.png" alt=" статистика " {popup text=$itemstatistic fgcolor="#2f2f2f" caption="&nbsp;&nbsp;&#123; статистика &#125;" noclose=true sticky=false bgcolor="2f2f2f" width=200}>
		</font></a>
		{/if}
		<br/>
{/if}
</center>
</td>
<tr>
<td style="{if !$smarty.get}background-color:#f2f2f2;{/if}">
<!-- fix start-->
<table width="100%" height="100%" style="border:20px solid #f2f2f2;" cellspacing="0" cellpadding="0">

<tr>
<td valign="top" width="5" ></td>
<td valign="top" align="left" style="padding:15px">
<!-- fix end-->


{literal}
<script>
function srcSwitch(id,src) {
   document.getElementById(id).src=src;
}
</script>
{/literal}