<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:54
         compiled from banner.tpl */ ?>
<?php if ($this->_tpl_vars['banner']['type'] == 'image'): ?>
<?php if ($this->_tpl_vars['parent']['type'] == '1'): ?>
	<td><a href="<?php echo $this->_tpl_vars['banner']['link']; ?>
" target="<?php echo $this->_tpl_vars['banner']['target']; ?>
" title="<?php echo $this->_tpl_vars['banner']['name']; ?>
"><img src="/<?php echo $this->_tpl_vars['banner']['filepath']; ?>
" alt="<?php echo $this->_tpl_vars['banner']['name']; ?>
" width="<?php echo $this->_tpl_vars['banner']['width']; ?>
" height="<?php echo $this->_tpl_vars['banner']['height']; ?>
"/></a></td>
    <td><p class="bannazv1"><?php echo $this->_tpl_vars['banner']['name']; ?>
</p>
    <?php echo $this->_tpl_vars['banner']['text']; ?>

    </td>
<?php elseif ($this->_tpl_vars['parent']['type'] == '2'): ?>
	<td class="ban2">&nbsp;</td>
	<td><a href="<?php echo $this->_tpl_vars['banner']['link']; ?>
" target="<?php echo $this->_tpl_vars['banner']['target']; ?>
" title="<?php echo $this->_tpl_vars['banner']['name']; ?>
"><img src="/<?php echo $this->_tpl_vars['banner']['filepath']; ?>
" alt="<?php echo $this->_tpl_vars['banner']['name']; ?>
" width="<?php echo $this->_tpl_vars['banner']['width']; ?>
" height="<?php echo $this->_tpl_vars['banner']['height']; ?>
"/></a></td>
    <td>
    <p class="bannazv2"><?php echo $this->_tpl_vars['banner']['name']; ?>
</p>
   <?php echo $this->_tpl_vars['banner']['text']; ?>

    </td>
<?php elseif ($this->_tpl_vars['parent']['type'] == '3'): ?>
	<td class="ban3">&nbsp;</td>
	<td><a href="<?php echo $this->_tpl_vars['banner']['link']; ?>
" target="<?php echo $this->_tpl_vars['banner']['target']; ?>
" title="<?php echo $this->_tpl_vars['banner']['name']; ?>
"><img src="/<?php echo $this->_tpl_vars['banner']['filepath']; ?>
" alt="<?php echo $this->_tpl_vars['banner']['name']; ?>
" width="<?php echo $this->_tpl_vars['banner']['width']; ?>
" height="<?php echo $this->_tpl_vars['banner']['height']; ?>
"/></a></td>
    <td><p class="bannazv2"><?php echo $this->_tpl_vars['banner']['name']; ?>
</p>
   <?php echo $this->_tpl_vars['banner']['text']; ?>

    </td>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['banner']['type'] == 'flash'): ?>
<object width=<?php echo $this->_tpl_vars['banner']['width']; ?>
 height=<?php echo $this->_tpl_vars['banner']['height']; ?>
>
<param name=movie value="/<?php echo $this->_tpl_vars['banner']['filepath']; ?>
"/>
<param name=quality value=high/>
<param name=menu value=false/>
<embed src="/<?php echo $this->_tpl_vars['banner']['filepath']; ?>
" quality="high" type="application/x-shockwave-flash" width=<?php echo $this->_tpl_vars['banner']['width']; ?>
 height=<?php echo $this->_tpl_vars['banner']['height']; ?>
/>
</object>
<?php elseif ($this->_tpl_vars['banner']['url']): ?>
<a href="<?php echo $this->_tpl_vars['banner']['link']; ?>
" target="<?php echo $this->_tpl_vars['banner']['target']; ?>
"><?php echo $this->_tpl_vars['banner']['name']; ?>
</a>
<?php else: ?>
<?php echo $this->_tpl_vars['banner']['text']; ?>

<?php endif; ?>