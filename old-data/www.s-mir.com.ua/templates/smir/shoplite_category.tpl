{include file="_header.tpl"}
<body class="inerfon">
<div class="main">
{include file="order.tpl"}
  <div class="header"><div class="header_inner">
     {include file="logo.tpl"}
         {block id = "search"}
    {block id = "tel"}
	{block id="basketheader"}
        <div class="clearfix"></div>
       {block id ="menu"}

    </div></div>

  <div class="content clearfix">  
    <div class="wrapper">
<div class="left-col">  
{block id ="cat_list"}
</div>
<div class="middle-col">
    <div class="right-col">
<div class="zag clearfix">
    <p class="p1">{$category.name}</p>
    
  {object obj=$navigation}
  
</div>        
<table width="30%" border="0">
  <tr>

  {assign var = "k" value=0}
  {if $filters} 
  
  {assign var = "k" value=$k+1}
    {section name=i loop=$filters}
    <td class="topblok{$k}"><div class="rel"><a href="" class="link"><span>{$filters[i].name}</span></a>
    <br/>
    

  
      {section name=f loop=$filterOn}
        {section name=j loop=$filters[i].value}
          {if $filters[i].value[j]==$filterOn[f]}
            <p><a href="?filterdel={$filters[i].id}&namedel={$filters[i].value[j]}" class="link2"><span>{$filters[i].value[j]}</span></a></p>
          {/if}
        {/section}
      {/section}
  
      
    <div class="window">
      <ul>
      {section name=j loop=$filters[i].value}
        <li><a href="?fname={$filters[i].id}&fvalue={$filters[i].value[j]}">{$filters[i].value[j]}</a></li>
      {/section}
      
    
        </ul>
    </div>
  </div>
    </td>
    {/section}
    {if $categories}
        <td class="topblok2"><div class="rel"><a href="" class="link"><span>Категория</span></a>
    <br/>
    

  
      {section name=f loop=$filterOn}
        {section name=j loop=$categories}
          {if $categories[j].id==$filterOn[f]}
            <p><a href="?filterdel=idcat&namedel={$categories[j].id}" class="link2"><span>{$categories[j].name}</span></a></p>
          {/if}
        {/section}
      {/section}
  
      
    <div class="window">
      <ul>
        {section name=j loop=$categories}
        <li><a href="?fname=idcat&fvalue={$categories[j].id}">{$categories[j].name}</a></li>
      {/section}
      
    
        </ul>
    </div>
  </div>
    </td>
  {/if}
    <td></td><td></td>
  {/if}
    
  </tr>
</table>
<p class="byline"></p>    
<table width="100%" border="0">
  <tr>
  
    <td class="sort1">Сортировать по: &nbsp;<span {if $smarty.session.smir_ru_shoplite_csort=='price desc' || $smarty.session.smir_ru_shoplite_csort=='price asc'}class="blu"{/if}>Цене</span></td>
    <td class="sort2"><a href="?sort=price desc{if $smarty.get.rows}&rows={$smarty.get.rows}{/if}" class="but_down {if $smarty.session.smir_ru_shoplite_csort=='price desc'} active {/if}"></a><a href="?sort=price asc{if $smarty.get.rows}&rows={$smarty.get.rows}{/if}" class="but_up{if $smarty.session.smir_ru_shoplite_csort=='price asc'} active {/if}"></a></td>
    <td class="sort3">Рейтингу</td>
    <td class="sort2"><a href="" class="but_down"></a><a href="" class="but_up"></a></td>
    <td class="sort5"><span {if $smarty.session.smir_ru_shoplite_csort=='name desc' || $smarty.session.smir_ru_shoplite_csort=='name asc'}class="blu"{/if}>Наименованию</span></td>
    <td class="sort2"><a href="?sort=name asc{if $smarty.get.rows}&rows={$smarty.get.rows}{/if}" class="but_down {if $smarty.session.smir_ru_shoplite_csort=='name asc'} active {/if}"></a><a href="?sort=name desc{if $smarty.get.rows}&rows={$smarty.get.rows}{/if}" class="but_up {if $smarty.session.smir_ru_shoplite_csort=='name desc'} active {/if}"></a></td>
    <td>
  <ul class="pagesort">
    <li {if !$smarty.get.rows || $smarty.get.rows==9}class="active"{/if}><a href="?rows=9">9</a></li>
    <li {if $smarty.get.rows==12}class="active"{/if}><a href="?rows=12">12</a></li>
  </ul>
  <span class="srt">Показывать по:</span>
    </td>
  </tr>
</table>
<p class="h50"></p>
    
<table width="100%" border="0">
  <tr>
  {assign var="k" value=0}
  {section name=i loop=$items}
  {assign var="k" value=$k+1}
   <td class="mach1">
      <a href="{$items[i].link}">{image data=$items[i].images width=196 height=176}</a>
      <a href="{$items[i].link}">{$items[i].name}</a>
        {$items[i].description}
        <p class="price"><b>{$valute}.</b> {$items[i].price}.- </p>
    <a href="?action=addbasket&id={$items[i].id}"{* onClick="showOrder({$items[i].id},'{$items[i].name}','{$items[i].price}')"*} class="bye">Купить</a>
    </td>
    <td class="mach2">&nbsp;</td>
  {if $k==3 || $k==6}
    </tr>
    <tr><td colspan="9" class="mach3"></td></tr>
    <tr>
    {if $k==6}{assign var="k" value=0}{/if}
  {/if}
  {/section}
  </tr>
</table>
<p class="linebot3"></p>
{object obj=$items_pager}

        
    </div>
</div>       
        


    </div>  
  </div>

  {include file="_footer.tpl"}

</div>
</body>
</html>