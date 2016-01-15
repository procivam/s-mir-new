{include file="_header.tpl"}

{if $errors.doublelogin}
<div class="warning">Пользователь с таким логином уже существует!</div>
{/if}
{if $errors.doublename}
<div class="warning">Указанное имя уже используется на форуме!</div>
{/if}

{if $options.usebalance}
{tabcontrol users="Пользователи" trans="Операции" opt="Настройки"}
{else}
{tabcontrol users="Пользователи" opt="Настройки"}
{/if}

{tabpage id="users"}
<div>
{if $users}
<form name="usersform" method="post">
<table width="100%" class="grid">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="20">ID</th>
{if $options.useavatara}<th width="16">&nbsp;</th>{/if}
<th align="left" width="100">Логин</th>
<th align="left">Полное имя</th>
{if $fgroups}<th align="left" width="100">Группа</th>{/if}
<th align="left" width="50">Визитов</th>
<th align="left" width="120">Последний визит</th>
<th align="left" width="120">Дата регистрации</th>
{if $options.usebalance}
<th align="left" width="70">Баланс</th>
<th width="20">&nbsp;</th>
{/if}
<th width="20">&nbsp;</th>
</tr>
{section name=i loop=$users}
<tr class="{if $users[i].active=='Y'}{cycle values="row0,row1"}{else}close{/if}">
<td width="20"><input id="check{$smarty.section.i.index}" type="checkbox" name="checkuser[]" value="{$users[i].id}"></td>
<td width="20">{$users[i].id}</td>
{if $options.useavatara}<td width="16">{if $users[i].idimg}{capture name=avatara}{image id=$users[i].idimg width=120}{/capture}<img src="/templates/admin/images/image.gif" width="16" height="16" {popup text=$smarty.capture.avatara fgcolor="#F3FCFF" width=120 bgcolor="86BECD" left=true}>{else}&nbsp;{/if}</td>{/if}
<td width="100" nowrap>
<a href="javascript:getedituserform({$users[i].id})" title="Редактировать">{$users[i].login}</a>
</td>
<td>{$users[i].name}</td>
{if $fgroups}<td width="100" nowrap>{$users[i].groupname}</td>{/if}
<td width="50" align="center">{$users[i].cauth}</td>
<td width="120" nowrap>{if $users[i].dauth}{if $users[i].dauth>=$smarty.now}на сайте{else}{$users[i].dauth|date_format:"%D %T"}{/if}{else}не было{/if}</td>
<td width="120" nowrap>{$users[i].date|date_format:"%d.%m.%Y %T"}</td>
{if $options.usebalance}
<td width="70" nowrap>{$users[i].balance} <span class="gray">{$options.valute}</span></td>
<td width="20"><a href="admin.php?mode=sections&item={$system.item}&iduser={$users[i].id}&tab=trans{if $smarty.get.page}&page={$smarty.get.page}{/if}" title="Операции"><img src="/modules/users/images/transactions.gif" width="16" height="16" alt="Операции"></a></td>
{/if}
<td width="20"><a href="javascript:deluser({$users[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
{/section}
</table>
{object obj=$users_pager}
{else}
<div class="box">Не найдены пользователи.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
{if $users}
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="setactive">Активировать</option>
<option value="setunactive">Отключить</option>
{if $options.usebalance}<option value="transaction">Зачислить/Снять</option>{/if}
{if $usedelivery}<option value="delivery">Рассылка</option>{/if}
<option value="delete">Удалить</option>
</select>
{hidden name="authcode" value=$system.authcode}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="users"}
</form>
</td>
<td nowrap>
<form name="sortform" method="post">
<p>Сортировать по:
<select name="sort" onchange="this.form.submit()">
<option value="date DESC">дате вверх</option>
<option value="date">дате вниз</option>
{if $options.usebalance}
<option value="balance DESC">балансу вверх</option>
<option value="balance">балансу вниз</option>
{/if}
<option value="login">логину вниз</option>
<option value="login DESC">логину вверх</option>
<option value="name">имени вниз</option>
<option value="name DESC">имени вверх</option>
</select>
<script type="text/javascript">document.forms.sortform.sort.value='{$sort}';</script>
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setsort"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="users"}
</form>
</td>
<td nowrap>
<form name="rowsform" method="post">
Строк:
<select name="rows" onchange="this.form.submit()">
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="0">Все</option>
</select>
<script type="text/javascript">document.forms.rowsform.rows.value='{$rows}';</script>
{hidden name="tab" value="users"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setrows"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
</form>
</td>
{/if}
<td align="right" width="80%">
{if $usedelivery}
{button caption="Рассылка" onclick="godelivery()"}
{/if}
{button caption="Фильтр" onclick="getfilterform()"}
{button caption="Добавить" onclick="getadduserform()"}
</td>
</tr>
</table>
</div>
<div id="filterbox"></div>
{if $filter}
<script type="text/javascript">getfilterform()</script>
{/if}
{/tabpage}

{if $options.usebalance}
{tabpage id="trans"}
{if $user}<h3>{$user.name}:</h3>{/if}
<div class="actionbox">
<form name="statdateform" method="post">
с &nbsp;{dateselect name="from" date=$statfrom}
&nbsp;
по &nbsp;{dateselect name="to" date=$statto maxtime=true}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setperiod"}
{hidden name="tab" value="trans"}
{submit caption="Применить" width="80"}
</form>
</div>
{if $transactions}
<table class="grid" width="100%">
<tr>
<th align="left" width="120">Дата</th>
<th align="left" width="150">Пользователь</th>
<th align="left">Описание</th>
<th width="70">Приход</th>
<th width="70">Расход</th>
<th width="16">&nbsp;</th>
</tr>
{section name=i loop=$transactions}
<tr class="{cycle values="row0,row1"}">
<td width="120" nowrap>{$transactions[i].date|date_format:"%d.%m.%Y %T"}</td>
<td width="150" nowrap>{if $smarty.get.iduser}{$transactions[i].user}{else}<a href="admin.php?mode=sections&item={$system.item}&iduser={$transactions[i].iduser}&tab=trans" title="Фильтр по пользователю">{$transactions[i].user}</a>{/if}</td>
<td>{$transactions[i].description}</td>
<td width="70" align="center" nowrap>{if $transactions[i].in>0}{$transactions[i].in} <span class="gray">{$options.valute}</span>{else}-{/if}</td>
<td width="70" align="center" nowrap>{if $transactions[i].out>0}{$transactions[i].out} <span class="gray">{$options.valute}</span>{else}-{/if}</td>
<td width="16"><a href="javascript:deltrans({$transactions[i].id})" title="Отменить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Отменить"></a></td>
</tr>
{/section}
<tr class="row2">
<td colspan="3">Всего: {$sumbalance} <span class="gray">{$options.valute}</span></td>
<td width="70" align="center" nowrap>{if $sumin>0}{$sumin} <span class="gray">{$options.valute}</span>{else}-{/if}</td>
<td width="70" align="center" nowrap>{if $sumout>0}{$sumout} <span class="gray">{$options.valute}</span>{else}-{/if}</td>
<td width="16">&nbsp;</td>
</tr>
</table>
{object obj=$transactions_pager}
{else}
<div class="box">Не найдено проведенных операций.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
<td nowrap>
<form name="transfilterform" method="get">
Фильтр по ID пользователя:&nbsp;
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{if $smarty.get.iduser}
{editbox name="iduser" width="50" text=$smarty.get.iduser}
{else}
{editbox name="iduser" width="50"}
{/if}
{button caption="Применить" onclick="this.form.submit()" width="80"}
{if $smarty.get.iduser}
{button caption="Сбросить" onclick="this.form.iduser.value=0; this.form.submit();" width="80"}
{/if}
{hidden name="tab" value="trans"}
</form>
</td>
{if $transactions}
<td nowrap>
<form name="rowsform2" method="post">
Строк:
<select name="rows" onchange="this.form.submit()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="0">Все</option>
</select>
<script type="text/javascript">document.forms.rowsform2.rows.value='{$rows2}';</script>
{hidden name="tab" value="trans"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setrows2"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
</form>
</td>
{/if}
<td width="80%" align="right">
{if $user}
<input type="button" class="button" value="Добавить" onclick="getaddtransform({$user.id},'transbox')" style="width:120px">
{else}
&nbsp;
{/if}
</td>
</tr>
</table>
{/tabpage}
{/if}

{tabpage id="opt"}
{tabcontrol id="opt" opt2="Опции" fields="Редактор&nbsp;полей"}
{tabpage idtab="opt" id="opt2"}
{object obj=$optbox1}
{object obj=$optbox2}
{object obj=$optbox3}
{object obj=$optbox4}
{/tabpage}
{tabpage idtab="opt" id="fields"}
{object obj=$fieldsbox}
{/tabpage}
{/tabpage}

{include file="_footer.tpl"}
