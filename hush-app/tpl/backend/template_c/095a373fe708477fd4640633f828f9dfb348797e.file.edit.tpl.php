<?php /* Smarty version 3.0rc1, created on 2010-06-07 18:31:39
         compiled from "D:\workspace\hush-framework\hush-app\tpl\backend\template\acl/app/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32544c0cca8ba517e1-61244142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '095a373fe708477fd4640633f828f9dfb348797e' => 
    array (
      0 => 'D:\\workspace\\hush-framework\\hush-app\\tpl\\backend\\template\\acl/app/edit.tpl',
      1 => 1275906252,
    ),
  ),
  'nocache_hash' => '32544c0cca8ba517e1-61244142',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("frame/head.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<div class="maintop">
<img src="<?php echo $_smarty_tpl->getVariable('_root')->value;?>
img/icon_arrow_right.png" class="icon" /> 编辑<?php if ($_smarty_tpl->getVariable('app')->value['is_app']=='YES'){?>应用<?php }else{ ?>菜单<?php }?> “<?php echo $_smarty_tpl->getVariable('app')->value['name'];?>
” 信息
</div>

<div class="mainbox">

<?php $_template = new Smarty_Internal_Template("frame/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<form method="post">
<table class="titem" >
	<tr>
		<td class="field">ID</td>
		<td class="value"><?php echo $_smarty_tpl->getVariable('app')->value['id'];?>
</td>
	</tr>
	<tr>
		<td class="field">创建类型</td>
		<td class="value"><?php if ($_smarty_tpl->getVariable('app')->value['is_app']=='YES'){?>应用<?php }else{ ?>菜单<?php }?></td>
	</tr>
	<tr>
		<td class="field">显示层次</td>
		<td class="value">
		<?php if ($_smarty_tpl->getVariable('app')->value['pid']=='0'){?>顶级菜单（不可修改）<?php }else{ ?><select id="sel_pid" class="common" name="pid"></select><?php }?>
		</td>
	</tr>
	<tr>
		<td class="field">显示名称 *</td>
		<td class="value"><input class="common" type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('app')->value['name'];?>
" /></td>
	</tr>
	<tr>
		<td class="field">角色选择 *</td>
		<td class="value">
			<?php $_template = new Smarty_Internal_Template("acl/forms/roles_edit.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</td>
	</tr>
	<tr id="sel_path" <?php if ($_smarty_tpl->getVariable('app')->value['is_app']=='NO'){?>class="disn"<?php }?>>
		<td class="field">应用路径 *</td>
		<td class="value"><input class="common" type="text" name="path" value="<?php echo $_smarty_tpl->getVariable('app')->value['path'];?>
" /></td>
	</tr>
	<tr>
		<td class="submit" colspan="2">
			<input type="submit" value="提交" />
			<input type="button" value="返回" onclick="javascript:history.go(-1);" />
		</td>
	</tr>
</table>
</form>

<script type="text/javascript">
// only when element exists
if ($("#sel_pid").length > 0) {
	var opt = '<?php if ($_smarty_tpl->getVariable('app')->value['is_app']=='YES'){?>app<?php }else{ ?>menu<?php }?>';
	$.post('appAjax', { opt : opt , sel : '<?php echo $_smarty_tpl->getVariable('app')->value['pid'];?>
' }, function(text){
		$("#sel_pid").append(text);
	});
}
</script>

</div>

<?php $_template = new Smarty_Internal_Template("frame/foot.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
