{if $banner.type=="image"}
{if $parent.type=="1"}
	<td><a href="{$banner.link}" target="{$banner.target}" title="{$banner.name}"><img src="/{$banner.filepath}" alt="{$banner.name}" width="{$banner.width}" height="{$banner.height}"/></a></td>
    <td><p class="bannazv1">{$banner.name}</p>
    {$banner.text}
    </td>
{elseif $parent.type=="2"}
	<td class="ban2">&nbsp;</td>
	<td><a href="{$banner.link}" target="{$banner.target}" title="{$banner.name}"><img src="/{$banner.filepath}" alt="{$banner.name}" width="{$banner.width}" height="{$banner.height}"/></a></td>
    <td>
    <p class="bannazv2">{$banner.name}</p>
   {$banner.text}
    </td>
{elseif $parent.type=="3"}
	<td class="ban3">&nbsp;</td>
	<td><a href="{$banner.link}" target="{$banner.target}" title="{$banner.name}"><img src="/{$banner.filepath}" alt="{$banner.name}" width="{$banner.width}" height="{$banner.height}"/></a></td>
    <td><p class="bannazv2">{$banner.name}</p>
   {$banner.text}
    </td>
{/if}
{elseif $banner.type=="flash"}
<object width={$banner.width} height={$banner.height}>
<param name=movie value="/{$banner.filepath}"/>
<param name=quality value=high/>
<param name=menu value=false/>
<embed src="/{$banner.filepath}" quality="high" type="application/x-shockwave-flash" width={$banner.width} height={$banner.height}/>
</object>
{elseif $banner.url}
<a href="{$banner.link}" target="{$banner.target}">{$banner.name}</a>
{else}
{$banner.text}
{/if}