<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:46
         compiled from shoplite_page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'shoplite_page.tpl', 32, false),array('function', 'object', 'shoplite_page.tpl', 48, false),array('function', 'image', 'shoplite_page.tpl', 54, false),array('function', 'filedata', 'shoplite_page.tpl', 78, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

 <link rel="stylesheet" href="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
      <script src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
      <?php echo '
        <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
          $("area[rel^=\'prettyPhoto\']").prettyPhoto();
          
          $(".gallery:first a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'normal\',theme:\'dark_rounded\',slideshow:3000, autoplay_slideshow: false});
          $(".gallery:gt(0) a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'fast\',slideshow:10000, hideflash: true});
      
          $("#custom_content a[rel^=\'prettyPhoto\']:first").prettyPhoto({
            custom_markup: \'<div id="map_canvas" style="width:260px; height:265px"></div>\',
            changepicturecallback: function(){ initialize(); }
          });
  
          $("#custom_content a[rel^=\'prettyPhoto\']:last").prettyPhoto({
            custom_markup: \'<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>\',
            changepicturecallback: function(){ _bsap.exec(); }
        });
      });
      </script>
      '; ?>

	  
<body class="inerfon">
<div class="main">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "order.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="header"><div class="header_inner">
   		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "logo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php echo smarty_function_block(array('id' => 'search'), $this);?>

		<?php echo smarty_function_block(array('id' => 'tel'), $this);?>

		<?php echo smarty_function_block(array('id' => 'basketheader'), $this);?>

        <div class="clearfix"></div>
       <?php echo smarty_function_block(array('id' => 'menu'), $this);?>

    </div></div>

	<div class="content clearfix">	
		<div class="wrapper">
<div class="left-col">	
<?php echo smarty_function_block(array('id' => 'cat_list'), $this);?>

</div>
<div class="middle-col">
    <div class="right-col">
<div class="zag clearfix">
    <p class="p1"><?php echo $this->_tpl_vars['item']['name']; ?>
</p>
   <?php echo smarty_function_object(array('obj' => $this->_tpl_vars['navigation']), $this);?>

</div>        
<table width="100%" border="0">
  <tr>
    <td class="wh1 gallery">
	<?php if ($this->_tpl_vars['item']['images'][1]['width'] >= $this->_tpl_vars['item']['images'][1]['height']): ?>
		<?php echo smarty_function_image(array('data' => $this->_tpl_vars['item']['images'][1],'width' => 373), $this);?>

	<?php else: ?>
		<?php echo smarty_function_image(array('data' => $this->_tpl_vars['item']['images'][1],'height' => 317), $this);?>

	<?php endif; ?>
	  <?php $this->assign('k', 0); ?>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['item']['images']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<?php if ($this->_tpl_vars['k'] > 2): ?>
		<a href="/<?php echo $this->_tpl_vars['item']['images'][$this->_sections['i']['index']]['path']; ?>
" rel="prettyPhoto[gallery1]"><?php echo smarty_function_image(array('data' => $this->_tpl_vars['item']['images'][$this->_sections['i']['index']],'width' => 125,'height' => 110), $this);?>
</a>
		<!--<img src="/imgsize4.php?filename=<?php echo $this->_tpl_vars['item']['images'][$this->_sections['i']['index']]['path']; ?>
&width=125&height=110" />-->
	<?php endif; ?>
	<?php endfor; endif; ?>
    </td>
    <td class="wh2">
<p class="bannazv5"><?php echo $this->_tpl_vars['item']['name']; ?>
</p>
<p class="price"><b><?php echo $this->_tpl_vars['valute']; ?>
.</b> <?php echo $this->_tpl_vars['item']['price']; ?>
.- </p>

<?php if ($this->_tpl_vars['item']['oldprice']): ?><p class="" style="margin-top:5px;color:#ff6600 !important;font:100 14px Arial !important;"><b>Цена магазина: <?php echo $this->_tpl_vars['item']['oldprice']; ?>
<?php echo $this->_tpl_vars['valute']; ?>
</b></p><?php endif; ?>
<p class="wline1"></p>
<a href="?action=addbasket&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="bye">Купить</a>
<p class="otstup25"></p>
<?php echo $this->_tpl_vars['item']['content']; ?>


<?php if ($this->_tpl_vars['item']['ins']): ?>
	<?php echo smarty_function_filedata(array('var' => 'file','id' => $this->_tpl_vars['item']['ins']), $this);?>

	<a href="<?php echo $this->_tpl_vars['file']['link']; ?>
" class="pdf">Скачать инструкцию</a>   
<?php endif; ?>

    
    </td>
  </tr>
</table>
<p class="wline2"></p>
<div class="tabshift">
  <?php if ($this->_tpl_vars['item']['desc']): ?>  <a rel="tabsulator1" href="javascript:void(0);">Описание</a><?php endif; ?>
    <a class="active" rel="tabsulator2" href="javascript:void(0);">Характеристики</a>
    <?php if ($this->_tpl_vars['item']['str']): ?><a rel="tabsulator3" href="javascript:void(0);">Строчки</a><?php endif; ?>
   <?php if ($this->_tpl_vars['item']['trim']): ?> <a rel="tabsulator4" href="javascript:void(0);">Комплектация</a><?php endif; ?>
</div>
  <div class="tabsulators" id="tabsulator1" style="display:none;">
  <?php if ($this->_tpl_vars['item']['desc']): ?>
	<?php echo $this->_tpl_vars['item']['desc']; ?>

  <?php endif; ?>
</div>
  <div class="tabsulators" id="tabsulator3" style="display:none;">
  <?php if ($this->_tpl_vars['item']['str']): ?>
	<?php echo $this->_tpl_vars['item']['str']; ?>

  <?php endif; ?>
</div>
  <div class="tabsulators" id="tabsulator4" style="display:none;">
  <?php if ($this->_tpl_vars['item']['trim']): ?>
	<?php echo $this->_tpl_vars['item']['trim']; ?>

  <?php endif; ?>
</div>

<div class="tabsulators" id="tabsulator2">
<!--Harakteristiks-->
  <?php $this->assign('k', 0); ?>
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['item']['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <?php if ($this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['value'] != "" && $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['field'] != 'showmain' && $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['field'] != 'mainfoto' && $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['field'] != 'str' && $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['field'] != 'desc' && $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['field'] != 'trim' && $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['field'] != 'ins'): ?>
  <?php $this->assign('k', $this->_tpl_vars['k']+1); ?>
  
	<div class="tekline<?php echo $this->_tpl_vars['k']; ?>
">
		<table>
			<tr>		
				<td class="har1">
				<?php if ($this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['h']): ?>
				<a href="<?php echo $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['h']; ?>
"><?php echo $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['name']; ?>
</a>
				<?php else: ?>
					<?php echo $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['name']; ?>

				<?php endif; ?>	
				</td>
				<td class="har2"><?php echo $this->_tpl_vars['item']['fields'][$this->_sections['i']['index']]['value']; ?>
</td>
			</tr>
		</table>
	</div>
	<?php if ($this->_tpl_vars['k'] == 2): ?>
	<?php $this->assign('k', 0); ?>
  <?php endif; ?>
   <?php endif; ?>
  <?php endfor; endif; ?>
<!--end Harakteristiks-->

</div>
<p class="wline3"></p>
<p class="otz">Отзывы</p><!--<a href="" class="otzlink"><span>Оставить отзыв </span></a>-->
<?php echo '
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
'; ?>


<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?82"></script>
<?php echo '
<script type="text/javascript">
  VK.init({apiId: 3484468, onlyWidgets: true});
</script>
'; ?>

<!-- Put this div tag to the place, where the Comments block will be -->
<div id="vk_comments"></div>
<script type="text/javascript">
<?php echo '
VK.Widgets.Comments("vk_comments", {limit: 10, width: "648", attach: false});
'; ?>

</script>
<?php if ($this->_tpl_vars['ties']): ?>
<br/>
<p class="wline4" style="margin:0 0 30px;"></p>
<p class="bannazv4">С этим товаром рекомендуем</p>
    
<table width="100%" border="0">
  <tr>
  
	  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ties']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td class="mach1">
    	<a href="<?php echo $this->_tpl_vars['ties'][$this->_sections['i']['index']]['link']; ?>
"><img src="/imgsize4.php?filename=<?php echo $this->_tpl_vars['ties'][$this->_sections['i']['index']]['images'][0]['path']; ?>
&width=196&height=176" /></a>
	    <a href="<?php echo $this->_tpl_vars['ties'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['ties'][$this->_sections['i']['index']]['name']; ?>
</a>
        <p class="price"><b><?php echo $this->_tpl_vars['value']; ?>
.</b> <?php echo $this->_tpl_vars['ties'][$this->_sections['i']['index']]['price']; ?>
.- </p>
		<a href="javascript:void(0);" onClick="showOrder(<?php echo $this->_tpl_vars['item']['id']; ?>
,'<?php echo $this->_tpl_vars['item']['name']; ?>
','<?php echo $this->_tpl_vars['item']['price']; ?>
')" class="bye">Купить</a>
    </td>
    <?php if (! $this->_sections['i']['last']): ?><td class="mach2">&nbsp;</td><?php endif; ?>
	  <?php endfor; endif; ?>

  </tr>
 
</table>
  <?php endif; ?>
        
    </div>
</div>       
        


		</div>	
	</div>

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
</body>
</html>