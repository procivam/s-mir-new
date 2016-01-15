
<ul class="topmen">
{section name=i loop=$links}
{if $links[i].selected && $smarty.section.i.last}
	<li><a href="{$links[i].link}" class="active last">{$links[i].name}</a></li>
{elseif $links[i].selected}
	<li><a href="{$links[i].link}" class="active">{$links[i].name}</a></li>
{elseif $smarty.section.i.last}
	<li><a href="{$links[i].link}" class="last">{$links[i].name}</a></li>

{else}
	<li><a href="{$links[i].link}">{$links[i].name}</a></li>
{/if}
{/section}
</ul>