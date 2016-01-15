{if $banner.type=="image"}
<a href="{$banner.link}" target="{$banner.target}" title="{$banner.name}">
<img src="/{$banner.filepath}" alt="{$banner.name}" width="{$banner.width}" height="{$banner.height}"/>
</a>
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