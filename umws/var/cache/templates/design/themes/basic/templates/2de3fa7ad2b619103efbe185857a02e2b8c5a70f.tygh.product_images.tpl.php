<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 16:31:47
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1655629876528a08b304d7f8-75984983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de3fa7ad2b619103efbe185857a02e2b8c5a70f' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_images.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1655629876528a08b304d7f8-75984983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'image_pair_var' => 0,
    'preview_id' => 0,
    'image_id' => 0,
    'image_width' => 0,
    'image_height' => 0,
    'image_pair' => 0,
    'img_id' => 0,
    'settings' => 0,
    'th_size' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a08b32d1c38_04056238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a08b32d1c38_04056238')) {function content_528a08b32d1c38_04056238($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>
<?php $_smarty_tpl->tpl_vars["th_size"] = new Smarty_variable("35", null, 0);?> 

<?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']['icon']||$_smarty_tpl->tpl_vars['product']->value['main_pair']['detailed']){?>
    <?php $_smarty_tpl->tpl_vars["image_pair_var"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['main_pair'], null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['product']->value['option_image_pairs']){?>
    <?php $_smarty_tpl->tpl_vars["image_pair_var"] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['product']->value['option_image_pairs']), null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['image_pair_var']->value['image_id']){?>
    <?php $_smarty_tpl->tpl_vars["image_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair_var']->value['image_id'], null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["image_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair_var']->value['detailed_id'], null, 0);?>    
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['preview_id']->value){?>
<?php $_smarty_tpl->tpl_vars["preview_id"] = new Smarty_variable(uniqid($_smarty_tpl->tpl_vars['product']->value['product_id']), null, 0);?>
<?php }?>

<div class="border-image-wrap">
<?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['image_id']->value),'images'=>$_smarty_tpl->tpl_vars['image_pair_var']->value,'link_class'=>"cm-image-previewer",'image_width'=>$_smarty_tpl->tpl_vars['image_width']->value,'image_height'=>$_smarty_tpl->tpl_vars['image_height']->value,'image_id'=>"preview[product_images_".((string)$_smarty_tpl->tpl_vars['preview_id']->value)."]"), 0);?>


<?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['image_pair']->value['image_id']){?>
            <?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['image_id'], null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['detailed_id'], null, 0);?>            
        <?php }?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'link_class'=>"cm-image-previewer hidden",'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['img_id']->value),'image_width'=>$_smarty_tpl->tpl_vars['image_width']->value,'image_height'=>$_smarty_tpl->tpl_vars['image_height']->value,'image_id'=>"preview[product_images_".((string)$_smarty_tpl->tpl_vars['preview_id']->value)."]"), 0);?>

    <?php }?>
<?php } ?>
</div>

<?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']){?>
    <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['thumbnails_gallery']=="Y"){?>
    <input type="hidden" name="no_cache" value="1" />
    <ul class="product-thumbnails center jcarousel-skin cm-image-gallery" id="images_preview_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['image_pair_var']->value){?><li><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-gallery-item cm-thumbnails-mini active thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair_var']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['image_id']->value)."_mini"), 0);?>
</a></li><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']){?><?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?><li><?php if ($_smarty_tpl->tpl_vars['image_pair']->value['image_id']){?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['image_id'], null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['detailed_id'], null, 0);?><?php }?><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-gallery-item cm-thumbnails-mini thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['img_id']->value)."_mini"), 0);?>
</a></li><?php }?><?php } ?><?php }?></ul>
    <?php }else{ ?>
        <div class="product-thumbnails center cm-image-gallery" id="images_preview_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
" style="width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_width']->value, ENT_QUOTES, 'UTF-8');?>
px;">
        <?php if ($_smarty_tpl->tpl_vars['image_pair_var']->value){?><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-thumbnails-mini active thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair_var']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['image_id']->value)."_mini"), 0);?>
</a><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']){?><?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value['image_id']==0){?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['detailed_id'], null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['image_id'], null, 0);?><?php }?><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-thumbnails-mini thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['img_id']->value)."_mini"), 0);?>
</a><?php }?><?php } ?><?php }?>
        </div>
    <?php }?>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ("common/previewer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo smarty_function_script(array('src'=>"js/tygh/product_image_gallery.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:product_images")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:product_images"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:product_images"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/product_images.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/product_images.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?>
<?php $_smarty_tpl->tpl_vars["th_size"] = new Smarty_variable("35", null, 0);?> 

<?php if ($_smarty_tpl->tpl_vars['product']->value['main_pair']['icon']||$_smarty_tpl->tpl_vars['product']->value['main_pair']['detailed']){?>
    <?php $_smarty_tpl->tpl_vars["image_pair_var"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['main_pair'], null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['product']->value['option_image_pairs']){?>
    <?php $_smarty_tpl->tpl_vars["image_pair_var"] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['product']->value['option_image_pairs']), null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['image_pair_var']->value['image_id']){?>
    <?php $_smarty_tpl->tpl_vars["image_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair_var']->value['image_id'], null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["image_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair_var']->value['detailed_id'], null, 0);?>    
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['preview_id']->value){?>
<?php $_smarty_tpl->tpl_vars["preview_id"] = new Smarty_variable(uniqid($_smarty_tpl->tpl_vars['product']->value['product_id']), null, 0);?>
<?php }?>

<div class="border-image-wrap">
<?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['image_id']->value),'images'=>$_smarty_tpl->tpl_vars['image_pair_var']->value,'link_class'=>"cm-image-previewer",'image_width'=>$_smarty_tpl->tpl_vars['image_width']->value,'image_height'=>$_smarty_tpl->tpl_vars['image_height']->value,'image_id'=>"preview[product_images_".((string)$_smarty_tpl->tpl_vars['preview_id']->value)."]"), 0);?>


<?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['image_pair']->value['image_id']){?>
            <?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['image_id'], null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['detailed_id'], null, 0);?>            
        <?php }?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'link_class'=>"cm-image-previewer hidden",'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['img_id']->value),'image_width'=>$_smarty_tpl->tpl_vars['image_width']->value,'image_height'=>$_smarty_tpl->tpl_vars['image_height']->value,'image_id'=>"preview[product_images_".((string)$_smarty_tpl->tpl_vars['preview_id']->value)."]"), 0);?>

    <?php }?>
<?php } ?>
</div>

<?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']){?>
    <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['thumbnails_gallery']=="Y"){?>
    <input type="hidden" name="no_cache" value="1" />
    <ul class="product-thumbnails center jcarousel-skin cm-image-gallery" id="images_preview_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['image_pair_var']->value){?><li><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-gallery-item cm-thumbnails-mini active thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair_var']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['image_id']->value)."_mini"), 0);?>
</a></li><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']){?><?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?><li><?php if ($_smarty_tpl->tpl_vars['image_pair']->value['image_id']){?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['image_id'], null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['detailed_id'], null, 0);?><?php }?><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-gallery-item cm-thumbnails-mini thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['img_id']->value)."_mini"), 0);?>
</a></li><?php }?><?php } ?><?php }?></ul>
    <?php }else{ ?>
        <div class="product-thumbnails center cm-image-gallery" id="images_preview_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
" style="width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_width']->value, ENT_QUOTES, 'UTF-8');?>
px;">
        <?php if ($_smarty_tpl->tpl_vars['image_pair_var']->value){?><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-thumbnails-mini active thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair_var']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['image_id']->value)."_mini"), 0);?>
</a><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['image_pairs']){?><?php  $_smarty_tpl->tpl_vars["image_pair"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image_pair"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image_pair"]->key => $_smarty_tpl->tpl_vars["image_pair"]->value){
$_smarty_tpl->tpl_vars["image_pair"]->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value){?><?php if ($_smarty_tpl->tpl_vars['image_pair']->value['image_id']==0){?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['detailed_id'], null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["img_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_pair']->value['image_id'], null, 0);?><?php }?><a data-ca-gallery-large-id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['preview_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-thumbnails-mini thumbnails-item"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['image_pair']->value,'image_width'=>$_smarty_tpl->tpl_vars['th_size']->value,'image_height'=>$_smarty_tpl->tpl_vars['th_size']->value,'show_detailed_link'=>false,'obj_id'=>((string)$_smarty_tpl->tpl_vars['preview_id']->value)."_".((string)$_smarty_tpl->tpl_vars['img_id']->value)."_mini"), 0);?>
</a><?php }?><?php } ?><?php }?>
        </div>
    <?php }?>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ("common/previewer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo smarty_function_script(array('src'=>"js/tygh/product_image_gallery.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:product_images")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:product_images"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:product_images"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php }} ?>