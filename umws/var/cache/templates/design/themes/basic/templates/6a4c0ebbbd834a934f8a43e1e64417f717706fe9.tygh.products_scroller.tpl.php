<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:13
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/products/products_scroller.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3984559055266555953f0d2-84656505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a4c0ebbbd834a934f8a43e1e64417f717706fe9' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/products/products_scroller.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '3984559055266555953f0d2-84656505',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'items' => 0,
    'delim_width' => 0,
    'text_h' => 0,
    'image_h' => 0,
    'item_qty' => 0,
    'product' => 0,
    'item_width' => 0,
    'object_img' => 0,
    'quick_nav_ids' => 0,
    '_show_add_to_cart' => 0,
    '_hide_price' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665559785fc8_46380560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665559785fc8_46380560')) {function content_52665559785fc8_46380560($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>

<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['enable_quick_view']=="Y"){?>
<?php $_smarty_tpl->tpl_vars['quick_nav_ids'] = new Smarty_variable(fn_fields_from_multi_level($_smarty_tpl->tpl_vars['items']->value,"product_id","product_id"), null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["obj_prefix"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000", null, 0);?>

<?php $_smarty_tpl->tpl_vars["delim_width"] = new Smarty_variable("50", null, 0);?>
<?php echo smarty_function_math(array('equation'=>"delim_w + image_w",'assign'=>"item_width",'image_w'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'delim_w'=>$_smarty_tpl->tpl_vars['delim_width']->value),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars["item_qty"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'], null, 0);?>

    <ul id="scroll_list_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" class="jcarousel jcarousel-skin hidden">
        <?php $_smarty_tpl->tpl_vars["image_h"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["text_h"] = new Smarty_variable("65", null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['hide_add_to_cart_button']=="N"){?>
        <?php echo smarty_function_math(array('equation'=>"text_h + 70",'assign'=>"text_h",'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value),$_smarty_tpl);?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['show_price']=="Y"){?>
        <?php echo smarty_function_math(array('equation'=>"text_h + 28",'assign'=>"text_h",'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value),$_smarty_tpl);?>

        <?php }?>

        <?php echo smarty_function_math(array('equation'=>"item_qty + image_h + text_h",'assign'=>"item_height",'image_h'=>$_smarty_tpl->tpl_vars['image_h']->value,'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value,'item_qty'=>$_smarty_tpl->tpl_vars['item_qty']->value),$_smarty_tpl);?>


        <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value){
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
            <li>
            <?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable("scr_".((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["object_img"] = new Smarty_variable($_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('image_width'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair'],'no_ids'=>true), 0));?>

            <div class="jscroll-item" style="width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_width']->value, ENT_QUOTES, 'UTF-8');?>
">
                <div class="center product-image" style="height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_h']->value, ENT_QUOTES, 'UTF-8');?>
px;">
                    <a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['object_img']->value;?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['enable_quick_view']=="Y"){?>
                        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/quick_view_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('quick_nav_ids'=>$_smarty_tpl->tpl_vars['quick_nav_ids']->value), 0);?>

                    <?php }?>
                </div>
                <div class="center compact"<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="up"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="down"){?> style="height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text_h']->value, ENT_QUOTES, 'UTF-8');?>
px;"<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['hide_add_to_cart_button']=="Y"){?>
                        <?php $_smarty_tpl->tpl_vars["_show_add_to_cart"] = new Smarty_variable(false, null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["_show_add_to_cart"] = new Smarty_variable(true, null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['show_price']=="Y"){?>
                        <?php $_smarty_tpl->tpl_vars["_hide_price"] = new Smarty_variable(false, null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["_hide_price"] = new Smarty_variable(true, null, 0);?>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("blocks/list_templates/simple_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'show_trunc_name'=>true,'show_price'=>true,'show_add_to_cart'=>$_smarty_tpl->tpl_vars['_show_add_to_cart']->value,'but_role'=>"action",'hide_price'=>$_smarty_tpl->tpl_vars['_hide_price']->value,'hide_qty'=>true), 0);?>

                </div>
            </div>
            </li>
        <?php } ?>
    </ul>

<?php echo $_smarty_tpl->getSubTemplate ("common/scroller_init.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/products/products_scroller.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/products/products_scroller.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?>

<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['enable_quick_view']=="Y"){?>
<?php $_smarty_tpl->tpl_vars['quick_nav_ids'] = new Smarty_variable(fn_fields_from_multi_level($_smarty_tpl->tpl_vars['items']->value,"product_id","product_id"), null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["obj_prefix"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000", null, 0);?>

<?php $_smarty_tpl->tpl_vars["delim_width"] = new Smarty_variable("50", null, 0);?>
<?php echo smarty_function_math(array('equation'=>"delim_w + image_w",'assign'=>"item_width",'image_w'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'delim_w'=>$_smarty_tpl->tpl_vars['delim_width']->value),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars["item_qty"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'], null, 0);?>

    <ul id="scroll_list_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" class="jcarousel jcarousel-skin hidden">
        <?php $_smarty_tpl->tpl_vars["image_h"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["text_h"] = new Smarty_variable("65", null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['hide_add_to_cart_button']=="N"){?>
        <?php echo smarty_function_math(array('equation'=>"text_h + 70",'assign'=>"text_h",'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value),$_smarty_tpl);?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['show_price']=="Y"){?>
        <?php echo smarty_function_math(array('equation'=>"text_h + 28",'assign'=>"text_h",'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value),$_smarty_tpl);?>

        <?php }?>

        <?php echo smarty_function_math(array('equation'=>"item_qty + image_h + text_h",'assign'=>"item_height",'image_h'=>$_smarty_tpl->tpl_vars['image_h']->value,'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value,'item_qty'=>$_smarty_tpl->tpl_vars['item_qty']->value),$_smarty_tpl);?>


        <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value){
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
            <li>
            <?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable("scr_".((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["object_img"] = new Smarty_variable($_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('image_width'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair'],'no_ids'=>true), 0));?>

            <div class="jscroll-item" style="width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_width']->value, ENT_QUOTES, 'UTF-8');?>
">
                <div class="center product-image" style="height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_h']->value, ENT_QUOTES, 'UTF-8');?>
px;">
                    <a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['object_img']->value;?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['enable_quick_view']=="Y"){?>
                        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/quick_view_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('quick_nav_ids'=>$_smarty_tpl->tpl_vars['quick_nav_ids']->value), 0);?>

                    <?php }?>
                </div>
                <div class="center compact"<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="up"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="down"){?> style="height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text_h']->value, ENT_QUOTES, 'UTF-8');?>
px;"<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['hide_add_to_cart_button']=="Y"){?>
                        <?php $_smarty_tpl->tpl_vars["_show_add_to_cart"] = new Smarty_variable(false, null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["_show_add_to_cart"] = new Smarty_variable(true, null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['show_price']=="Y"){?>
                        <?php $_smarty_tpl->tpl_vars["_hide_price"] = new Smarty_variable(false, null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["_hide_price"] = new Smarty_variable(true, null, 0);?>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("blocks/list_templates/simple_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'show_trunc_name'=>true,'show_price'=>true,'show_add_to_cart'=>$_smarty_tpl->tpl_vars['_show_add_to_cart']->value,'but_role'=>"action",'hide_price'=>$_smarty_tpl->tpl_vars['_hide_price']->value,'hide_qty'=>true), 0);?>

                </div>
            </div>
            </li>
        <?php } ?>
    </ul>

<?php echo $_smarty_tpl->getSubTemplate ("common/scroller_init.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php }} ?>