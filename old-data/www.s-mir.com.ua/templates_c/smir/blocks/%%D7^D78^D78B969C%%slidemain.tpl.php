<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:54
         compiled from slidemain.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'imagedata', 'slidemain.tpl', 13, false),)), $this); ?>

<div id="mycarousel" class="jcarousel-skin-tango">
<ul>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<li>
        	<div class="slidetext">
            	<p class="p_slide1"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['category']; ?>
</p>
                <p class="p_slide2"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</p>
               <?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['description']; ?>

                <p class="p_slide3"><b><?php echo $this->_tpl_vars['valute']; ?>
</b><span><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['price']; ?>
.- </span></p>
            </div>

			<?php echo smarty_function_imagedata(array('var' => 'img','id' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['mainfoto']), $this);?>

        	<a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
"><img src="<?php echo $this->_tpl_vars['img']['path']; ?>
" /></a>
        </li>
<?php endfor; endif; ?>
</ul>
<input type="hidden" name="col" class="coll" value="0" />
<!--   <a href="#" id="mycarousel-next" class="jcarousel-next-horizontal"></a>
     <a href="#" id="mycarousel-prev" class="jcarousel-prev-horizontal"></a>
-->
    <div class="jcarousel-control">
	<?php $this->assign('k', 0); ?>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<?php $this->assign('k', $this->_tpl_vars['k']+1); ?>
		<a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
" class="kl<?php echo $this->_tpl_vars['k']; ?>
 <?php if ($this->_sections['i']['first']): ?>active<?php endif; ?>" ><span><?php echo $this->_tpl_vars['k']; ?>
</span></a>
	<?php endfor; endif; ?>
    </div>
</div>    