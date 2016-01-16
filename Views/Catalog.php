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
    <?php if (trim(strip_tags(Core\Arr::get($_seo, 'seo_text')))): ?>
        <div class="seoTxt" id="seoTxt">
            <div class="wSize wTxt">
                <?php echo Core\Arr::get($_seo, 'seo_text'); ?>
            </div>
        </div>
    <?php endif ?>

    <?php echo Core\Widgets::get('Header', array('config' => $_config)); ?>

    <div class="content clearfix">
        <div class="wrapper">
            <div class="left-col">
                <?php echo Core\Widgets::get('Groups_CatalogMenuLeft'); ?>
            </div>
            <div class="middle-col">
                <div class="zag">
                    <h1><?php echo Core\Arr::get($_seo, 'h1'); ?></h1>
                    <?php echo $_breadcrumbs; ?>
                </div>
                <?php echo $_content; ?>
                <div id="clonSeo"></div>
            </div>
        </div>
    </div>
    <?php echo Core\Widgets::get('Footer', array('counters' => Core\Arr::get($_seo, 'scripts')['counter'], 'config' => $_config)); ?>
</div>
</body>
</html>
