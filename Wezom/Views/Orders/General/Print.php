<link type="text/css" rel="stylesheet" href="<?php echo Core\HTML::bmedia('css/print.css'); ?>" />
<div style="margin: 50px;">
    <h2>Заказ №<?php echo $order->id; ?></h2>
    <img src="<?php echo Core\HTML::media('pic/logo.png'); ?>" alt="" width="200" class="logo_2" />

    <strong>Информация о заказе</strong>
    <table class="table2" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50%">Номер заказа:</td>
            <td><?php echo $order->id; ?></td>
        </tr>
        <tr>
            <td>Дата заказа:</td>
            <td><?php echo $order->created_at ? date('d.m.Y', $order->created_at) : 'Не определена'; ?></td>
        </tr>
        <tr>
            <td>Статус заказа:</td>
            <td><?php echo $statuses[$order->status]; ?></td>
        </tr>
    </table>
    <br />
    
    <strong>Информация о плательщике</strong>
    <table class="table2" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50%">Адресат</td>
            <td><?php echo $order->last_name.' '.$order->name.' '.$order->middle_name; ?></td>
        </tr>
        <tr>
            <td>E-Mail</td>
            <td><?php echo $order->email; ?></td>
        </tr>
        <tr>
            <td>Номер телефона</td>
            <td><?php echo $order->phone; ?></td>
        </tr>
        <tr>
            <td>Доставка</td>
            <td><?php echo $delivery[ $order->delivery ] . ($order->delivery == 2 ? ', '.$order->number : ''); ?></td>
        </tr>
        <tr>
            <td>Способ оплаты</td>
            <td><?php echo $payment[ $order->payment ]; ?></td>
        </tr>
    </table>
    <br />
    
    <strong>Содержание заказа</strong>
    <table class="table2" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Товар</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Итог</th>
        </tr>
        <?php foreach ($list as $item): ?>
            <tr>
                <td>
                    <?php echo $item->name; ?>
                </td>
                <td>
                    <?php echo (int) $item->cost; ?> грн
                </td>
                <td>
                    <?php echo (int) $item->count; ?> шт
                </td>
                <td>
                    <?php echo (int) $item->count * (int) $item->cost; ?> грн
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br />
    
    <div align="right">
        <strong>Итого:</strong> <?php echo (int) $order->amount; ?> грн
    </div>
</div>