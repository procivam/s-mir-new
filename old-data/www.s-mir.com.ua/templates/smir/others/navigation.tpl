
<a href="/">Главная</a><span class="sp16"><i class="strelka"></i></span>
{section name=i loop=$navigation}
{if $navigation[i].link}
<span class="sp17"><a href="{$navigation[i].link}">{$navigation[i].name}</a></span><span class="sp16"><i class="strelka"></i></span>
{else}
 <span class="sp17">{$navigation[i].name}</span>
{/if}
{/section}
    
   




