<p>Всего / неактивированных: <b>{$users_count}</b>&nbsp;/&nbsp;<b><font color="red">{$users_unactivate}</font></b></p>
{if $users_count>0}
<p>Последняя регистрация: <b>{$last_date|date_format:"%d.%m.%Y"}</b></p>
{/if}
{if $usebalance}
<hr>
<p>Суммарный приход: <b>{if $sum_in}{$sum_in}{else}0{/if} {$valute}</b></p>
<p>Суммарный расход: <b>{if $sum_out}{$sum_out}{else}0{/if} {$valute}</b></p>
<p>Общий баланс в системе: <b>{if $sum_balance}{$sum_balance}{else}0{/if} {$valute}</b></p>
{/if}