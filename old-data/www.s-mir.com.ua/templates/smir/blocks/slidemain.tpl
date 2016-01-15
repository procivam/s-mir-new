
<div id="mycarousel" class="jcarousel-skin-tango">
<ul>
{section name=i loop=$items}
	<li>
        	<div class="slidetext">
            	<p class="p_slide1">{$items[i].category}</p>
                <p class="p_slide2">{$items[i].name}</p>
               {$items[i].description}
                <p class="p_slide3"><b>{$valute}</b><span>{$items[i].price}.- </span></p>
            </div>

			{imagedata var="img" id=$items[i].mainfoto}
        	<a href="{$items[i].link}"><img src="{$img.path}" /></a>
        </li>
{/section}
</ul>
<input type="hidden" name="col" class="coll" value="0" />
<!--   <a href="#" id="mycarousel-next" class="jcarousel-next-horizontal"></a>
     <a href="#" id="mycarousel-prev" class="jcarousel-prev-horizontal"></a>
-->
    <div class="jcarousel-control">
	{assign var="k" value=0}
	{section name=i loop=$items}
	{assign var="k" value=$k+1}
		<a href="{$items[i].link}" class="kl{$k} {if $smarty.section.i.first}active{/if}" ><span>{$k}</span></a>
	{/section}
    </div>
</div>    