<?php use Core\HTML; ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo isset($title) ? $title : NULL; ?></title>
<meta name="description" lang="ru-ru" content="<?php echo isset($description) ? $description : NULL; ?>">
<meta name="keywords" lang="ru-ru" content="<?php echo isset($keywords) ? $keywords : NULL; ?>">
<meta name="author" lang="ru-ru" content="s-mir.com.ua">

<meta name="application-name" content="<?php echo isset($title) ? $title : NULL; ?>">
<meta name="msapplication-tooltip" content="<?php echo isset($description) ? $description : NULL; ?>">
<meta name="msapplication-TileColor" content="#b91d47">
<meta name="msapplication-config" content="/browserconfig.xml">
<link rel="shortcut icon" href="<?php echo HTML::media('pic/favicon.ico') ?>" type="image/x-icon">

<!-- SEO canonicals -->
<?php if ($canonical = Core\Config::get('canonical')): ?>
    <link rel="canonical" href="<?php echo $canonical ?>">
<?php endif; ?>
<?php if ($prev = Core\Config::get('prev')): ?>
    <link rel="prev" href="<?php echo $prev ?>">
<?php endif; ?>
<?php if ($next = Core\Config::get('next')): ?>
    <link rel="next" href="<?php echo $next ?>">
<?php endif; ?>
<!-- .SEO canonicals -->

<?php $css = Minify_Core::factory('css')->minify($styles); ?>
<?php foreach ($css as $file_style): ?>
    <?php echo HTML::style($file_style) . "\n"; ?>
<?php endforeach; ?>

<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js/media"></script><![endif]-->
<?php $js = Minify_Core::factory('js')->minify($scripts); ?>
<?php foreach ($js as $file_script): ?>
    <?php echo HTML::script($file_script) . "\n"; ?>
<?php endforeach; ?>

<?php foreach ($scripts_no_minify as $file_script): ?>
    <?php echo HTML::script($file_script) . "\n"; ?>
<?php endforeach; ?>
