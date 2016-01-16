<!DOCTYPE html>
<html lang="ru-ru" dir="ltr">
<!-- (c) студия Wezom | www.wezom.com.ua -->
<head>
    <?php echo Core\Widgets::get('Head', $_seo); ?>
    <?php foreach ( $_seo['scripts']['head'] as $script ): ?>
        <?php echo $script; ?>
    <?php endforeach ?>
    <?php echo $GLOBAL_MESSAGE; ?>
</head>
<body class="mainfon">
    <div class="main">
        <?php foreach ( $_seo['scripts']['body'] as $script ): ?>
            <?php echo $script; ?>
        <?php endforeach ?>
        <div class="seoTxt" id="seoTxt">
            <div class="wTxt wrapper">
                <h1><?php echo Core\Arr::get($_seo, 'h1') ?></h1>
                <?php echo $_content; ?>
            </div>
        </div>

        <?php echo Core\Widgets::get('Header', array('config' => $_config)); ?>

        <div class="content clearfix">
            <div class="wrapper">
                <?php echo Core\Widgets::get('Index_Slider'); ?>

                <?php echo Core\Widgets::get('Index_Groups'); ?>

                <?php echo Core\Widgets::get('Index_Banners'); ?>

                <?php echo Core\Widgets::get('Index_News'); ?>

                <div id="clonSeo"></div>
            </div>
        </div>
        <?php echo Core\Widgets::get('Footer', array('counters' => Core\Arr::get($_seo, 'scripts')['counter'], 'config' => $_config)); ?>
    </div>
</body>
</html>
