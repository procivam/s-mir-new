{if $system.mode=='sections' || $system.mode=='structures' || $auth->isExpert()}
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td width="5" height="5"></td>
<td width="190" ></td>
<td width="5" height="5"></td>
</tr>
<tr>
<td valign="top" width="5" ></td>
<td width="190" valign="top" align="center">
<div align="center" style=" margin-top:5;margin-bottom:5;"><font style="font-size:23px !important;font-family: arial;font-weight:regular;" color="da0866">{literal}{{/literal} управление {literal}}{/literal}</font></div>
<center>
<div id="leftmenubox">
<Br/>
{$kk++}
{foreach from=$leftmenu item=menuitem}
<table {if $menuitem.id} id="leftmenuitem_{$menuitem.id}"{/if} width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#DAEBF0" style="margin-bottom:3">
<tr>

<td  bgcolor="#ffffff" nowrap >
<ul class="left_m">

{if $menuitem.item==$system.item}
<li><img class="bgimg_act" src="/templates/admin/images/bg_l_menu_act.png"><a class="cp_link_headding_leftmenu lact" href="admin.php?mode={$system.mode}&item={$menuitem.item}" title="{$menuitem.name}">{$menuitem.name|truncate:18:"...":true}</a></li>
{else}
<li  id="{$kk}"onmouseover="iefix(this.id,0)"  onmouseout="iefix(this.id,1)" ><img id="iefix{$kk++}" class="bgimg" src="/templates/admin/images/bg_l_menu_act.png"><a class="cp_link_headding_leftmenu" href="admin.php?mode={$system.mode}&item={$menuitem.item}" title="{$menuitem.name}">{$menuitem.name|truncate:18:"...":true}</a></li>
{/if}
</ul>
</td>
</tr>
</table>
{/foreach}
</div>
{if $system.mode=='sections'}
{literal}<script type="text/javascript">
Sortable.create('leftmenubox',{tag:'table',onUpdate: setsectionssort});
</script>{/literal}
{elseif $system.mode=='structures'}
{literal}<script type="text/javascript">
Sortable.create('leftmenubox',{tag:'table',onUpdate: setstructuressort});
</script>{/literal}
{/if}
</center>
</td>
<td valign="top" width="5" ><img src="/templates/admin/images/spacer00.gif" width="1" height="1" border="0"></td>
</tr>
<tr>
<td width="5" height="5"><img src="/templates/admin/images/rp_corng.gif" width="5" height="5" border="0" alt=""></td>
<td width="190" ></td>
<td width="5" height="5"><img src="/templates/admin/images/rp_cornh.gif" width="5" height="5" border="0" alt=""></td>
</tr>
</table>
{/if}
{literal}
<script>
function iefix(id,type)
{
x = document.getElementById('iefix'+id);
if (type==0)
	x.className='bgimg_iefix';
else
	x.className='bgimg';

};

</script>
{/literal}
