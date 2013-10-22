<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:13
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/list_templates/simple_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1180831469526655598368e0-43192934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fee23678cd3cf402ecd350931c857ea9defe3abf' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/list_templates/simple_list.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1180831469526655598368e0-43192934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'obj_id' => 0,
    'form_open' => 0,
    'item_number' => 0,
    'name' => 0,
    'sku' => 0,
    'rating' => 0,
    'hide_price' => 0,
    'show_old_price' => 0,
    'show_clean_price' => 0,
    'show_list_discount' => 0,
    'old_price' => 0,
    'details_page' => 0,
    'price' => 0,
    'clean_price' => 0,
    'list_discount' => 0,
    'show_discount_label' => 0,
    'discount_label' => 0,
    'capture_options_vs_qty' => 0,
    'product_amount' => 0,
    'show_features' => 0,
    'show_descr' => 0,
    'product_features' => 0,
    'prod_descr' => 0,
    'product_options' => 0,
    'hide_qty' => 0,
    'qty' => 0,
    'advanced_options' => 0,
    'min_qty' => 0,
    'product_edp' => 0,
    'capture_buttons' => 0,
    'show_add_to_cart' => 0,
    'add_to_cart' => 0,
    'list_buttons' => 0,
    'form_close' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665559b8b332_36412353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665559b8b332_36412353')) {function content_52665559b8b332_36412353($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if ($_smarty_tpl->tpl_vars['product']->value){?>
<?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['product_id'] : $tmp), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("common/product_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

<div class="product-container clearfix">
    <?php $_smarty_tpl->tpl_vars["form_open"] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_open']->value];?>

        <?php if ($_smarty_tpl->tpl_vars['item_number']->value=="Y"){?><strong><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'], ENT_QUOTES, 'UTF-8');?>
.&nbsp;</strong><?php }?>
        <?php $_smarty_tpl->tpl_vars["name"] = new Smarty_variable("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['name']->value];?>

        <?php $_smarty_tpl->tpl_vars["sku"] = new Smarty_variable("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['sku']->value];?>

        <?php $_smarty_tpl->tpl_vars["rating"] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['rating']->value];?>

        
        <?php if (!$_smarty_tpl->tpl_vars['hide_price']->value){?>
        <div class="prices-container clearfix">
        <?php if ($_smarty_tpl->tpl_vars['show_old_price']->value||$_smarty_tpl->tpl_vars['show_clean_price']->value||$_smarty_tpl->tpl_vars['show_list_discount']->value){?>
            <div class="float-left product-prices">
                <?php $_smarty_tpl->tpl_vars["old_price"] = new Smarty_variable("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])){?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value];?>
&nbsp;<?php }?>
        <?php }?>
        
        <?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?><p><?php }?>
                <?php $_smarty_tpl->tpl_vars["price"] = new Smarty_variable("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['price']->value];?>

        <?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?></p><?php }?>

        <?php if ($_smarty_tpl->tpl_vars['show_old_price']->value||$_smarty_tpl->tpl_vars['show_clean_price']->value||$_smarty_tpl->tpl_vars['show_list_discount']->value){?>
                <?php $_smarty_tpl->tpl_vars["clean_price"] = new Smarty_variable("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value];?>

                
                <?php $_smarty_tpl->tpl_vars["list_discount"] = new Smarty_variable("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value];?>

            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['show_discount_label']->value){?>
            <div class="float-left">
                <?php $_smarty_tpl->tpl_vars["discount_label"] = new Smarty_variable("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['discount_label']->value];?>

            </div>
        <?php }?>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php }?>
        <?php $_smarty_tpl->tpl_vars["product_amount"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_amount']->value];?>

        
        <?php if ($_smarty_tpl->tpl_vars['show_features']->value||$_smarty_tpl->tpl_vars['show_descr']->value){?>
            <p class="product-descr"><strong><?php $_smarty_tpl->tpl_vars["product_features"] = new Smarty_variable("product_features_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_features']->value];?>
</strong><?php $_smarty_tpl->tpl_vars["prod_descr"] = new Smarty_variable("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['prod_descr']->value];?>
</p>
        <?php }?>
        
        <?php $_smarty_tpl->tpl_vars["product_options"] = new Smarty_variable("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_options']->value];?>

        
        <?php if (!$_smarty_tpl->tpl_vars['hide_qty']->value){?>
            <?php $_smarty_tpl->tpl_vars["qty"] = new Smarty_variable("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['qty']->value];?>

        <?php }?>
        
        <?php $_smarty_tpl->tpl_vars["advanced_options"] = new Smarty_variable("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['advanced_options']->value];?>

        <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
        
        <?php $_smarty_tpl->tpl_vars["min_qty"] = new Smarty_variable("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['min_qty']->value];?>

        
        <?php $_smarty_tpl->tpl_vars["product_edp"] = new Smarty_variable("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_edp']->value];?>


        <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['show_add_to_cart']->value){?>
            <div class="buttons-container">
                <?php $_smarty_tpl->tpl_vars["add_to_cart"] = new Smarty_variable("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['add_to_cart']->value];?>


                <?php $_smarty_tpl->tpl_vars["list_buttons"] = new Smarty_variable("list_buttons_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_buttons']->value];?>

            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
    <?php $_smarty_tpl->tpl_vars["form_close"] = new Smarty_variable("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_close']->value];?>

</div>

<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/list_templates/simple_list.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/list_templates/simple_list.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['product']->value){?>
<?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['product_id'] : $tmp), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("common/product_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

<div class="product-container clearfix">
    <?php $_smarty_tpl->tpl_vars["form_open"] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_open']->value];?>

        <?php if ($_smarty_tpl->tpl_vars['item_number']->value=="Y"){?><strong><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'], ENT_QUOTES, 'UTF-8');?>
.&nbsp;</strong><?php }?>
        <?php $_smarty_tpl->tpl_vars["name"] = new Smarty_variable("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['name']->value];?>

        <?php $_smarty_tpl->tpl_vars["sku"] = new Smarty_variable("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['sku']->value];?>

        <?php $_smarty_tpl->tpl_vars["rating"] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['rating']->value];?>

        
        <?php if (!$_smarty_tpl->tpl_vars['hide_price']->value){?>
        <div class="prices-container clearfix">
        <?php if ($_smarty_tpl->tpl_vars['show_old_price']->value||$_smarty_tpl->tpl_vars['show_clean_price']->value||$_smarty_tpl->tpl_vars['show_list_discount']->value){?>
            <div class="float-left product-prices">
                <?php $_smarty_tpl->tpl_vars["old_price"] = new Smarty_variable("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])){?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value];?>
&nbsp;<?php }?>
        <?php }?>
        
        <?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?><p><?php }?>
                <?php $_smarty_tpl->tpl_vars["price"] = new Smarty_variable("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['price']->value];?>

        <?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?></p><?php }?>

        <?php if ($_smarty_tpl->tpl_vars['show_old_price']->value||$_smarty_tpl->tpl_vars['show_clean_price']->value||$_smarty_tpl->tpl_vars['show_list_discount']->value){?>
                <?php $_smarty_tpl->tpl_vars["clean_price"] = new Smarty_variable("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value];?>

                
                <?php $_smarty_tpl->tpl_vars["list_discount"] = new Smarty_variable("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value];?>

            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['show_discount_label']->value){?>
            <div class="float-left">
                <?php $_smarty_tpl->tpl_vars["discount_label"] = new Smarty_variable("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['discount_label']->value];?>

            </div>
        <?php }?>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php }?>
        <?php $_smarty_tpl->tpl_vars["product_amount"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_amount']->value];?>

        
        <?php if ($_smarty_tpl->tpl_vars['show_features']->value||$_smarty_tpl->tpl_vars['show_descr']->value){?>
            <p class="product-descr"><strong><?php $_smarty_tpl->tpl_vars["product_features"] = new Smarty_variable("product_features_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_features']->value];?>
</strong><?php $_smarty_tpl->tpl_vars["prod_descr"] = new Smarty_variable("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['prod_descr']->value];?>
</p>
        <?php }?>
        
        <?php $_smarty_tpl->tpl_vars["product_options"] = new Smarty_variable("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_options']->value];?>

        
        <?php if (!$_smarty_tpl->tpl_vars['hide_qty']->value){?>
            <?php $_smarty_tpl->tpl_vars["qty"] = new Smarty_variable("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['qty']->value];?>

        <?php }?>
        
        <?php $_smarty_tpl->tpl_vars["advanced_options"] = new Smarty_variable("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['advanced_options']->value];?>

        <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
        
        <?php $_smarty_tpl->tpl_vars["min_qty"] = new Smarty_variable("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['min_qty']->value];?>

        
        <?php $_smarty_tpl->tpl_vars["product_edp"] = new Smarty_variable("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_edp']->value];?>


        <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['show_add_to_cart']->value){?>
            <div class="buttons-container">
                <?php $_smarty_tpl->tpl_vars["add_to_cart"] = new Smarty_variable("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['add_to_cart']->value];?>


                <?php $_smarty_tpl->tpl_vars["list_buttons"] = new Smarty_variable("list_buttons_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_buttons']->value];?>

            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
    <?php $_smarty_tpl->tpl_vars["form_close"] = new Smarty_variable("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_close']->value];?>

</div>

<?php }?><?php }?><?php }} ?>