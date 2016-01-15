<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:05
         compiled from _header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', '_header.tpl', 50, false),array('function', 'popup', '_header.tpl', 101, false),array('modifier', 'date_format', '_header.tpl', 69, false),array('modifier', 'regex_replace', '_header.tpl', 69, false),array('modifier', 'truncate', '_header.tpl', 190, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $this->_tpl_vars['caption']; ?>
 - Панель управления Astra.CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/templates/admin/style<?php if (strpos ( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' ) !== false): ?>_ie<?php elseif (strpos ( $_SERVER['HTTP_USER_AGENT'] , 'Opera' ) !== false): ?>_opera<?php else: ?>_firefox<?php endif; ?>.css?<?php echo $this->_tpl_vars['options']['version']; ?>
" type="text/css">
<link rel="stylesheet" href="/templates/admin/windows/default.css" type="text/css">
<link rel="stylesheet" href="/templates/admin/windows/alphacube.css" type="text/css">
<link rel="stylesheet" href="/templates/admin/windows/alert.css" type="text/css">
<script type="text/javascript" src="/system/jsaculous/prototype.js"></script>
<script type="text/javascript" src="/system/jsaculous/scriptaculous.js?load=effects,controls,dragdrop"></script>
<script type="text/javascript" src="/system/jsaculous/window.js"></script>
<script type="text/javascript" src="/system/jsaculous/dateselect.js"></script>
<script type="text/javascript" src="/system/jsaculous/tree.js"></script>
<script type="text/javascript" src="/system/jsaculous/sselect.js"></script>
<script type="text/javascript" src="/system/jsoverlib/overlib.js"></script>
<script type="text/javascript" src="/system/jsoverlib/overlib_hideform.js"></script>
<script type="text/javascript" src="/system/jscodemirror/codemirror.js"></script>
<script type="text/javascript" src="/system/jshttprequest/jshttprequest.js"></script>
<?php echo $this->_tpl_vars['jscripts']; ?>
<script type="text/javascript">runLoading();</script>

</head>
<body >
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="15" align="left" width="100%" class="hline">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>

<td width="80" height="45px" align="center"><a class="cp_link_headding" href="http://whiteweb.com.ua" target="_blank"><img style="margin-left:20px;"src="/templates/admin/images/whiteweb.png"></a></td>
<td width="25"><?php if ($this->_tpl_vars['activate']): ?><img style="margin-left:35px;" src="/templates/admin/images/site_active_ok.png"  /><?php else: ?><a href="http://a-cms.ru" title="Сайт неактивирован" target="_blank"><img style="margin-left:35px;" src="/templates/admin/images/site_active_no.png"  /></a><?php endif; ?></td>
<td valign="middle"><div class="gray"><a style="margin-left:5px;" class="cp_link_headding" href="http://<?php echo $this->_tpl_vars['domain']; ?>
" target="_blank"><?php echo $this->_tpl_vars['domain']; ?>
<?php if ($this->_tpl_vars['site_name']): ?> - <?php echo $this->_tpl_vars['site_name']; ?>
<?php endif; ?></a></div></td>
<td align="right" valign="middle">
<?php if ($this->_tpl_vars['system']['mode'] == 'sections'): ?>
	<a href="<?php if (strpos ( $this->_tpl_vars['system']['sectionlink'] , 'http://' ) === 0): ?><?php echo $this->_tpl_vars['system']['sectionlink']; ?>
<?php else: ?>http://<?php echo $this->_tpl_vars['domain']; ?>
<?php echo $this->_tpl_vars['system']['sectionlink']; ?>
<?php endif; ?>" target="_blank" title="Просмотр на сайте" onmouseover="srcSwitch('explorer','/templates/admin/images/explorer_active.png')" onmouseout="srcSwitch('explorer','/templates/admin/images/explorer.png')"><img id="explorer" src="/templates/admin/images/explorer.png"/></a>
<?php else: ?>
	<a href="http://<?php echo $this->_tpl_vars['domain']; ?>
" target="_blank" title="На главную сайта" onmouseover="srcSwitch('explorer','/templates/admin/images/explorer_active.png')" onmouseout="srcSwitch('explorer','/templates/admin/images/explorer.png')"><img id="explorer" src="/templates/admin/images/explorer.png"/></a>
<?php endif; ?>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<a href="?mode=rep&item=extensions" title="Репозиторий"><img src="/templates/admin/images/mode_off.png"  onmouseout="this.src='/templates/admin/images/mode_off.png'" onmouseover="this.src='/templates/admin/images/mode_on.png'"/></a>
<?php endif; ?>
<a onmouseover="srcSwitch('hint','/templates/admin/images/hint_active.png')" onmouseout="srcSwitch('hint','/templates/admin/images/hint.png')" href="http://wiki.a-cms.ru<?php if ($this->_tpl_vars['system']['module']): ?>/modules/<?php echo $this->_tpl_vars['system']['module']; ?>
<?php elseif ($this->_tpl_vars['system']['plugin']): ?>/plugins/<?php echo $this->_tpl_vars['system']['plugin']; ?>
<?php endif; ?>" title="Руководство" target="_blank"><img id="hint" src="/templates/admin/images/hint.png"/></a>


</td>
<td width="140px" align="right" valign="middle">
<form method="post" id="mode_switch" name="mode_switch">
<input id="expert" type="hidden" name="expert" value="<?php if ($this->_tpl_vars['auth']->isExpert()): ?>0<?php else: ?>1<?php endif; ?>"/>

	<?php echo smarty_function_hidden(array('name' => 'mode','value' => 'main'), $this);?>

	<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setexpert'), $this);?>

	<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
	
	<a href="javascript:void();"onClick="
		document.forms.mode_switch.submit(); 
		$( '#mode_switch' ).submit();
	">
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
	<img src="/templates/admin/images/mode_newbie.png"/>
<?php else: ?>
	<img src="/templates/admin/images/mode_pro.png"/>
<?php endif; ?></a>
</td>
<!--
<td width="80" align="center"><a class="cp_link_headding" href="http://a-cms.ru" target="_blank"><b>Astra.CMS</b></a></td>
<td width="25"><?php if ($this->_tpl_vars['activate']): ?><img src="/templates/admin/images/mode_green.gif" width="16" height="16" alt="Лицензия Astra.CMS"><?php else: ?><a href="http://a-cms.ru" title="Сайт неактивирован" target="_blank"><img src="/templates/admin/images/mode_gray.gif" width="16" height="16" alt="Сайт неактивирован"></a><?php endif; ?></td>
<td valign="middle"><div class="gray"><a class="cp_link_headding" href="http://<?php echo $this->_tpl_vars['domain']; ?>
" target="_blank"><?php echo $this->_tpl_vars['domain']; ?>
</a><?php if ($this->_tpl_vars['site_name']): ?> - <?php echo $this->_tpl_vars['site_name']; ?>
<?php endif; ?></div></td>
<td align="right" valign="middle"><?php if ($this->_tpl_vars['lifetime']): ?><span style="font-size:10px"><?php if ($this->_tpl_vars['lifetime'] > time()): ?>Сайт активирован до: <?php echo ((is_array($_tmp=$this->_tpl_vars['lifetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
<?php else: ?>Сайт заблокирован<?php endif; ?></span><?php else: ?>v.<?php echo ((is_array($_tmp=$this->_tpl_vars['options']['version'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/([0-9][0-9])$/", ".\\1") : smarty_modifier_regex_replace($_tmp, "/([0-9][0-9])$/", ".\\1")); ?>
<?php endif; ?>&nbsp;</td>
-->
</tr>
<!-- fix end-->
</table>
</td>
</tr>
<tr>
<td width="100%" height="26" background="/templates/admin/images/tp_but_g.gif" align="left">
<table border="0" bgcolor="#2f2f2f" cellspacing="0" cellpadding="0" width="100%">
<tr height="42px">
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<?php $this->assign('menux', 0); ?>
<?php if ($this->_tpl_vars['menu']['system']): ?>
<?php if ($this->_tpl_vars['system']['mode'] == 'system'): ?>
<td width="66" height="42" valign="bottom" class="tp_link_button0a_3" align="left">

&nbsp;<font color="#8d8d8d"><?php echo '{'; ?>
</font><a href="admin.php?mode=system" class="tp_link_button0_active">Система</a>
</td>
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php else: ?>
<?php ob_start(); ?>
<table width="100%" bgcolor="#2f2f2f" >
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']['system']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=system&item=<?php echo $this->_tpl_vars['menu']['system'][$this->_sections['i']['index']]['item']; ?>
"><?php echo $this->_tpl_vars['menu']['system'][$this->_sections['i']['index']]['name']; ?>
</a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php $this->_smarty_vars['capture']['system_menu'] = ob_get_contents(); ob_end_clean(); ?>
<td width="66" height="42" valign="bottom" class="tp_link_button0a_3" align="left"
<?php echo smarty_function_popup(array('sticky' => true,'text' => $this->_smarty_vars['capture']['system_menu'],'fgcolor' => "#2f2f2f",'border' => '0','bgcolor' => '86BECD','noclose' => true,'fixx' => $this->_tpl_vars['menux']+22,'fixy' => 87), $this);?>
>

&nbsp;<font color="#8d8d8d"><?php echo '{'; ?>
</font><a href="admin.php?mode=system" class="tp_link_button0">Система</a>
</td>

<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php $this->assign('menux', $this->_tpl_vars['menux']+5); ?>

<?php endif; ?>
<?php $this->assign('menux', $this->_tpl_vars['menux']+100); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['menu']['site']): ?>
<?php if ($this->_tpl_vars['system']['mode'] == 'site'): ?>
<?php $this->assign('mode', "Сайт"); ?>
<td width="38" height="26" valign="bottom" class="tp_link_button0a" align="left">

<a href="admin.php?mode=site" class="tp_link_button0_active">Сайт</a>
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
</td>
<?php else: ?>
<?php ob_start(); ?>
<table width="100%" >
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']['site']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=site&item=<?php echo $this->_tpl_vars['menu']['site'][$this->_sections['i']['index']]['item']; ?>
"><?php echo $this->_tpl_vars['menu']['site'][$this->_sections['i']['index']]['name']; ?>
</a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php $this->_smarty_vars['capture']['site_menu'] = ob_get_contents(); ob_end_clean(); ?>
<td width="38" height="26" valign="bottom" class="tp_link_button0a" align="left"
<?php echo smarty_function_popup(array('sticky' => true,'text' => $this->_smarty_vars['capture']['site_menu'],'fgcolor' => "#2f2f2f",'border' => '0','bgcolor' => '86BECD','noclose' => true,'fixx' => $this->_tpl_vars['menux']+9,'fixy' => 87), $this);?>
>

<a href="admin.php?mode=site" class="tp_link_button0">Сайт</a>
</td>

<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php $this->assign('menux', $this->_tpl_vars['menux']+10); ?>

<?php endif; ?>
<?php $this->assign('menux', $this->_tpl_vars['menux']+100); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['menu']['files']): ?>
<?php if ($this->_tpl_vars['system']['mode'] == 'files'): ?>
<?php $this->assign('mode', "Файлы"); ?>
<td width="50" height="26" valign="bottom" class="tp_link_button0a" align="left">

<a <?php if ($this->_tpl_vars['auth']->isAdmin()): ?>href="admin.php?mode=files"<?php endif; ?> class="tp_link_button0_active">Файлы</a>
</td>

<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php else: ?>
<?php ob_start(); ?>
<table width="100%">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']['files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=files&item=<?php echo $this->_tpl_vars['menu']['files'][$this->_sections['i']['index']]['item']; ?>
"><?php echo $this->_tpl_vars['menu']['files'][$this->_sections['i']['index']]['name']; ?>
</a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php $this->_smarty_vars['capture']['site_files'] = ob_get_contents(); ob_end_clean(); ?>
<td width="50" height="26" valign="bottom" class="tp_link_button0a" align="left"
<?php echo smarty_function_popup(array('sticky' => true,'text' => $this->_smarty_vars['capture']['site_files'],'fgcolor' => "#2f2f2f",'border' => '0','bgcolor' => '86BECD','noclose' => true,'fixx' => $this->_tpl_vars['menux']-40,'fixy' => 87), $this);?>
>

<a <?php if ($this->_tpl_vars['auth']->isAdmin()): ?>href="admin.php?mode=files"<?php endif; ?> class="tp_link_button0">Файлы</a>
</td>

<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php $this->assign('menux', $this->_tpl_vars['menux']+10); ?>

<?php endif; ?>
<?php $this->assign('menux', $this->_tpl_vars['menux']+95); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['menu']['sections']): ?>
<?php if ($this->_tpl_vars['system']['mode'] == 'sections'): ?>
<?php $this->assign('mode', "Разделы"); ?>

<td width="60" height="26" valign="bottom" class="tp_link_button0a" align="left">

<a href="admin.php?mode=sections" class="tp_link_button0_active">Разделы</a>
</td>
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php else: ?>
<?php ob_start(); ?>
<table width="100%">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']['sections']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=sections&item=<?php echo $this->_tpl_vars['menu']['sections'][$this->_sections['i']['index']]['item']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menu']['sections'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php $this->_smarty_vars['capture']['site_sections'] = ob_get_contents(); ob_end_clean(); ?>
<td width="60" height="26" valign="bottom" class="tp_link_button0a" align="left"
<?php echo smarty_function_popup(array('sticky' => true,'text' => $this->_smarty_vars['capture']['site_sections'],'fgcolor' => "#2f2f2f",'border' => '0','bgcolor' => '86BECD','noclose' => true,'fixx' => $this->_tpl_vars['menux']-68,'fixy' => 87), $this);?>
>

<a href="admin.php?mode=sections" class="tp_link_button0">Разделы</a>
</td>
<?php if ($this->_tpl_vars['system']['mode'] != 'plugins'): ?>
<td width="3" height="26" valign="bottom" class="tp_link_button1">|</td>
<?php $this->assign('menux', $this->_tpl_vars['menux']+10); ?>
<?php endif; ?>
<?php endif; ?>
<?php $this->assign('menux', $this->_tpl_vars['menux']+100); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['menu']['structures']): ?>
<?php if ($this->_tpl_vars['system']['mode'] == 'structures'): ?>
<?php $this->assign('mode', "Дополнения"); ?>
<td width="85" height="26" valign="bottom" class="tp_link_button0a" align="left">

&nbsp;<a href="admin.php?mode=structures" class="tp_link_button0_active">Дополнения</a>
</td>
<td width="10" height="26" valign="bottom" class="tp_link_button1" style="padding-left:12px;"><font color="#8d8d8d"><?php echo '}'; ?>
</font></td>
<?php else: ?>
<?php ob_start(); ?>
<table width="100%">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']['structures']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
<td width="9"></td>
<td><a class="cp_link_headding" href="admin.php?mode=structures&item=<?php echo $this->_tpl_vars['menu']['structures'][$this->_sections['i']['index']]['item']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menu']['structures'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php $this->_smarty_vars['capture']['site_structures'] = ob_get_contents(); ob_end_clean(); ?>
<td width="85" height="26" valign="bottom" class="tp_link_button0a" align="left"
<?php echo smarty_function_popup(array('sticky' => true,'text' => $this->_smarty_vars['capture']['site_structures'],'fgcolor' => "#2f2f2f",'border' => '0','bgcolor' => '86BECD','noclose' => true,'fixx' => $this->_tpl_vars['menux']-84,'fixy' => 87), $this);?>
>

&nbsp;<a href="admin.php?mode=structures" class="tp_link_button0">Дополнения</a>
</td>
<td width="10" height="26" valign="bottom" class="tp_link_button1" style="padding-left:12px;"><font color="#8d8d8d"><?php echo '}'; ?>
</font></td>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<td>&nbsp;</td>
<td width="160" align="right" nowrap><font class="ujoin">Вы вошли как </font><font class="authname"><?php echo $this->_tpl_vars['auth']->data['name']; ?>
</font>&nbsp;&nbsp;&nbsp;</td>

<td width="10" height="26" valign="bottom" class="tp_link_button1_2">&nbsp;|</td>
<td width="60" height="26" valign="bottom" class="tp_link_button0a_2" align="center"><a href="admin.php?mode=auth&authcode=<?php echo $this->_tpl_vars['system']['authcode']; ?>
&action=logout" class="tp_link_button0_exit">Выйти</a>&nbsp;&nbsp;&nbsp;<img src="/templates/admin/images/arrow_exit.png"/></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table width="100%" cellspacing="0" border=0 height="100%">
<tr>
<td height="87px" colspan=2>
<center><?php if ($this->_tpl_vars['mode']): ?><font class="zag0"><?php echo $this->_tpl_vars['mode']; ?>
</font><font class="zag1" style="font-size:26px;padding:0 6px 0 6px;">/</font><?php endif; ?><font class="zag"><?php echo $this->_tpl_vars['caption']; ?>
</font>&nbsp;&nbsp;&nbsp;
		<a href="/admin.php" onmouseover="srcSwitch('house','/templates/admin/images/house_active.png')" onmouseout="srcSwitch('house','/templates/admin/images/house.png')"><img id="house" src="/templates/admin/images/house.png" alt="Обзор панели управления" <?php echo smarty_function_popup(array('text' => '<font class="nav_button">&nbsp;Обзор панели управления</font>','fgcolor' => "#2f2f2f",'caption' => "",'noclose' => true,'sticky' => false,'bgcolor' => '2f2f2f','width' => 185), $this);?>
></a>
		&nbsp;
		<?php if ($this->_tpl_vars['topageslink'] && $this->_tpl_vars['auth']->isExpert()): ?>
			<a href="<?php echo $this->_tpl_vars['topageslink']; ?>
" onmouseover="srcSwitch('to_tpl','/templates/admin/images/to_tpl_active.png')" onmouseout="srcSwitch('to_tpl','/templates/admin/images/to_tpl.png')"><img id="to_tpl" src="/templates/admin/images/to_tpl.png" alt="Обзор панели управления" <?php echo smarty_function_popup(array('text' => '<font class="nav_button">&nbsp;Шаблоны раздела</font>','fgcolor' => "#2f2f2f",'caption' => "",'noclose' => true,'sticky' => false,'bgcolor' => '2f2f2f','width' => 135), $this);?>
></a>
		&nbsp;
		<?php endif; ?>
		<?php if ($this->_tpl_vars['itemstatistic']): ?>
		<a href="/admin.php?mode=<?php echo $_GET['mode']; ?>
" onmouseover="srcSwitch('stat','/templates/admin/images/stat_active.png')" onmouseout="srcSwitch('stat','/templates/admin/images/eco.png')">
			<img id="stat" src="/templates/admin/images/eco.png" alt=" статистика " <?php echo smarty_function_popup(array('text' => $this->_tpl_vars['itemstatistic'],'fgcolor' => "#2f2f2f",'caption' => "&nbsp;&nbsp;&#123; статистика &#125;",'noclose' => true,'sticky' => false,'bgcolor' => '2f2f2f','width' => 200), $this);?>
>
		</a>
		<?php endif; ?>
</center>
</td>
</tr>
<tr >
<td width="195" valign="top" style="border:20px solid #f2f2f2;border-bottom:40px solid #f2f2f2;border-top:15px solid #f2f2f2;" >
<?php if (strpos ( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' ) !== false): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_leftpanel_ie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_leftpanel.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</td>
<td valign="top" style="padding: 0 ;border:20px solid #f2f2f2;border-left:0px solid #f2f2f2;border-bottom:40px solid #f2f2f2; " class="mainbody">

<table width="100%"  border="0" id="padding" style="padding: 0 ;"cellspacing="0" cellpadding="0"  height="100%" bgcolor="#FFFFFF">

<tr >

<td valign="top" height="100%"  width="100%" >
<?php if ($this->_tpl_vars['iconeditors']): ?>
<div class="box">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['iconeditors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<img src="<?php echo $this->_tpl_vars['iconeditors'][$this->_sections['i']['index']]['ico']; ?>
" width="16" height="16" border="0" alt="<?php echo $this->_tpl_vars['iconeditors'][$this->_sections['i']['index']]['caption']; ?>
" style="vertical-align:middle">&nbsp;<a class="cp_link_headding" href="<?php echo $this->_tpl_vars['iconeditors'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['iconeditors'][$this->_sections['i']['index']]['caption']; ?>
</a><?php if (! $this->_sections['i']['last']): ?>&nbsp;&nbsp; &nbsp;&nbsp;<?php endif; ?>
<?php endfor; endif; ?>
</div>
<?php endif; ?>
<?php echo '
<script>
function srcSwitch(id,src) {
   document.getElementById(id).src=src;
}
</script>
'; ?>