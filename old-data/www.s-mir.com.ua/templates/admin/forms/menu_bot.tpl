{if $auth->IsLogin()}
{section name=i loop=$links}
{if $links[i].selected}
<a href="{$links[i].link}"><b>{$links[i].name}</b></a>{if !$smarty.section.i.last}&nbsp;|&nbsp;{/if}
{else}
<a href="{$links[i].link}">{$links[i].name}</a>{if !$smarty.section.i.last}&nbsp;|&nbsp;{/if}
{/if}
{/section}
{/if}