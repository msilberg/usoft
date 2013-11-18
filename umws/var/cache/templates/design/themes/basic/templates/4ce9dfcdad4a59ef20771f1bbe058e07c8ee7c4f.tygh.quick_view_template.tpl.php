<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 16:31:45
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/quick_view_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:755334092528a08b1d5bba6-52037292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ce9dfcdad4a59ef20771f1bbe058e07c8ee7c4f' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/quick_view_template.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '755334092528a08b1d5bba6-52037292',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'obj_prefix' => 0,
    'obj_id' => 0,
    'form_open' => 0,
    'no_images' => 0,
    'settings' => 0,
    'view_tools' => 0,
    'hide_title' => 0,
    'prod_descr' => 0,
    'old_price' => 0,
    'clean_price' => 0,
    'list_discount' => 0,
    'details_page' => 0,
    'price' => 0,
    'show_discount_label' => 0,
    'discount_label' => 0,
    'capture_options_vs_qty' => 0,
    'product_options' => 0,
    'advanced_options' => 0,
    'sku' => 0,
    'product_amount' => 0,
    'qty' => 0,
    'min_qty' => 0,
    'product_edp' => 0,
    'capture_buttons' => 0,
    'add_to_cart' => 0,
    'list_buttons' => 0,
    'form_close' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a08b229e8d6_29800473',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a08b229e8d6_29800473')) {function content_528a08b229e8d6_29800473($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('add_to_cart','save_discount','prev_page','quick_product_viewer','next','quick_product_viewer','add_to_cart','save_discount','prev_page','quick_product_viewer','next','quick_product_viewer'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['obj_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_id'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['obj_prefix'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_prefix']->value)===null||$tmp==='' ? "ajax" : $tmp), null, 0);?>
<div class="product-main-info product-quick-view" id="product_main_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:view_main_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:view_main_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    <?php if ($_smarty_tpl->tpl_vars['product']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/product_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_prefix'=>$_smarty_tpl->tpl_vars['obj_prefix']->value,'obj_id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product'=>$_smarty_tpl->tpl_vars['product']->value,'but_role'=>"big",'but_text'=>__("add_to_cart"),'add_to_cart_meta'=>"cm-form-dialog-closer"), 0);?>


    <?php $_smarty_tpl->tpl_vars["form_open"] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_open']->value];?>

    <div class="clearfix">
        <div class ="left-side">
            <?php if (!$_smarty_tpl->tpl_vars['no_images']->value){?>
                <div class="image-border cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_images_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
_update">
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['list_discount_prc']){?>
                    <span class="thumb-discount-label"><?php echo $_smarty_tpl->__("save_discount");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_discount_prc'], ENT_QUOTES, 'UTF-8');?>
%</span>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'show_detailed_link'=>true,'image_width'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_quick_view_thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_quick_view_thumbnail_height']), 0);?>

                <!--product_images_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
_update--></div>
            <?php }?>

        </div>

        <?php if ($_smarty_tpl->tpl_vars['view_tools']->value){?>
            <a class="quick-view-switcher-icon left <?php if (!$_smarty_tpl->tpl_vars['view_tools']->value['prev_id']){?>disabled<?php }else{ ?>cm-dialog-opener cm-dialog-auto-size<?php }?>" <?php if ($_smarty_tpl->tpl_vars['view_tools']->value['prev_id']){?>href="<?php echo htmlspecialchars(fn_url(fn_query_remove($_smarty_tpl->tpl_vars['view_tools']->value['prev_url'],"skip_result_ids_check")), ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['links_label']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['links_label'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['show_item_id']){?> #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['prev_id'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->__("prev_page");?>
<?php }?>" data-ca-view-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['prev_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="product_quick_view" data-ca-dialog-title="<?php echo $_smarty_tpl->__("quick_product_viewer");?>
"<?php }?>><i class="icon-left-circle"></i></a>

            <a class="quick-view-switcher-icon right <?php if (!$_smarty_tpl->tpl_vars['view_tools']->value['next_id']){?>disabled<?php }else{ ?>cm-dialog-opener cm-dialog-auto-size<?php }?>" <?php if ($_smarty_tpl->tpl_vars['view_tools']->value['next_id']){?>href="<?php echo htmlspecialchars(fn_url(fn_query_remove($_smarty_tpl->tpl_vars['view_tools']->value['next_url'],"skip_result_ids_check")), ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['links_label']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['links_label'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['show_item_id']){?> #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['next_id'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->__("next");?>
<?php }?>" data-ca-view-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['next_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="product_quick_view" data-ca-dialog-title="<?php echo $_smarty_tpl->__("quick_product_viewer");?>
"<?php }?>><i class="icon-right-circle"></i></a>
        <?php }?>

        <div class="product-info">

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:quick_view_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:quick_view_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (!$_smarty_tpl->tpl_vars['hide_title']->value){?><h1><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="quick-view-title"><?php echo $_smarty_tpl->tpl_vars['product']->value['product'];?>
</a></h1><?php }?>

            <div class="brand-wrapper">
                <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('features'=>$_smarty_tpl->tpl_vars['product']->value['header_features']), 0);?>

            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:quick_view_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            <hr class="indented" />

            <?php $_smarty_tpl->tpl_vars["prod_descr"] = new Smarty_variable("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['prod_descr']->value])){?>
                <div class="product-description indented"><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['prod_descr']->value];?>
</div>            
            <?php }?>

            <div class="product-note">
                <?php echo $_smarty_tpl->tpl_vars['product']->value['promo_text'];?>

            </div>
            
            <div class="<?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?>prices-container <?php }?>price-wrap clearfix">
                <?php $_smarty_tpl->tpl_vars["old_price"] = new Smarty_variable("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["price"] = new Smarty_variable("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["clean_price"] = new Smarty_variable("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["list_discount"] = new Smarty_variable("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["discount_label"] = new Smarty_variable("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>

                 <div class="<?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?>prices-container <?php }?>price-wrap clearfix"><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?><div class="float-left product-prices"><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])){?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value];?>
&nbsp;<?php }?><?php }?><?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?><p class="actual-price"><?php }?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['price']->value];?>
<?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?></p><?php }?><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value];?>
<?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value];?>
</div><?php }?></div>
             

                <?php if ($_smarty_tpl->tpl_vars['show_discount_label']->value&&trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['discount_label']->value])){?>
                    <div class="float-left">
                        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['discount_label']->value];?>

                    </div>
                <?php }?>

            </div>
            
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php echo Smarty::$_smarty_vars['capture']['product_options'];?>
<?php }?>
                <div class="options-wrapper indented">
                    <?php $_smarty_tpl->tpl_vars["product_options"] = new Smarty_variable("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_options']->value];?>

                </div>
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
                <div class="indented">
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php echo Smarty::$_smarty_vars['capture']['product_options'];?>
<?php }?>
                <?php $_smarty_tpl->tpl_vars["advanced_options"] = new Smarty_variable("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['advanced_options']->value];?>

            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
                    <?php $_smarty_tpl->tpl_vars['sku'] = new Smarty_variable("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['sku']->value];?>

                </div>  
            
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php echo Smarty::$_smarty_vars['capture']['product_options'];?>
<?php }?>              
            <div class="indented">
                <div class="product-fields-group">
                    <?php $_smarty_tpl->tpl_vars["product_amount"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_amount']->value];?>


                    <?php $_smarty_tpl->tpl_vars["qty"] = new Smarty_variable("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['qty']->value];?>


                    <?php $_smarty_tpl->tpl_vars["min_qty"] = new Smarty_variable("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['min_qty']->value];?>

                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?> 
            
            <?php $_smarty_tpl->tpl_vars["product_edp"] = new Smarty_variable("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_edp']->value];?>


            <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?><?php }?>
                    
                    <?php $_smarty_tpl->tpl_vars["add_to_cart"] = new Smarty_variable("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['add_to_cart']->value];?>


                    <?php $_smarty_tpl->tpl_vars["list_buttons"] = new Smarty_variable("list_buttons_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_buttons']->value];?>


                
            <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
    </div>
</div>
<?php $_smarty_tpl->tpl_vars["form_close"] = new Smarty_variable("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
<?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_close']->value];?>

<?php }?>

<?php if (Smarty::$_smarty_vars['capture']['hide_form_changed']=="Y"){?>
    <?php $_smarty_tpl->tpl_vars["hide_form"] = new Smarty_variable(Smarty::$_smarty_vars['capture']['orig_val_hide_form'], null, 0);?>
<?php }?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:view_main_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!--product_main_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
--></div>

<div class="product-details">
</div>

<!-- <?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars["details_page"] = new Smarty_variable(true, null, 0);?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?> --><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/quick_view_template.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/quick_view_template.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['obj_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_id'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['obj_prefix'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_prefix']->value)===null||$tmp==='' ? "ajax" : $tmp), null, 0);?>
<div class="product-main-info product-quick-view" id="product_main_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:view_main_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:view_main_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    <?php if ($_smarty_tpl->tpl_vars['product']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/product_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('obj_prefix'=>$_smarty_tpl->tpl_vars['obj_prefix']->value,'obj_id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product'=>$_smarty_tpl->tpl_vars['product']->value,'but_role'=>"big",'but_text'=>__("add_to_cart"),'add_to_cart_meta'=>"cm-form-dialog-closer"), 0);?>


    <?php $_smarty_tpl->tpl_vars["form_open"] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_open']->value];?>

    <div class="clearfix">
        <div class ="left-side">
            <?php if (!$_smarty_tpl->tpl_vars['no_images']->value){?>
                <div class="image-border cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_images_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
_update">
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['list_discount_prc']){?>
                    <span class="thumb-discount-label"><?php echo $_smarty_tpl->__("save_discount");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_discount_prc'], ENT_QUOTES, 'UTF-8');?>
%</span>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'show_detailed_link'=>true,'image_width'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_quick_view_thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['settings']->value['Thumbnails']['product_quick_view_thumbnail_height']), 0);?>

                <!--product_images_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
_update--></div>
            <?php }?>

        </div>

        <?php if ($_smarty_tpl->tpl_vars['view_tools']->value){?>
            <a class="quick-view-switcher-icon left <?php if (!$_smarty_tpl->tpl_vars['view_tools']->value['prev_id']){?>disabled<?php }else{ ?>cm-dialog-opener cm-dialog-auto-size<?php }?>" <?php if ($_smarty_tpl->tpl_vars['view_tools']->value['prev_id']){?>href="<?php echo htmlspecialchars(fn_url(fn_query_remove($_smarty_tpl->tpl_vars['view_tools']->value['prev_url'],"skip_result_ids_check")), ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['links_label']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['links_label'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['show_item_id']){?> #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['prev_id'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->__("prev_page");?>
<?php }?>" data-ca-view-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['prev_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="product_quick_view" data-ca-dialog-title="<?php echo $_smarty_tpl->__("quick_product_viewer");?>
"<?php }?>><i class="icon-left-circle"></i></a>

            <a class="quick-view-switcher-icon right <?php if (!$_smarty_tpl->tpl_vars['view_tools']->value['next_id']){?>disabled<?php }else{ ?>cm-dialog-opener cm-dialog-auto-size<?php }?>" <?php if ($_smarty_tpl->tpl_vars['view_tools']->value['next_id']){?>href="<?php echo htmlspecialchars(fn_url(fn_query_remove($_smarty_tpl->tpl_vars['view_tools']->value['next_url'],"skip_result_ids_check")), ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['links_label']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['links_label'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['view_tools']->value['show_item_id']){?> #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['next_id'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->__("next");?>
<?php }?>" data-ca-view-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view_tools']->value['next_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="product_quick_view" data-ca-dialog-title="<?php echo $_smarty_tpl->__("quick_product_viewer");?>
"<?php }?>><i class="icon-right-circle"></i></a>
        <?php }?>

        <div class="product-info">

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:quick_view_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:quick_view_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (!$_smarty_tpl->tpl_vars['hide_title']->value){?><h1><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="quick-view-title"><?php echo $_smarty_tpl->tpl_vars['product']->value['product'];?>
</a></h1><?php }?>

            <div class="brand-wrapper">
                <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('features'=>$_smarty_tpl->tpl_vars['product']->value['header_features']), 0);?>

            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:quick_view_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            <hr class="indented" />

            <?php $_smarty_tpl->tpl_vars["prod_descr"] = new Smarty_variable("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['prod_descr']->value])){?>
                <div class="product-description indented"><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['prod_descr']->value];?>
</div>            
            <?php }?>

            <div class="product-note">
                <?php echo $_smarty_tpl->tpl_vars['product']->value['promo_text'];?>

            </div>
            
            <div class="<?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?>prices-container <?php }?>price-wrap clearfix">
                <?php $_smarty_tpl->tpl_vars["old_price"] = new Smarty_variable("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["price"] = new Smarty_variable("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["clean_price"] = new Smarty_variable("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["list_discount"] = new Smarty_variable("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["discount_label"] = new Smarty_variable("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>

                 <div class="<?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?>prices-container <?php }?>price-wrap clearfix"><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?><div class="float-left product-prices"><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])){?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value];?>
&nbsp;<?php }?><?php }?><?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?><p class="actual-price"><?php }?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['price']->value];?>
<?php if (!trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||$_smarty_tpl->tpl_vars['details_page']->value){?></p><?php }?><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['old_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value])||trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value])){?><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['clean_price']->value];?>
<?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_discount']->value];?>
</div><?php }?></div>
             

                <?php if ($_smarty_tpl->tpl_vars['show_discount_label']->value&&trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['discount_label']->value])){?>
                    <div class="float-left">
                        <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['discount_label']->value];?>

                    </div>
                <?php }?>

            </div>
            
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php echo Smarty::$_smarty_vars['capture']['product_options'];?>
<?php }?>
                <div class="options-wrapper indented">
                    <?php $_smarty_tpl->tpl_vars["product_options"] = new Smarty_variable("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_options']->value];?>

                </div>
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
                <div class="indented">
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php echo Smarty::$_smarty_vars['capture']['product_options'];?>
<?php }?>
                <?php $_smarty_tpl->tpl_vars["advanced_options"] = new Smarty_variable("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['advanced_options']->value];?>

            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
                    <?php $_smarty_tpl->tpl_vars['sku'] = new Smarty_variable("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['sku']->value];?>

                </div>  
            
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_options", null, null); ob_start(); ?><?php echo Smarty::$_smarty_vars['capture']['product_options'];?>
<?php }?>              
            <div class="indented">
                <div class="product-fields-group">
                    <?php $_smarty_tpl->tpl_vars["product_amount"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_amount']->value];?>


                    <?php $_smarty_tpl->tpl_vars["qty"] = new Smarty_variable("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['qty']->value];?>


                    <?php $_smarty_tpl->tpl_vars["min_qty"] = new Smarty_variable("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['min_qty']->value];?>

                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?> 
            
            <?php $_smarty_tpl->tpl_vars["product_edp"] = new Smarty_variable("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['product_edp']->value];?>


            <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?><?php }?>
                    
                    <?php $_smarty_tpl->tpl_vars["add_to_cart"] = new Smarty_variable("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['add_to_cart']->value];?>


                    <?php $_smarty_tpl->tpl_vars["list_buttons"] = new Smarty_variable("list_buttons_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['list_buttons']->value];?>


                
            <?php if ($_smarty_tpl->tpl_vars['capture_buttons']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
    </div>
</div>
<?php $_smarty_tpl->tpl_vars["form_close"] = new Smarty_variable("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
<?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_close']->value];?>

<?php }?>

<?php if (Smarty::$_smarty_vars['capture']['hide_form_changed']=="Y"){?>
    <?php $_smarty_tpl->tpl_vars["hide_form"] = new Smarty_variable(Smarty::$_smarty_vars['capture']['orig_val_hide_form'], null, 0);?>
<?php }?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:view_main_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!--product_main_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
--></div>

<div class="product-details">
</div>

<!-- <?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars["details_page"] = new Smarty_variable(true, null, 0);?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?> --><?php }?><?php }} ?>