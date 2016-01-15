<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:05
         compiled from _footer.tpl */ ?>

</td>

</tr>
<tr height="400px" id="tr2" style="background-color:#f2f2f2;">
<td >&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr style="background-color:#f2f2f2;">

</tr>
</table>
<div id="debugbox"><?php echo $this->_tpl_vars['debugdata']; ?>
</div>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script type="text/javascript">
addEvent(window,'load',endLoading, false);
window.name='mainadmin';
</script>
<script>
<?php if ($this->_tpl_vars['system']['module'] == 'sitemap' || $this->_tpl_vars['system']['module'] == 'archive'): ?>
 tr2.style.display="none";
<?php elseif ($this->_tpl_vars['system']['mode'] == 'files'): ?>
	padding.style.padding = "15px";
	 tr2.style.display="none";
<?php elseif ($this->_tpl_vars['system']['mode'] == 'site'): ?>
	padding.style.padding = "15px";
	 tr2.style.display="none";
<?php elseif ($_GET['mode'] == 'system' && $_GET['item'] != 'extensions'): ?>
	padding.style.padding = "15px";
	 tr2.style.display="none";
<?php endif; ?>
</script>
<?php echo '
<script type="text/javascript">

tab = document.getElementById(\'tabcontent_page\');
if(tab)
{
	tabcontent_opt.style.padding = "0px 15px 15px 15px";
}
</script>
'; ?>

</body>
</html>