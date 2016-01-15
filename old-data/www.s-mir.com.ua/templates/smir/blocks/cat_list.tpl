
<table width="100%" border="0" class="leftmen">
  {section name=i loop=$categories}
{imagedata var="img" id=$categories[i].idimg}
<tr>
    <td class="leftmen1"><a href="{$categories[i].link}"><img src="/imgsize4.php?filename={$img.path}&width=86&height=68" /></a></td>
    <td class="leftmen2" ><a href="{$categories[i].link}" ><div style="width:130px;">{$categories[i].name}</div></a></td>
  </tr>
{/section}
   <tr>
    <td class="leftmen1"></td>
    <td class="leftmen2"></td>
  </tr>
</table>