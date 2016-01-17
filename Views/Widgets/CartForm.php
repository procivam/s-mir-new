<div form="true" class="wForm regBlock" data-ajax="checkout">
    <div class="wFormRow">
        <input data-name="name" type="text" name="name" data-rule-bykvu="true" placeholder="Имя получателя"
               data-rule-minlength="2" data-rule-required="true">
        <label>Имя</label>
    </div>
    <div class="wFormRow">
        <input type="tel" data-name="phone" class="tel" name="phone" data-rule-phoneUA="true" maxlength="19" minlength="19"
               placeholder="Телефон" data-rule-data-rule-required="truetrue">
        <label>Телефон</label>
    </div>
    <div class="wFormRow">
        <input data-name="email" type="email" name="email" placeholder="E-mail" required="">
        <label>E-mail</label>
    </div>
    <div class="wFormRow">
        <textarea data-name="text" placeholder="Примечание" name="text"></textarea>
        <label>Примечание</label>
    </div>
    <?php if(array_key_exists('token', $_SESSION)): ?>
        <input type="hidden" data-name="token" value="<?php echo $_SESSION['token']; ?>" />
    <?php endif; ?>
    <div class="butt">
        <button class="wSubmit enterReg_btn btn" id="contactForm">подтвердить заказ</button>
    </div>
</div>
