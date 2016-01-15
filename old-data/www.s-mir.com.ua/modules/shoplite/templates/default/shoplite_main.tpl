{include file="_header.tpl"}

<h1>{$section_name}</h1>

{if $categories}
<ul>
{section name=i loop=$categories}
<li><a href="{$categories[i].link}">{$categories[i].name} ({$categories[i].citems})</a></li>
{/section}
</ul>
{/if}

{include file="_footer.tpl"}