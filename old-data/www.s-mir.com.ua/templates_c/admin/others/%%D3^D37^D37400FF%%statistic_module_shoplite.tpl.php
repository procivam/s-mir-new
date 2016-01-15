<?php /* Smarty version 2.6.26, created on 2015-10-22 16:32:57
         compiled from statistic_module_shoplite.tpl */ ?>
<p>Всего категорий: <b><?php echo $this->_tpl_vars['categories_count']; ?>
</b></p>
<p>Всего записей: <b><?php echo $this->_tpl_vars['items_count']; ?>
</b></p>
<?php if ($this->_tpl_vars['usecomments']): ?>
<p>Всего комментариев: <b><?php echo $this->_tpl_vars['comments_count']; ?>
</b></p>
<?php endif; ?>