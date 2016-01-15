
<ul class="page">
    <li class="ots"><a href="{$prevlink}" class="but3">Предыдущая</a></li>
  {section name=i loop=$pagelinks}
	{if $pagelinks[i].selected}
		<li class="active"><a href="{$pagelinks[i].link}">{$pagelinks[i].name}</a></li>
	{else}
		<li ><a href="{$pagelinks[i].link}">{$pagelinks[i].name}</a></li>
	{/if}
  {/section}
    <li class="ots2"><a href="{$nextlink}" class="but3">Следующая</a></li>
    <li class="nobg"><a href="?rows=999" class="but4">[Все]</a></li>
 </ul>