<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 17:00:58
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_features.tpl" */ ?>
<?php /*%%SmartyHeaderCode:799837040528a0f8a582565-42377895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90361741f76bbf54715571074b41c55743eedb2e' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_features.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '799837040528a0f8a582565-42377895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product_features' => 0,
    'feature' => 0,
    'hide_affix' => 0,
    'settings' => 0,
    'var' => 0,
    'hide_variant_affix' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a0f8a766407_26156228',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a0f8a766407_26156228')) {function content_528a0f8a766407_26156228($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/modifier.date_format.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php  $_smarty_tpl->tpl_vars["feature"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["feature"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["feature"]->key => $_smarty_tpl->tpl_vars["feature"]->value){
$_smarty_tpl->tpl_vars["feature"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']!="G"){?>
        <div class="control-group">
        <?php if (trim($_smarty_tpl->tpl_vars['feature']->value['full_description'])){?><?php echo $_smarty_tpl->getSubTemplate ("common/help.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('text'=>$_smarty_tpl->tpl_vars['feature']->value['description'],'content'=>$_smarty_tpl->tpl_vars['feature']->value['full_description'],'id'=>$_smarty_tpl->tpl_vars['feature']->value['feature_id'],'show_brackets'=>true,'wysiwyg'=>true), 0);?>
<?php }?>
        <label><?php echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
:</label>

        <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="M"){?>
            <?php $_smarty_tpl->tpl_vars["hide_affix"] = new Smarty_variable(true, null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["hide_affix"] = new Smarty_variable(false, null, 0);?>
        <?php }?>

        <div class="feature-value"><?php if ($_smarty_tpl->tpl_vars['feature']->value['prefix']&&!$_smarty_tpl->tpl_vars['hide_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="C"){?><span class="compare-checkbox" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['feature']->value['value']=="Y"){?><i class="icon-ok"></i><?php }?></span><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="D"){?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['feature']->value['value_int'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="M"&&$_smarty_tpl->tpl_vars['feature']->value['variants']){?><ul class="no-markers no-margin"><?php  $_smarty_tpl->tpl_vars["var"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["var"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["var"]->key => $_smarty_tpl->tpl_vars["var"]->value){
$_smarty_tpl->tpl_vars["var"]->_loop = true;
?><?php $_smarty_tpl->tpl_vars["hide_variant_affix"] = new Smarty_variable(!$_smarty_tpl->tpl_vars['hide_affix']->value, null, 0);?><?php if ($_smarty_tpl->tpl_vars['var']->value['selected']){?><li><span class="compare-checkbox" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['variant'], ENT_QUOTES, 'UTF-8');?>
"><i class="icon-ok"></i></span><?php if (!$_smarty_tpl->tpl_vars['hide_variant_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['variant'], ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['hide_variant_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
<?php }?></li><?php }?><?php } ?></ul><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="S"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"){?><?php  $_smarty_tpl->tpl_vars["var"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["var"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["var"]->key => $_smarty_tpl->tpl_vars["var"]->value){
$_smarty_tpl->tpl_vars["var"]->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['var']->value['selected']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['variant'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="N"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="O"){?><?php echo htmlspecialchars((($tmp = @floatval($_smarty_tpl->tpl_vars['feature']->value['value_int']))===null||$tmp==='' ? "-" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['feature']->value['value'])===null||$tmp==='' ? "-" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['suffix']&&!$_smarty_tpl->tpl_vars['hide_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
<?php }?></div>
        </div>
    <?php }?>
<?php } ?>

<?php  $_smarty_tpl->tpl_vars["feature"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["feature"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["feature"]->key => $_smarty_tpl->tpl_vars["feature"]->value){
$_smarty_tpl->tpl_vars["feature"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="G"&&$_smarty_tpl->tpl_vars['feature']->value['subfeatures']){?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_smarty_tpl->tpl_vars['feature']->value['description'],'tooltip'=>$_smarty_tpl->tpl_vars['feature']->value['full_description'],'text'=>$_smarty_tpl->tpl_vars['feature']->value['description']), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product_features'=>$_smarty_tpl->tpl_vars['feature']->value['subfeatures']), 0);?>

    <?php }?>
<?php } ?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/product_features.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/product_features.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php  $_smarty_tpl->tpl_vars["feature"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["feature"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["feature"]->key => $_smarty_tpl->tpl_vars["feature"]->value){
$_smarty_tpl->tpl_vars["feature"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']!="G"){?>
        <div class="control-group">
        <?php if (trim($_smarty_tpl->tpl_vars['feature']->value['full_description'])){?><?php echo $_smarty_tpl->getSubTemplate ("common/help.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('text'=>$_smarty_tpl->tpl_vars['feature']->value['description'],'content'=>$_smarty_tpl->tpl_vars['feature']->value['full_description'],'id'=>$_smarty_tpl->tpl_vars['feature']->value['feature_id'],'show_brackets'=>true,'wysiwyg'=>true), 0);?>
<?php }?>
        <label><?php echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
:</label>

        <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="M"){?>
            <?php $_smarty_tpl->tpl_vars["hide_affix"] = new Smarty_variable(true, null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["hide_affix"] = new Smarty_variable(false, null, 0);?>
        <?php }?>

        <div class="feature-value"><?php if ($_smarty_tpl->tpl_vars['feature']->value['prefix']&&!$_smarty_tpl->tpl_vars['hide_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="C"){?><span class="compare-checkbox" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['feature']->value['value']=="Y"){?><i class="icon-ok"></i><?php }?></span><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="D"){?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['feature']->value['value_int'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="M"&&$_smarty_tpl->tpl_vars['feature']->value['variants']){?><ul class="no-markers no-margin"><?php  $_smarty_tpl->tpl_vars["var"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["var"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["var"]->key => $_smarty_tpl->tpl_vars["var"]->value){
$_smarty_tpl->tpl_vars["var"]->_loop = true;
?><?php $_smarty_tpl->tpl_vars["hide_variant_affix"] = new Smarty_variable(!$_smarty_tpl->tpl_vars['hide_affix']->value, null, 0);?><?php if ($_smarty_tpl->tpl_vars['var']->value['selected']){?><li><span class="compare-checkbox" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['variant'], ENT_QUOTES, 'UTF-8');?>
"><i class="icon-ok"></i></span><?php if (!$_smarty_tpl->tpl_vars['hide_variant_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['variant'], ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['hide_variant_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
<?php }?></li><?php }?><?php } ?></ul><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="S"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"){?><?php  $_smarty_tpl->tpl_vars["var"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["var"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["var"]->key => $_smarty_tpl->tpl_vars["var"]->value){
$_smarty_tpl->tpl_vars["var"]->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['var']->value['selected']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['variant'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="N"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="O"){?><?php echo htmlspecialchars((($tmp = @floatval($_smarty_tpl->tpl_vars['feature']->value['value_int']))===null||$tmp==='' ? "-" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['feature']->value['value'])===null||$tmp==='' ? "-" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['suffix']&&!$_smarty_tpl->tpl_vars['hide_affix']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
<?php }?></div>
        </div>
    <?php }?>
<?php } ?>

<?php  $_smarty_tpl->tpl_vars["feature"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["feature"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["feature"]->key => $_smarty_tpl->tpl_vars["feature"]->value){
$_smarty_tpl->tpl_vars["feature"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="G"&&$_smarty_tpl->tpl_vars['feature']->value['subfeatures']){?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_smarty_tpl->tpl_vars['feature']->value['description'],'tooltip'=>$_smarty_tpl->tpl_vars['feature']->value['full_description'],'text'=>$_smarty_tpl->tpl_vars['feature']->value['description']), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product_features'=>$_smarty_tpl->tpl_vars['feature']->value['subfeatures']), 0);?>

    <?php }?>
<?php } ?><?php }?><?php }} ?>