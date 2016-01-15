
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
<div id="debugbox">{$debugdata}</div>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script type="text/javascript">
addEvent(window,'load',endLoading, false);
window.name='mainadmin';
</script>
<script>
{if $system.module=="sitemap" || $system.module=="archive"}
 tr2.style.display="none";
{elseif $system.mode=="files"}
	padding.style.padding = "15px";
	 tr2.style.display="none";
{elseif $system.mode=="site"}
	padding.style.padding = "15px";
	 tr2.style.display="none";
{elseif $smarty.get.mode=="system" && $smarty.get.item!="extensions"}
	padding.style.padding = "15px";
	 tr2.style.display="none";
{/if}
</script>
{literal}
<script type="text/javascript">

tab = document.getElementById('tabcontent_page');
if(tab)
{
	tabcontent_opt.style.padding = "0px 15px 15px 15px";
}
</script>
{/literal}
</body>
</html>