<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:22
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8971341855266556218e6e2-93410063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67849c3135cbe2ebb83d7f90263c3d63d15437f0' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_icon.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '8971341855266556218e6e2-93410063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'obj_id_prefix' => 0,
    'settings' => 0,
    'show_gallery' => 0,
    'image_pair' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665562273439_41915836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665562273439_41915836')) {function content_52665562273439_41915836($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php $_smarty_tpl->_capture_stack[0][] = array("main_icon", null, null); ob_start(); ?>
    <a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id_prefix']->value,'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair'],'image_width'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_height']), 0);?>

    </a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']&&$_smarty_tpl->tpl_vars['show_gallery']->value){?>
    <div class="thumbs-wrapper jcarousel-skin cm-image-gallery" data-ca-items-count="1" id="icons_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id_prefix']->value, ENT_QUOTES, 'UTF-8');?>
">
        <ul><?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']){?><li class="cm-gallery-item"><?php echo Smarty::$_smarty_vars['capture']['main_icon'];?>
</li><?php }?><?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["image_pair"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
 $_smarty_tpl->tpl_vars["image_pair"]->index++;
 $_smarty_tpl->tpl_vars["image_pair"]->first = $_smarty_tpl->tpl_vars["image_pair"]->index === 0;
?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?><li class="cm-gallery-item <?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']||!$_smarty_tpl->tpl_vars['image_pair']->first){?>hidden<?php }?>"><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>((string)$_smarty_tpl->tpl_vars['obj_id_prefix']->value)."_".((string)$_smarty_tpl->tpl_vars['image_pair']->value['image_id']),'images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'image_width'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_height']), 0);?>
</a></li><?php }?><?php } ?></ul>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']||count($_smarty_tpl->tpl_vars['product']->value['image_pairs'])>1){?>
            <i class="icon-left-circle jcarousel-prev"></i>
            <i class="icon-right-circle jcarousel-next"></i>
        <?php }?>
    </div>
<?php }else{ ?>
    <?php echo Smarty::$_smarty_vars['capture']['main_icon'];?>

<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/product_icon.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/product_icon.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php $_smarty_tpl->_capture_stack[0][] = array("main_icon", null, null); ob_start(); ?>
    <a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id_prefix']->value,'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair'],'image_width'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_height']), 0);?>

    </a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']&&$_smarty_tpl->tpl_vars['show_gallery']->value){?>
    <div class="thumbs-wrapper jcarousel-skin cm-image-gallery" data-ca-items-count="1" id="icons_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id_prefix']->value, ENT_QUOTES, 'UTF-8');?>
">
        <ul><?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']){?><li class="cm-gallery-item"><?php echo Smarty::$_smarty_vars['capture']['main_icon'];?>
</li><?php }?><?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["image_pair"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
 $_smarty_tpl->tpl_vars["image_pair"]->index++;
 $_smarty_tpl->tpl_vars["image_pair"]->first = $_smarty_tpl->tpl_vars["image_pair"]->index === 0;
?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?><li class="cm-gallery-item <?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']||!$_smarty_tpl->tpl_vars['image_pair']->first){?>hidden<?php }?>"><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>((string)$_smarty_tpl->tpl_vars['obj_id_prefix']->value)."_".((string)$_smarty_tpl->tpl_vars['image_pair']->value['image_id']),'images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'image_width'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_lists_thumbnail_height']), 0);?>
</a></li><?php }?><?php } ?></ul>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']||count($_smarty_tpl->tpl_vars['product']->value['image_pairs'])>1){?>
            <i class="icon-left-circle jcarousel-prev"></i>
            <i class="icon-right-circle jcarousel-next"></i>
        <?php }?>
    </div>
<?php }else{ ?>
    <?php echo Smarty::$_smarty_vars['capture']['main_icon'];?>

<?php }?><?php }?><?php }} ?>