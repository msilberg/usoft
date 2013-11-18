<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 17:00:58
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_files.tpl" */ ?>
<?php /*%%SmartyHeaderCode:274429268528a0f8a79d5d3-08404180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5b5075712136945df3a00e02a73c25f0c7deb6c' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_files.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '274429268528a0f8a79d5d3-08404180',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'files' => 0,
    'file' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a0f8a855072_69093312',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a0f8a855072_69093312')) {function content_528a0f8a855072_69093312($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_formatfilesize')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/modifier.formatfilesize.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('filename','filesize','licence_agreement','readme','filename','filesize','licence_agreement','readme'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if ($_smarty_tpl->tpl_vars['files']->value){?>
<table class="table table-width">
<tr>
    <th><?php echo $_smarty_tpl->__("filename");?>
</th>
    <th><?php echo $_smarty_tpl->__("filesize");?>
</th>
</tr>
<?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value){
$_smarty_tpl->tpl_vars["file"]->_loop = true;
?>
<tr>
    <td style="width: 80%">
        <a class="cm-no-ajax" href="<?php echo htmlspecialchars(fn_url("orders.get_file?file_id=".((string)$_smarty_tpl->tpl_vars['file']->value['file_id'])."&preview=Y"), ENT_QUOTES, 'UTF-8');?>
"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_name'], ENT_QUOTES, 'UTF-8');?>
</strong></a>
        <?php if ($_smarty_tpl->tpl_vars['file']->value['readme']||$_smarty_tpl->tpl_vars['file']->value['license']){?>
        <ul class="bullets-list">
        <?php if ($_smarty_tpl->tpl_vars['file']->value['license']){?>
            <li><a onclick="Tygh.$('#license_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
').toggle(); return false;"><?php echo $_smarty_tpl->__("licence_agreement");?>
</a></li>
            <div class="hidden" id="license_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value['license'];?>
</div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['file']->value['readme']){?>
            <li><a onclick="Tygh.$('#readme_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
').toggle(); return false;"><?php echo $_smarty_tpl->__("readme");?>
</a></li>
            <div class="hidden" id="readme_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value['readme'];?>
</div>
        <?php }?>
        </ul>
        <?php }?>
    </td>
    <td class="valign-top" style="width: 20%">
         <strong><?php echo smarty_modifier_formatfilesize($_smarty_tpl->tpl_vars['file']->value['file_size']);?>
</strong>
    </td>
<?php } ?>
</table>
<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/product_files.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/product_files.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['files']->value){?>
<table class="table table-width">
<tr>
    <th><?php echo $_smarty_tpl->__("filename");?>
</th>
    <th><?php echo $_smarty_tpl->__("filesize");?>
</th>
</tr>
<?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value){
$_smarty_tpl->tpl_vars["file"]->_loop = true;
?>
<tr>
    <td style="width: 80%">
        <a class="cm-no-ajax" href="<?php echo htmlspecialchars(fn_url("orders.get_file?file_id=".((string)$_smarty_tpl->tpl_vars['file']->value['file_id'])."&preview=Y"), ENT_QUOTES, 'UTF-8');?>
"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_name'], ENT_QUOTES, 'UTF-8');?>
</strong></a>
        <?php if ($_smarty_tpl->tpl_vars['file']->value['readme']||$_smarty_tpl->tpl_vars['file']->value['license']){?>
        <ul class="bullets-list">
        <?php if ($_smarty_tpl->tpl_vars['file']->value['license']){?>
            <li><a onclick="Tygh.$('#license_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
').toggle(); return false;"><?php echo $_smarty_tpl->__("licence_agreement");?>
</a></li>
            <div class="hidden" id="license_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value['license'];?>
</div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['file']->value['readme']){?>
            <li><a onclick="Tygh.$('#readme_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
').toggle(); return false;"><?php echo $_smarty_tpl->__("readme");?>
</a></li>
            <div class="hidden" id="readme_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['file']->value['file_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value['readme'];?>
</div>
        <?php }?>
        </ul>
        <?php }?>
    </td>
    <td class="valign-top" style="width: 20%">
         <strong><?php echo smarty_modifier_formatfilesize($_smarty_tpl->tpl_vars['file']->value['file_size']);?>
</strong>
    </td>
<?php } ?>
</table>
<?php }?><?php }?><?php }} ?>