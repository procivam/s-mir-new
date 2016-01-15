<?php /* Smarty version 2.6.26, created on 2015-12-13 17:33:16
         compiled from fileadmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'button', 'fileadmin.tpl', 5, false),)), $this); ?>
<div id="fa_gridbox"></div>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Создать каталог",'onclick' => "createfolder()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Создать файл",'onclick' => "createfile()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Загрузить файл",'onclick' => "uploadform()"), $this);?>

</td>
</tr>
</table>
<script type="text/javascript">fagopage(0)</script>