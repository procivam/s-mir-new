{capture name=help}
<li type='square'>Здесь представлена базовая статистика по каждой из существующих структур.</li>
{/capture}
{include file="_header.tpl"} 

{section name=i loop=$statistics}
<h3>{$statistics[i].name}:</h3>
<div class="box">
{$statistics[i].block->getContent()}
</div>
{/section}

{include file="_footer.tpl"} 