<table width="100%" border="1">
 <tr>
{assign var="k" value=0}
{assign var="kk" value=0}
{section name=i loop=$categories}
{imagedata var="img" id=$categories[i].foto}
{assign var="k" value=$k+1}
{assign var="kk" value=$kk+1}

	<td class="tdblock">
        <div class="block" rel="{$system.tpldir}/img/fonkv{$kk}.jpg">
           <a href="{$categories[i].link}"><img src="/imgsize4.php?filename={$img.path}&width={$img.width}&height={$img.height}" /><p>{$categories[i].name}</p></a>
        </div>
    </td>
		{if $kk=="4"}
  {assign var="kk" value=0}
{/if}
	{if $k=="5"}
  </tr>
  <tr>
  {assign var="k" value=0}
{/if}
{/section}
</tr>
</table>