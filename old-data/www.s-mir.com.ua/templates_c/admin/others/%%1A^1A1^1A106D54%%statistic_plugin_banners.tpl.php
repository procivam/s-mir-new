<?php /* Smarty version 2.6.26, created on 2015-10-22 16:32:58
         compiled from statistic_plugin_banners.tpl */ ?>
<p>Всего категорий: <b><?php echo $this->_tpl_vars['categories_count']; ?>
</b></p>
<p>Всего баннеров: <b><?php echo $this->_tpl_vars['banners_count']; ?>
</b></p>
<?php if ($this->_tpl_vars['views_sum']): ?>
<p>Всего показов: <b><?php echo $this->_tpl_vars['views_sum']; ?>
</b></p>
<?php endif; ?>
<?php if ($this->_tpl_vars['clicks_sum']): ?>
<p>Всего кликов: <b><?php echo $this->_tpl_vars['clicks_sum']; ?>
</b></p>
<?php endif; ?>