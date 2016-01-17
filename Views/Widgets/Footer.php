<div class="bottom">
    <div class="botom_inner">
        <div class="bot">
            <span class="bot1">©</span>
            <span class="bot2">Все права защищены  <?php echo date('Y'); ?> </span>
            <span class="bot3 wezom">
                <a href="http://wezom.mk.ua" target="_blank">Разработка и продвижение сайта - студия Wezom</a>
            </span>
        </div>
        <div class="sitemap">
            <a href="<?php echo Core\HTML::link('sitemap', true)?>">Карта сайта</a>
        </div>
    </div>
    <?php if (isset($counters)): ?>
        <?php foreach ($counters as $counter): ?>
            <?php echo $counter; ?>
        <?php endforeach ?>
    <?php endif ?>
</div>
