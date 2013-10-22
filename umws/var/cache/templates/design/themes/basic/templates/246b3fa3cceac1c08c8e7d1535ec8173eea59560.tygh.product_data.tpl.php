<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:13
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/common/product_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112013355552665559b91262-13776729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '246b3fa3cceac1c08c8e7d1535ec8173eea59560' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/common/product_data.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '112013355552665559b91262-13776729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'settings' => 0,
    'auth' => 0,
    'show_price_values' => 0,
    'show_qty' => 0,
    'obj_id' => 0,
    'config' => 0,
    'no_ajax' => 0,
    'hide_form' => 0,
    'obj_prefix' => 0,
    'is_ajax' => 0,
    'form_meta' => 0,
    'stay_in_cart' => 0,
    'redirect_url' => 0,
    'no_capture' => 0,
    'capture_name' => 0,
    'show_name' => 0,
    'hide_links' => 0,
    'show_trunc_name' => 0,
    'show_sku' => 0,
    'show_add_to_cart' => 0,
    'add_to_cart_class' => 0,
    'separate_buttons' => 0,
    'show_list_buttons' => 0,
    'but_role' => 0,
    'quick_view' => 0,
    'show_product_options' => 0,
    'details_page' => 0,
    'opt_but_role' => 0,
    'extra_button' => 0,
    'block_width' => 0,
    'add_to_cart_meta' => 0,
    'product_amount' => 0,
    'out_of_stock_text' => 0,
    'product_notification_enabled' => 0,
    'ldelim' => 0,
    'rdelim' => 0,
    'product_notification_email' => 0,
    'capture_buy_now' => 0,
    'cart_button_exists' => 0,
    'show_features' => 0,
    'show_descr' => 0,
    'show_old_price' => 0,
    'show_price' => 0,
    'hide_add_to_cart_button' => 0,
    'currencies' => 0,
    'base_currency' => 0,
    'show_clean_price' => 0,
    'show_list_discount' => 0,
    'show_discount_label' => 0,
    'show_product_amount' => 0,
    'disable_ids' => 0,
    'capture_options_vs_qty' => 0,
    '_disable_ids' => 0,
    'hide_qty_label' => 0,
    'quantity_text' => 0,
    'a_name' => 0,
    'var' => 0,
    'selected_amount' => 0,
    'default_amount' => 0,
    'bulk_add' => 0,
    'min_qty' => 0,
    'show_edp' => 0,
    'images' => 0,
    'image' => 0,
    'object_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266555b2755e8_17840062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266555b2755e8_17840062')) {function content_5266555b2755e8_17840062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/modifier.truncate.php';
if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('text_combination_out_of_stock','text_out_of_stock','sku','select_options','notify_when_back_in_stock','email','enter_email','enter_email','go','go','old_price','list_price','enter_your_price','contact_us_for_price','sign_in_to_view_price','inc_tax','including_tax','you_save','you_save','save_discount','availability','items','in_stock','availability','in_stock','availability','quantity','text_cart_min_qty','text_edp_product','text_combination_out_of_stock','text_out_of_stock','sku','select_options','notify_when_back_in_stock','email','enter_email','enter_email','go','go','old_price','list_price','enter_your_price','contact_us_for_price','sign_in_to_view_price','inc_tax','including_tax','you_save','you_save','save_discount','availability','items','in_stock','availability','in_stock','availability','quantity','text_cart_min_qty','text_edp_product'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if ($_smarty_tpl->tpl_vars['product']->value['tracking']=="O"){?>
    <?php $_smarty_tpl->tpl_vars["out_of_stock_text"] = new Smarty_variable($_smarty_tpl->__("text_combination_out_of_stock"), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["out_of_stock_text"] = new Smarty_variable($_smarty_tpl->__("text_out_of_stock"), null, 0);?>
<?php }?>

<?php if ((floatval($_smarty_tpl->tpl_vars['product']->value['price'])||$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="P"||$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="A"||(!floatval($_smarty_tpl->tpl_vars['product']->value['price'])&&$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="R"))&&!($_smarty_tpl->tpl_vars['settings']->value['General']['allow_anonymous_shopping']=="hide_price_and_add_to_cart"&&!$_smarty_tpl->tpl_vars['auth']->value['user_id'])){?>
    <?php $_smarty_tpl->tpl_vars["show_price_values"] = new Smarty_variable(true, null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["show_price_values"] = new Smarty_variable(false, null, 0);?>
<?php }?>
<?php $_smarty_tpl->_capture_stack[0][] = array("show_price_values", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->tpl_vars["cart_button_exists"] = new Smarty_variable(false, null, 0);?>
<?php $_smarty_tpl->tpl_vars["show_qty"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['show_qty']->value)===null||$tmp==='' ? true : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['product_id'] : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["product_amount"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['product']->value['inventory_amount'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['amount'] : $tmp), null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['config']->value['tweaks']['disable_dhtml']&&!$_smarty_tpl->tpl_vars['no_ajax']->value){?>
    <?php $_smarty_tpl->tpl_vars["is_ajax"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if (!$_smarty_tpl->tpl_vars['hide_form']->value){?>
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="product_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data" class="cm-disable-empty-files <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value){?> cm-ajax cm-ajax-full-render cm-ajax-status-middle<?php }?> <?php if ($_smarty_tpl->tpl_vars['form_meta']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>">
<input type="hidden" name="result_ids" value="cart_status*,wish_list*,checkout*,account_info*" />
<?php if (!$_smarty_tpl->tpl_vars['stay_in_cart']->value){?>
<input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['redirect_url']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['config']->value['current_url'] : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>
<input type="hidden" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][product_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_name']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?><strong><?php }else{ ?><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="product-title"><?php }?><?php echo $_smarty_tpl->tpl_vars['product']->value['product'];?>
<?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?></strong><?php }else{ ?></a><?php }?>
    <?php }elseif($_smarty_tpl->tpl_vars['show_trunc_name']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?><strong><?php }else{ ?><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="product-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['product']), ENT_QUOTES, 'UTF-8');?>
"><?php }?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['product'],45,"...",true);?>
<?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?></strong><?php }else{ ?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_sku']->value){?>
        <div class="control-group product-list-field cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['product']->value['product_code']){?> hidden<?php }?>" id="sku_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_sku]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_sku']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <label id="sku_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("sku");?>
:</label>
            <span id="product_code_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_code'], ENT_QUOTES, 'UTF-8');?>
</span>
        <!--sku_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:data_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:data_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:data_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if ($_smarty_tpl->tpl_vars['show_add_to_cart']->value){?>
<div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['add_to_cart_class']->value, ENT_QUOTES, 'UTF-8');?>
" id="add_to_cart_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="appearance[show_add_to_cart]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_add_to_cart']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[separate_buttons]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['separate_buttons']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[show_list_buttons]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_list_buttons']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[but_role]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_role']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[quick_view]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['quick_view']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons_product", null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:add_to_cart")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:add_to_cart"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['has_options']&&!$_smarty_tpl->tpl_vars['show_product_options']->value&&!$_smarty_tpl->tpl_vars['details_page']->value){?><?php if ($_smarty_tpl->tpl_vars['but_role']->value=="text"){?><?php $_smarty_tpl->tpl_vars['opt_but_role'] = new Smarty_variable("text", null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['opt_but_role'] = new Smarty_variable("action", null, 0);?><?php }?><?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_id'=>"button_cart_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'but_text'=>__("select_options"),'but_href'=>"products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'but_role'=>$_smarty_tpl->tpl_vars['opt_but_role']->value,'but_name'=>''), 0);?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['extra_button']->value){?><?php echo $_smarty_tpl->tpl_vars['extra_button']->value;?>
&nbsp;<?php }?><?php echo $_smarty_tpl->getSubTemplate ("buttons/add_to_cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_id'=>"button_cart_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'but_name'=>"dispatch[checkout.add..".((string)$_smarty_tpl->tpl_vars['obj_id']->value)."]",'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value,'block_width'=>$_smarty_tpl->tpl_vars['block_width']->value,'obj_id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product'=>$_smarty_tpl->tpl_vars['product']->value,'but_meta'=>$_smarty_tpl->tpl_vars['add_to_cart_meta']->value), 0);?>
<?php $_smarty_tpl->tpl_vars["cart_button_exists"] = new Smarty_variable(true, null, 0);?><?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:add_to_cart"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:buttons_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:buttons_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if (!($_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="R"&&$_smarty_tpl->tpl_vars['product']->value['price']==0)&&!($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"&&(($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['product']->value['tracking']!="D")&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!="Y")||($_smarty_tpl->tpl_vars['product']->value['has_options']&&!$_smarty_tpl->tpl_vars['show_product_options']->value)){?><?php if (trim(Smarty::$_smarty_vars['capture']['buttons_product'])!='&nbsp;'){?><<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value&&!$_smarty_tpl->tpl_vars['quick_view']->value){?>div class="buttons-container"<?php }elseif($_smarty_tpl->tpl_vars['separate_buttons']->value&&$_smarty_tpl->tpl_vars['quick_view']->value){?>div class="qv-buttons-container"<?php }else{ ?>span<?php }?> id="cart_add_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value['avail_since']<=@constant('TIME')||($_smarty_tpl->tpl_vars['product']->value['avail_since']>@constant('TIME')&&$_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']=="B")){?><?php echo Smarty::$_smarty_vars['capture']['buttons_product'];?>
<?php }?></<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?>div<?php }else{ ?>span<?php }?>><?php }?><?php }elseif(($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"&&(($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['product']->value['tracking']!="D")&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!="Y")){?><?php $_smarty_tpl->tpl_vars["show_qty"] = new Smarty_variable(false, null, 0);?><?php if (!$_smarty_tpl->tpl_vars['details_page']->value){?><?php if ((!$_smarty_tpl->tpl_vars['product']->value['hide_stock_info']&&!(($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&($_smarty_tpl->tpl_vars['product']->value['avail_since']>@constant('TIME'))))){?><span class="qty-out-of-stock" id="out_of_stock_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['out_of_stock_text']->value, ENT_QUOTES, 'UTF-8');?>
</span><?php }?><?php }elseif((($_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']=="S")&&($_smarty_tpl->tpl_vars['product']->value['tracking']!="O"))){?><div class="control-group"><label for="product_notify_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><input id="product_notify_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" type="checkbox" class="checkbox" name="product_notify" <?php if ($_smarty_tpl->tpl_vars['product_notification_enabled']->value=="Y"){?>checked="checked"<?php }?> onclick="<?php if ($_smarty_tpl->tpl_vars['auth']->value['user_id']==0){?>Tygh.$('#product_notify_email').toggle(this.checked);Tygh.$('#product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
').prop('disabled', !this.checked);if (!this.checked) <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
Tygh.$.ceAjax('request', '<?php echo fn_url("products.product_notifications?enable=",'C','rel');?>
' + 'N&product_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
&email=' + $('#product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
').get(0).value, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
cache: false<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>Tygh.$.ceAjax('request', '<?php echo fn_url("products.product_notifications?enable=",'C','rel');?>
' + (this.checked ? 'Y' : 'N') + '&product_id=' + '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
cache: false<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);<?php }?>"/><?php echo $_smarty_tpl->__("notify_when_back_in_stock");?>
</label></div><?php if ($_smarty_tpl->tpl_vars['auth']->value['user_id']==0){?><div class="control-group input-append product-notify-email" id="product_notify_email" style="<?php if ($_smarty_tpl->tpl_vars['product_notification_enabled']->value!="Y"){?> display: none;<?php }?>"><form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" enctype="multipart/form-data" class="cm-disable-empty-files cm-ajax"><label id="product_notify_email_label" for="product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required cm-email hidden"><?php echo $_smarty_tpl->__("email");?>
</label><input type="text" name="email" id="product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" size="20"value="<?php if ($_smarty_tpl->tpl_vars['product_notification_email']->value!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_notification_email']->value, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo $_smarty_tpl->__("enter_email");?>
<?php }?>"class="input-text cm-hint" disabled="disabled" title="<?php echo $_smarty_tpl->__("enter_email");?>
" /><button class="go-button" title="<?php echo $_smarty_tpl->__("go");?>
" alt="<?php echo $_smarty_tpl->__("go");?>
"><i class="icon-right-dir"></i></button><input type="hidden" value="products.product_notifications" name="dispatch" /><input type="hidden" value="Y" name="enable" /><input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" name="product_id" /></form></div><?php }?><?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['show_list_buttons']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_buy_now_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:buy_now")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:buy_now"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['feature_comparison']=="Y"){?><?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?></div><div class="add-to-compare"><?php }?><?php echo $_smarty_tpl->getSubTemplate ("buttons/add_to_compare_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product_id'=>$_smarty_tpl->tpl_vars['product']->value['product_id']), 0);?>
<?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:buy_now"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->tpl_vars["capture_buy_now"] = new Smarty_variable("product_buy_now_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_buy_now']->value])){?><?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?><div class="add-buttons-wrap <?php if ($_smarty_tpl->tpl_vars['cart_button_exists']->value||(($_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']=="S")&&($_smarty_tpl->tpl_vars['product']->value['tracking']!="O"))){?> no-margin<?php }?>"><div class="add-buttons-inner-wrap"><?php }?><<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?>div<?php }else{ ?>span<?php }?> id="cart_buttons_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="add-buttons add-to-wish"><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_buy_now']->value];?>
</<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?>div<?php }else{ ?>span<?php }?>><?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?></div></div><?php }?><?php }?><?php }?><?php if (($_smarty_tpl->tpl_vars['product']->value['avail_since']>@constant('TIME'))){?><?php echo $_smarty_tpl->getSubTemplate ("common/coming_soon_notice.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('avail_date'=>$_smarty_tpl->tpl_vars['product']->value['avail_since'],'add_to_cart'=>$_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']), 0);?>
<?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:buttons_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!--add_to_cart_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (Smarty::$_smarty_vars['capture']['cart_button_exists']){?>
    <?php $_smarty_tpl->tpl_vars["cart_button_exists"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_features_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_features']->value){?>
        <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_features]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_features']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('features'=>fn_get_product_features_list($_smarty_tpl->tpl_vars['product']->value),'no_container'=>true), 0);?>

        <!--product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_features_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_descr']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['short_description']){?>
            <?php echo $_smarty_tpl->tpl_vars['product']->value['short_description'];?>

        <?php }else{ ?>
            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['full_description']),160);?>

        <?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value&&$_smarty_tpl->tpl_vars['show_old_price']->value){?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="old_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:old_price")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:old_price"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_smarty_tpl->tpl_vars['product']->value['discount']){?>
                <span class="list-price nowrap" id="line_old_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?><?php echo $_smarty_tpl->__("old_price");?>
: <?php }?><span class="strike"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>(($tmp = @$_smarty_tpl->tpl_vars['product']->value['original_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['base_price'] : $tmp),'span_id'=>"old_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
</span></span>
            <?php }elseif($_smarty_tpl->tpl_vars['product']->value['list_discount']){?>
                <span class="list-price nowrap" id="line_list_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?><span class="list-price-label"><?php echo $_smarty_tpl->__("list_price");?>
:</span> <?php }?><span class="strike"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['list_price'],'span_id'=>"list_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
</span></span>
            <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:old_price"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <!--old_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
 price-update" id="price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_price_values]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="appearance[show_price]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value){?>
            <?php if ($_smarty_tpl->tpl_vars['show_price']->value){?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:prices_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:prices_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if (floatval($_smarty_tpl->tpl_vars['product']->value['price'])||$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="P"||($_smarty_tpl->tpl_vars['hide_add_to_cart_button']->value=="Y"&&$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="A")){?>
                    <span class="price<?php if (!floatval($_smarty_tpl->tpl_vars['product']->value['price'])&&!$_smarty_tpl->tpl_vars['product']->value['zero_price_action']){?> hidden<?php }?>" id="line_discounted_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?><?php }?><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'span_id'=>"discounted_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"price-num"), 0);?>
</span>
                <?php }elseif($_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="A"){?>
                    <?php $_smarty_tpl->tpl_vars["base_currency"] = new Smarty_variable($_smarty_tpl->tpl_vars['currencies']->value[@constant('CART_PRIMARY_CURRENCY')], null, 0);?>
                    <span class="price-curency"><span><?php echo $_smarty_tpl->__("enter_your_price");?>
: <?php if ($_smarty_tpl->tpl_vars['base_currency']->value['after']!="Y"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_currency']->value['symbol'], ENT_QUOTES, 'UTF-8');?>
<?php }?></span><input class="input-text-short" type="text" size="3" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][price]" value="" /><?php if ($_smarty_tpl->tpl_vars['base_currency']->value['after']=="Y"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_currency']->value['symbol'], ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
                <?php }elseif($_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="R"){?>
                    <span class="no-price"><?php echo $_smarty_tpl->__("contact_us_for_price");?>
</span>
                    <?php $_smarty_tpl->tpl_vars["show_qty"] = new Smarty_variable(false, null, 0);?>
                <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:prices_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['settings']->value['General']['allow_anonymous_shopping']=="hide_price_and_add_to_cart"&&!$_smarty_tpl->tpl_vars['auth']->value['user_id']){?>
            <span class="price"><?php echo $_smarty_tpl->__("sign_in_to_view_price");?>
</span>
        <?php }?>
    <!--price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value&&$_smarty_tpl->tpl_vars['show_clean_price']->value&&$_smarty_tpl->tpl_vars['settings']->value['Appearance']['show_prices_taxed_clean']=="Y"&&$_smarty_tpl->tpl_vars['product']->value['taxed_price']){?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="clean_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_price_values]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="appearance[show_clean_price]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_clean_price']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['product']->value['clean_price']!=$_smarty_tpl->tpl_vars['product']->value['taxed_price']&&$_smarty_tpl->tpl_vars['product']->value['included_tax']){?>
                <span class="list-price nowrap" id="line_product_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">(<?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['taxed_price'],'span_id'=>"product_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
 <?php echo $_smarty_tpl->__("inc_tax");?>
)</span>
            <?php }elseif($_smarty_tpl->tpl_vars['product']->value['clean_price']!=$_smarty_tpl->tpl_vars['product']->value['taxed_price']&&!$_smarty_tpl->tpl_vars['product']->value['included_tax']){?>
                <span class="list-price nowrap tax-include">(<?php echo $_smarty_tpl->__("including_tax");?>
)</span>
            <?php }?>
        <!--clean_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value&&$_smarty_tpl->tpl_vars['show_list_discount']->value&&$_smarty_tpl->tpl_vars['details_page']->value){?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="line_discount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_price_values]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="appearance[show_list_discount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_list_discount']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['product']->value['discount']){?>
                <span class="list-price save-price nowrap" id="line_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("you_save");?>
: <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['discount'],'span_id'=>"discount_value_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
&nbsp;(<span id="prc_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="list-price nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_prc'], ENT_QUOTES, 'UTF-8');?>
</span>%)</span>
            <?php }elseif($_smarty_tpl->tpl_vars['product']->value['list_discount']){?>
                <span class="list-price save-price nowrap" id="line_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"> <?php echo $_smarty_tpl->__("you_save");?>
: <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['list_discount'],'span_id'=>"discount_value_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
&nbsp;(<span id="prc_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="list-price nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_discount_prc'], ENT_QUOTES, 'UTF-8');?>
</span>%)</span>
            <?php }?>
        <!--line_discount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_discount_label']->value&&($_smarty_tpl->tpl_vars['product']->value['discount_prc']||$_smarty_tpl->tpl_vars['product']->value['list_discount_prc'])&&$_smarty_tpl->tpl_vars['show_price_values']->value){?>
        <ul class="discount-label cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="discount_label_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <li id="line_prc_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><span id="prc_discount_value_label_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("save_discount");?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value['discount']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_prc'], ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_discount_prc'], ENT_QUOTES, 'UTF-8');?>
<?php }?>%</span></li>
        <!--discount_label_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></ul>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if ($_smarty_tpl->tpl_vars['show_product_amount']->value&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"){?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
 stock-wrap" id="product_amount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_product_amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_product_amount']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php if (!$_smarty_tpl->tpl_vars['product']->value['hide_stock_info']){?>
            <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['in_stock_field']=="Y"){?>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['tracking']!="D"){?>
                    <?php if (($_smarty_tpl->tpl_vars['product_amount']->value>0&&$_smarty_tpl->tpl_vars['product_amount']->value>=$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"||$_smarty_tpl->tpl_vars['details_page']->value){?>
                        <?php if (($_smarty_tpl->tpl_vars['product_amount']->value>0&&$_smarty_tpl->tpl_vars['product_amount']->value>=$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"){?>
                            <div class="control-group product-list-field">
                                <label><?php echo $_smarty_tpl->__("availability");?>
:</label>
                                <span id="qty_in_stock_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="qty-in-stock">
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_amount']->value, ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->__("items");?>

                                </span>    
                            </div>
                        <?php }elseif($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"){?>
                            <div class="control-group product-list-field">
                                <label><?php echo $_smarty_tpl->__("in_stock");?>
:</label>
                                <span class="qty-out-of-stock"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['out_of_stock_text']->value, ENT_QUOTES, 'UTF-8');?>
</span>
                            </div>
                        <?php }?>
                    <?php }?>
                <?php }?>
            <?php }else{ ?>
                <?php if (((($_smarty_tpl->tpl_vars['product_amount']->value>0&&$_smarty_tpl->tpl_vars['product_amount']->value>=$_smarty_tpl->tpl_vars['product']->value['min_qty'])||$_smarty_tpl->tpl_vars['product']->value['tracking']=="D")&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y")||($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']=="Y")){?>
                    <div class="control-group product-list-field">
                        <label><?php echo $_smarty_tpl->__("availability");?>
:</label>
                        <span class="qty-in-stock" id="in_stock_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("in_stock");?>
</span>
                    </div>
                <?php }elseif($_smarty_tpl->tpl_vars['details_page']->value&&($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"){?>
                    <div class="control-group product-list-field">
                        <label><?php echo $_smarty_tpl->__("availability");?>
:</label>
                        <span class="qty-out-of-stock" id="out_of_stock_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['out_of_stock_text']->value, ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                <?php }?>
            <?php }?>
        <?php }?>
    <!--product_amount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_product_options']->value){?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_product_options]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_product_options']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:product_option_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:product_option_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_smarty_tpl->tpl_vars['disable_ids']->value){?>
                <?php $_smarty_tpl->tpl_vars["_disable_ids"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['disable_ids']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php }else{ ?>
                <?php $_smarty_tpl->tpl_vars["_disable_ids"] = new Smarty_variable('', null, 0);?>
            <?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product_options'=>$_smarty_tpl->tpl_vars['product']->value['product_options'],'name'=>"product_data",'capture_options_vs_qty'=>$_smarty_tpl->tpl_vars['capture_options_vs_qty']->value,'disable_ids'=>$_smarty_tpl->tpl_vars['_disable_ids']->value), 0);?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:product_option_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <!--product_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_product_options']->value){?>
        <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="advanced_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/product_company_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('company_name'=>$_smarty_tpl->tpl_vars['product']->value['company_name'],'company_id'=>$_smarty_tpl->tpl_vars['product']->value['company_id']), 0);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:options_advanced")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:options_advanced"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:options_advanced"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <!--advanced_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:qty")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:qty"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="qty_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_qty]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_qty']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="appearance[capture_options_vs_qty]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['selected_amount'])){?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['selected_amount'], null, 0);?>
        <?php }elseif(!empty($_smarty_tpl->tpl_vars['product']->value['min_qty'])){?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['min_qty'], null, 0);?>
        <?php }elseif(!empty($_smarty_tpl->tpl_vars['product']->value['qty_step'])){?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['qty_step'], null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable("1", null, 0);?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['show_qty']->value&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!=="Y"&&$_smarty_tpl->tpl_vars['cart_button_exists']->value==true&&($_smarty_tpl->tpl_vars['settings']->value['General']['allow_anonymous_shopping']=="allow_shopping"||$_smarty_tpl->tpl_vars['auth']->value['user_id'])){?>
            <div class="qty clearfix<?php if ($_smarty_tpl->tpl_vars['quick_view']->value){?> control-group<?php if (!$_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?> product-list-field<?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['quantity_changer']=="Y"){?> changer<?php }?>" id="qty_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <?php if (!$_smarty_tpl->tpl_vars['hide_qty_label']->value){?><label for="qty_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['quantity_text']->value)===null||$tmp==='' ? $_smarty_tpl->__("quantity") : $tmp), ENT_QUOTES, 'UTF-8');?>
:</label><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['qty_content']&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"){?>
                <select name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" id="qty_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <?php $_smarty_tpl->tpl_vars["a_name"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["selected_amount"] = new Smarty_variable(false, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars["var"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["var"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['qty_content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["var"]->key => $_smarty_tpl->tpl_vars["var"]->value){
$_smarty_tpl->tpl_vars["var"]->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['product']->value['selected_amount']&&($_smarty_tpl->tpl_vars['product']->value['selected_amount']==$_smarty_tpl->tpl_vars['var']->value||($_smarty_tpl->getVariable('smarty')->value['foreach'][$_smarty_tpl->tpl_vars['a_name']->value]['last']&&!$_smarty_tpl->tpl_vars['selected_amount']->value))){?><?php $_smarty_tpl->tpl_vars["selected_amount"] = new Smarty_variable(true, null, 0);?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                <?php } ?>
                </select>
                <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['quantity_changer']=="Y"){?>
                <div class="center valign value-changer cm-value-changer">
                    <a class="cm-increase increase">&#43;</a>
                    <?php }?>
                    <input type="text" size="5" class="input-text-short cm-amount" id="qty_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_amount']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['product']->value['qty_step']>1){?> data-ca-step="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['qty_step'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['quantity_changer']=="Y"){?>
                    <a class="cm-decrease decrease">&minus;</a>
                </div>
                <?php }?>
                <?php }?>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['prices']){?>
                <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/products_qty_discounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }?>
        <?php }elseif(!$_smarty_tpl->tpl_vars['bulk_add']->value){?>
            <input type="hidden" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_amount']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php }?>
        <!--qty_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:qty"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['min_qty']->value&&$_smarty_tpl->tpl_vars['product']->value['min_qty']){?>
        <p class="description"><?php echo $_smarty_tpl->__("text_cart_min_qty",array("[product]"=>$_smarty_tpl->tpl_vars['product']->value['product'],"[quantity]"=>$_smarty_tpl->tpl_vars['product']->value['min_qty']));?>
.</p>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_edp']->value&&$_smarty_tpl->tpl_vars['product']->value['is_edp']=="Y"){?>
        <p class="description"><?php echo $_smarty_tpl->__("text_edp_product");?>
.</p>
        <input type="hidden" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][is_edp]" value="Y" />
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if (!$_smarty_tpl->tpl_vars['hide_form']->value){?>
</form>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php  $_smarty_tpl->tpl_vars["image"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image"]->_loop = false;
 $_smarty_tpl->tpl_vars["object_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image"]->key => $_smarty_tpl->tpl_vars["image"]->value){
$_smarty_tpl->tpl_vars["image"]->_loop = true;
 $_smarty_tpl->tpl_vars["object_id"]->value = $_smarty_tpl->tpl_vars["image"]->key;
?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['obj_id'], ENT_QUOTES, 'UTF-8');?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['image']->value['link']){?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['link'], ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['link'], ENT_QUOTES, 'UTF-8');?>
" name="image[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
][link]" />
        <?php }?>
        <input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['obj_id'], ENT_QUOTES, 'UTF-8');?>
,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['width'], ENT_QUOTES, 'UTF-8');?>
,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['height'], ENT_QUOTES, 'UTF-8');?>
,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['type'], ENT_QUOTES, 'UTF-8');?>
" name="image[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
][data]" />
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('image_width'=>$_smarty_tpl->tpl_vars['image']->value['width'],'image_height'=>$_smarty_tpl->tpl_vars['image']->value['height'],'obj_id'=>$_smarty_tpl->tpl_vars['object_id']->value,'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair']), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['image']->value['link']){?>
            </a>
        <?php }?>
    <!--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php } ?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:product_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:product_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:product_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="common/product_data.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/product_data.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['product']->value['tracking']=="O"){?>
    <?php $_smarty_tpl->tpl_vars["out_of_stock_text"] = new Smarty_variable($_smarty_tpl->__("text_combination_out_of_stock"), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["out_of_stock_text"] = new Smarty_variable($_smarty_tpl->__("text_out_of_stock"), null, 0);?>
<?php }?>

<?php if ((floatval($_smarty_tpl->tpl_vars['product']->value['price'])||$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="P"||$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="A"||(!floatval($_smarty_tpl->tpl_vars['product']->value['price'])&&$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="R"))&&!($_smarty_tpl->tpl_vars['settings']->value['General']['allow_anonymous_shopping']=="hide_price_and_add_to_cart"&&!$_smarty_tpl->tpl_vars['auth']->value['user_id'])){?>
    <?php $_smarty_tpl->tpl_vars["show_price_values"] = new Smarty_variable(true, null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["show_price_values"] = new Smarty_variable(false, null, 0);?>
<?php }?>
<?php $_smarty_tpl->_capture_stack[0][] = array("show_price_values", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->tpl_vars["cart_button_exists"] = new Smarty_variable(false, null, 0);?>
<?php $_smarty_tpl->tpl_vars["show_qty"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['show_qty']->value)===null||$tmp==='' ? true : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['product_id'] : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["product_amount"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['product']->value['inventory_amount'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['amount'] : $tmp), null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['config']->value['tweaks']['disable_dhtml']&&!$_smarty_tpl->tpl_vars['no_ajax']->value){?>
    <?php $_smarty_tpl->tpl_vars["is_ajax"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if (!$_smarty_tpl->tpl_vars['hide_form']->value){?>
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="product_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data" class="cm-disable-empty-files <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value){?> cm-ajax cm-ajax-full-render cm-ajax-status-middle<?php }?> <?php if ($_smarty_tpl->tpl_vars['form_meta']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>">
<input type="hidden" name="result_ids" value="cart_status*,wish_list*,checkout*,account_info*" />
<?php if (!$_smarty_tpl->tpl_vars['stay_in_cart']->value){?>
<input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['redirect_url']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['config']->value['current_url'] : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>
<input type="hidden" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][product_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_name']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?><strong><?php }else{ ?><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="product-title"><?php }?><?php echo $_smarty_tpl->tpl_vars['product']->value['product'];?>
<?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?></strong><?php }else{ ?></a><?php }?>
    <?php }elseif($_smarty_tpl->tpl_vars['show_trunc_name']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?><strong><?php }else{ ?><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="product-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['product']), ENT_QUOTES, 'UTF-8');?>
"><?php }?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['product'],45,"...",true);?>
<?php if ($_smarty_tpl->tpl_vars['hide_links']->value){?></strong><?php }else{ ?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_sku']->value){?>
        <div class="control-group product-list-field cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['product']->value['product_code']){?> hidden<?php }?>" id="sku_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_sku]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_sku']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <label id="sku_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("sku");?>
:</label>
            <span id="product_code_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_code'], ENT_QUOTES, 'UTF-8');?>
</span>
        <!--sku_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("sku_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:data_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:data_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:data_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if ($_smarty_tpl->tpl_vars['show_add_to_cart']->value){?>
<div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['add_to_cart_class']->value, ENT_QUOTES, 'UTF-8');?>
" id="add_to_cart_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="appearance[show_add_to_cart]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_add_to_cart']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[separate_buttons]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['separate_buttons']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[show_list_buttons]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_list_buttons']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[but_role]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_role']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[quick_view]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['quick_view']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons_product", null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:add_to_cart")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:add_to_cart"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['has_options']&&!$_smarty_tpl->tpl_vars['show_product_options']->value&&!$_smarty_tpl->tpl_vars['details_page']->value){?><?php if ($_smarty_tpl->tpl_vars['but_role']->value=="text"){?><?php $_smarty_tpl->tpl_vars['opt_but_role'] = new Smarty_variable("text", null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['opt_but_role'] = new Smarty_variable("action", null, 0);?><?php }?><?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_id'=>"button_cart_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'but_text'=>__("select_options"),'but_href'=>"products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'but_role'=>$_smarty_tpl->tpl_vars['opt_but_role']->value,'but_name'=>''), 0);?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['extra_button']->value){?><?php echo $_smarty_tpl->tpl_vars['extra_button']->value;?>
&nbsp;<?php }?><?php echo $_smarty_tpl->getSubTemplate ("buttons/add_to_cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_id'=>"button_cart_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'but_name'=>"dispatch[checkout.add..".((string)$_smarty_tpl->tpl_vars['obj_id']->value)."]",'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value,'block_width'=>$_smarty_tpl->tpl_vars['block_width']->value,'obj_id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product'=>$_smarty_tpl->tpl_vars['product']->value,'but_meta'=>$_smarty_tpl->tpl_vars['add_to_cart_meta']->value), 0);?>
<?php $_smarty_tpl->tpl_vars["cart_button_exists"] = new Smarty_variable(true, null, 0);?><?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:add_to_cart"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:buttons_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:buttons_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if (!($_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="R"&&$_smarty_tpl->tpl_vars['product']->value['price']==0)&&!($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"&&(($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['product']->value['tracking']!="D")&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!="Y")||($_smarty_tpl->tpl_vars['product']->value['has_options']&&!$_smarty_tpl->tpl_vars['show_product_options']->value)){?><?php if (trim(Smarty::$_smarty_vars['capture']['buttons_product'])!='&nbsp;'){?><<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value&&!$_smarty_tpl->tpl_vars['quick_view']->value){?>div class="buttons-container"<?php }elseif($_smarty_tpl->tpl_vars['separate_buttons']->value&&$_smarty_tpl->tpl_vars['quick_view']->value){?>div class="qv-buttons-container"<?php }else{ ?>span<?php }?> id="cart_add_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value['avail_since']<=@constant('TIME')||($_smarty_tpl->tpl_vars['product']->value['avail_since']>@constant('TIME')&&$_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']=="B")){?><?php echo Smarty::$_smarty_vars['capture']['buttons_product'];?>
<?php }?></<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?>div<?php }else{ ?>span<?php }?>><?php }?><?php }elseif(($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"&&(($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['product']->value['tracking']!="D")&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!="Y")){?><?php $_smarty_tpl->tpl_vars["show_qty"] = new Smarty_variable(false, null, 0);?><?php if (!$_smarty_tpl->tpl_vars['details_page']->value){?><?php if ((!$_smarty_tpl->tpl_vars['product']->value['hide_stock_info']&&!(($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&($_smarty_tpl->tpl_vars['product']->value['avail_since']>@constant('TIME'))))){?><span class="qty-out-of-stock" id="out_of_stock_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['out_of_stock_text']->value, ENT_QUOTES, 'UTF-8');?>
</span><?php }?><?php }elseif((($_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']=="S")&&($_smarty_tpl->tpl_vars['product']->value['tracking']!="O"))){?><div class="control-group"><label for="product_notify_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><input id="product_notify_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" type="checkbox" class="checkbox" name="product_notify" <?php if ($_smarty_tpl->tpl_vars['product_notification_enabled']->value=="Y"){?>checked="checked"<?php }?> onclick="<?php if ($_smarty_tpl->tpl_vars['auth']->value['user_id']==0){?>Tygh.$('#product_notify_email').toggle(this.checked);Tygh.$('#product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
').prop('disabled', !this.checked);if (!this.checked) <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
Tygh.$.ceAjax('request', '<?php echo fn_url("products.product_notifications?enable=",'C','rel');?>
' + 'N&product_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
&email=' + $('#product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
').get(0).value, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
cache: false<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>Tygh.$.ceAjax('request', '<?php echo fn_url("products.product_notifications?enable=",'C','rel');?>
' + (this.checked ? 'Y' : 'N') + '&product_id=' + '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
cache: false<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);<?php }?>"/><?php echo $_smarty_tpl->__("notify_when_back_in_stock");?>
</label></div><?php if ($_smarty_tpl->tpl_vars['auth']->value['user_id']==0){?><div class="control-group input-append product-notify-email" id="product_notify_email" style="<?php if ($_smarty_tpl->tpl_vars['product_notification_enabled']->value!="Y"){?> display: none;<?php }?>"><form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" enctype="multipart/form-data" class="cm-disable-empty-files cm-ajax"><label id="product_notify_email_label" for="product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required cm-email hidden"><?php echo $_smarty_tpl->__("email");?>
</label><input type="text" name="email" id="product_notify_email_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" size="20"value="<?php if ($_smarty_tpl->tpl_vars['product_notification_email']->value!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_notification_email']->value, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo $_smarty_tpl->__("enter_email");?>
<?php }?>"class="input-text cm-hint" disabled="disabled" title="<?php echo $_smarty_tpl->__("enter_email");?>
" /><button class="go-button" title="<?php echo $_smarty_tpl->__("go");?>
" alt="<?php echo $_smarty_tpl->__("go");?>
"><i class="icon-right-dir"></i></button><input type="hidden" value="products.product_notifications" name="dispatch" /><input type="hidden" value="Y" name="enable" /><input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" name="product_id" /></form></div><?php }?><?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['show_list_buttons']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("product_buy_now_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:buy_now")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:buy_now"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['feature_comparison']=="Y"){?><?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?></div><div class="add-to-compare"><?php }?><?php echo $_smarty_tpl->getSubTemplate ("buttons/add_to_compare_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('product_id'=>$_smarty_tpl->tpl_vars['product']->value['product_id']), 0);?>
<?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:buy_now"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->tpl_vars["capture_buy_now"] = new Smarty_variable("product_buy_now_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><?php if (trim(Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_buy_now']->value])){?><?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?><div class="add-buttons-wrap <?php if ($_smarty_tpl->tpl_vars['cart_button_exists']->value||(($_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']=="S")&&($_smarty_tpl->tpl_vars['product']->value['tracking']!="O"))){?> no-margin<?php }?>"><div class="add-buttons-inner-wrap"><?php }?><<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?>div<?php }else{ ?>span<?php }?> id="cart_buttons_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="add-buttons add-to-wish"><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_buy_now']->value];?>
</<?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?>div<?php }else{ ?>span<?php }?>><?php if ($_smarty_tpl->tpl_vars['separate_buttons']->value){?></div></div><?php }?><?php }?><?php }?><?php if (($_smarty_tpl->tpl_vars['product']->value['avail_since']>@constant('TIME'))){?><?php echo $_smarty_tpl->getSubTemplate ("common/coming_soon_notice.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('avail_date'=>$_smarty_tpl->tpl_vars['product']->value['avail_since'],'add_to_cart'=>$_smarty_tpl->tpl_vars['product']->value['out_of_stock_actions']), 0);?>
<?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:buttons_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!--add_to_cart_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (Smarty::$_smarty_vars['capture']['cart_button_exists']){?>
    <?php $_smarty_tpl->tpl_vars["cart_button_exists"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("add_to_cart_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_features_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_features']->value){?>
        <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_features]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_features']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('features'=>fn_get_product_features_list($_smarty_tpl->tpl_vars['product']->value),'no_container'=>true), 0);?>

        <!--product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_features_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_descr']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['short_description']){?>
            <?php echo $_smarty_tpl->tpl_vars['product']->value['short_description'];?>

        <?php }else{ ?>
            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['full_description']),160);?>

        <?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("prod_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value&&$_smarty_tpl->tpl_vars['show_old_price']->value){?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="old_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:old_price")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:old_price"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_smarty_tpl->tpl_vars['product']->value['discount']){?>
                <span class="list-price nowrap" id="line_old_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?><?php echo $_smarty_tpl->__("old_price");?>
: <?php }?><span class="strike"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>(($tmp = @$_smarty_tpl->tpl_vars['product']->value['original_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['base_price'] : $tmp),'span_id'=>"old_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
</span></span>
            <?php }elseif($_smarty_tpl->tpl_vars['product']->value['list_discount']){?>
                <span class="list-price nowrap" id="line_list_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?><span class="list-price-label"><?php echo $_smarty_tpl->__("list_price");?>
:</span> <?php }?><span class="strike"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['list_price'],'span_id'=>"list_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
</span></span>
            <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:old_price"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <!--old_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("old_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
 price-update" id="price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_price_values]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="appearance[show_price]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value){?>
            <?php if ($_smarty_tpl->tpl_vars['show_price']->value){?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:prices_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:prices_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if (floatval($_smarty_tpl->tpl_vars['product']->value['price'])||$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="P"||($_smarty_tpl->tpl_vars['hide_add_to_cart_button']->value=="Y"&&$_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="A")){?>
                    <span class="price<?php if (!floatval($_smarty_tpl->tpl_vars['product']->value['price'])&&!$_smarty_tpl->tpl_vars['product']->value['zero_price_action']){?> hidden<?php }?>" id="line_discounted_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?><?php }?><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'span_id'=>"discounted_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"price-num"), 0);?>
</span>
                <?php }elseif($_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="A"){?>
                    <?php $_smarty_tpl->tpl_vars["base_currency"] = new Smarty_variable($_smarty_tpl->tpl_vars['currencies']->value[@constant('CART_PRIMARY_CURRENCY')], null, 0);?>
                    <span class="price-curency"><span><?php echo $_smarty_tpl->__("enter_your_price");?>
: <?php if ($_smarty_tpl->tpl_vars['base_currency']->value['after']!="Y"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_currency']->value['symbol'], ENT_QUOTES, 'UTF-8');?>
<?php }?></span><input class="input-text-short" type="text" size="3" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][price]" value="" /><?php if ($_smarty_tpl->tpl_vars['base_currency']->value['after']=="Y"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_currency']->value['symbol'], ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
                <?php }elseif($_smarty_tpl->tpl_vars['product']->value['zero_price_action']=="R"){?>
                    <span class="no-price"><?php echo $_smarty_tpl->__("contact_us_for_price");?>
</span>
                    <?php $_smarty_tpl->tpl_vars["show_qty"] = new Smarty_variable(false, null, 0);?>
                <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:prices_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['settings']->value['General']['allow_anonymous_shopping']=="hide_price_and_add_to_cart"&&!$_smarty_tpl->tpl_vars['auth']->value['user_id']){?>
            <span class="price"><?php echo $_smarty_tpl->__("sign_in_to_view_price");?>
</span>
        <?php }?>
    <!--price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value&&$_smarty_tpl->tpl_vars['show_clean_price']->value&&$_smarty_tpl->tpl_vars['settings']->value['Appearance']['show_prices_taxed_clean']=="Y"&&$_smarty_tpl->tpl_vars['product']->value['taxed_price']){?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="clean_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_price_values]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="appearance[show_clean_price]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_clean_price']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['product']->value['clean_price']!=$_smarty_tpl->tpl_vars['product']->value['taxed_price']&&$_smarty_tpl->tpl_vars['product']->value['included_tax']){?>
                <span class="list-price nowrap" id="line_product_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">(<?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['taxed_price'],'span_id'=>"product_price_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
 <?php echo $_smarty_tpl->__("inc_tax");?>
)</span>
            <?php }elseif($_smarty_tpl->tpl_vars['product']->value['clean_price']!=$_smarty_tpl->tpl_vars['product']->value['taxed_price']&&!$_smarty_tpl->tpl_vars['product']->value['included_tax']){?>
                <span class="list-price nowrap tax-include">(<?php echo $_smarty_tpl->__("including_tax");?>
)</span>
            <?php }?>
        <!--clean_price_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("clean_price_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_price_values']->value&&$_smarty_tpl->tpl_vars['show_list_discount']->value&&$_smarty_tpl->tpl_vars['details_page']->value){?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="line_discount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="appearance[show_price_values]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_price_values']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="appearance[show_list_discount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_list_discount']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['product']->value['discount']){?>
                <span class="list-price save-price nowrap" id="line_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("you_save");?>
: <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['discount'],'span_id'=>"discount_value_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
&nbsp;(<span id="prc_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="list-price nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_prc'], ENT_QUOTES, 'UTF-8');?>
</span>%)</span>
            <?php }elseif($_smarty_tpl->tpl_vars['product']->value['list_discount']){?>
                <span class="list-price save-price nowrap" id="line_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"> <?php echo $_smarty_tpl->__("you_save");?>
: <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['list_discount'],'span_id'=>"discount_value_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value),'class'=>"list-price nowrap"), 0);?>
&nbsp;(<span id="prc_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="list-price nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_discount_prc'], ENT_QUOTES, 'UTF-8');?>
</span>%)</span>
            <?php }?>
        <!--line_discount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("list_discount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>


<?php $_smarty_tpl->_capture_stack[0][] = array("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_discount_label']->value&&($_smarty_tpl->tpl_vars['product']->value['discount_prc']||$_smarty_tpl->tpl_vars['product']->value['list_discount_prc'])&&$_smarty_tpl->tpl_vars['show_price_values']->value){?>
        <ul class="discount-label cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="discount_label_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <li id="line_prc_discount_value_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><span id="prc_discount_value_label_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("save_discount");?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value['discount']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_prc'], ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_discount_prc'], ENT_QUOTES, 'UTF-8');?>
<?php }?>%</span></li>
        <!--discount_label_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></ul>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("discount_label_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if ($_smarty_tpl->tpl_vars['show_product_amount']->value&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"){?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
 stock-wrap" id="product_amount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_product_amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_product_amount']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php if (!$_smarty_tpl->tpl_vars['product']->value['hide_stock_info']){?>
            <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['in_stock_field']=="Y"){?>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['tracking']!="D"){?>
                    <?php if (($_smarty_tpl->tpl_vars['product_amount']->value>0&&$_smarty_tpl->tpl_vars['product_amount']->value>=$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"||$_smarty_tpl->tpl_vars['details_page']->value){?>
                        <?php if (($_smarty_tpl->tpl_vars['product_amount']->value>0&&$_smarty_tpl->tpl_vars['product_amount']->value>=$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"){?>
                            <div class="control-group product-list-field">
                                <label><?php echo $_smarty_tpl->__("availability");?>
:</label>
                                <span id="qty_in_stock_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="qty-in-stock">
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_amount']->value, ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->__("items");?>

                                </span>    
                            </div>
                        <?php }elseif($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"){?>
                            <div class="control-group product-list-field">
                                <label><?php echo $_smarty_tpl->__("in_stock");?>
:</label>
                                <span class="qty-out-of-stock"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['out_of_stock_text']->value, ENT_QUOTES, 'UTF-8');?>
</span>
                            </div>
                        <?php }?>
                    <?php }?>
                <?php }?>
            <?php }else{ ?>
                <?php if (((($_smarty_tpl->tpl_vars['product_amount']->value>0&&$_smarty_tpl->tpl_vars['product_amount']->value>=$_smarty_tpl->tpl_vars['product']->value['min_qty'])||$_smarty_tpl->tpl_vars['product']->value['tracking']=="D")&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y")||($_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']=="Y")){?>
                    <div class="control-group product-list-field">
                        <label><?php echo $_smarty_tpl->__("availability");?>
:</label>
                        <span class="qty-in-stock" id="in_stock_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("in_stock");?>
</span>
                    </div>
                <?php }elseif($_smarty_tpl->tpl_vars['details_page']->value&&($_smarty_tpl->tpl_vars['product_amount']->value<=0||$_smarty_tpl->tpl_vars['product_amount']->value<$_smarty_tpl->tpl_vars['product']->value['min_qty'])&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['General']['allow_negative_amount']!="Y"){?>
                    <div class="control-group product-list-field">
                        <label><?php echo $_smarty_tpl->__("availability");?>
:</label>
                        <span class="qty-out-of-stock" id="out_of_stock_info_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['out_of_stock_text']->value, ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                <?php }?>
            <?php }?>
        <?php }?>
    <!--product_amount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_product_options']->value){?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_product_options]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_product_options']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:product_option_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:product_option_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_smarty_tpl->tpl_vars['disable_ids']->value){?>
                <?php $_smarty_tpl->tpl_vars["_disable_ids"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['disable_ids']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
            <?php }else{ ?>
                <?php $_smarty_tpl->tpl_vars["_disable_ids"] = new Smarty_variable('', null, 0);?>
            <?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('id'=>$_smarty_tpl->tpl_vars['obj_id']->value,'product_options'=>$_smarty_tpl->tpl_vars['product']->value['product_options'],'name'=>"product_data",'capture_options_vs_qty'=>$_smarty_tpl->tpl_vars['capture_options_vs_qty']->value,'disable_ids'=>$_smarty_tpl->tpl_vars['_disable_ids']->value), 0);?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:product_option_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <!--product_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_product_options']->value){?>
        <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="advanced_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/product_company_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('company_name'=>$_smarty_tpl->tpl_vars['product']->value['company_name'],'company_id'=>$_smarty_tpl->tpl_vars['product']->value['company_id']), 0);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:options_advanced")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:options_advanced"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:options_advanced"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <!--advanced_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("advanced_options_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:qty")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:qty"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="qty_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_qty]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_qty']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="appearance[capture_options_vs_qty]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['capture_options_vs_qty']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['selected_amount'])){?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['selected_amount'], null, 0);?>
        <?php }elseif(!empty($_smarty_tpl->tpl_vars['product']->value['min_qty'])){?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['min_qty'], null, 0);?>
        <?php }elseif(!empty($_smarty_tpl->tpl_vars['product']->value['qty_step'])){?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['qty_step'], null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["default_amount"] = new Smarty_variable("1", null, 0);?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['show_qty']->value&&$_smarty_tpl->tpl_vars['product']->value['is_edp']!=="Y"&&$_smarty_tpl->tpl_vars['cart_button_exists']->value==true&&($_smarty_tpl->tpl_vars['settings']->value['General']['allow_anonymous_shopping']=="allow_shopping"||$_smarty_tpl->tpl_vars['auth']->value['user_id'])){?>
            <div class="qty clearfix<?php if ($_smarty_tpl->tpl_vars['quick_view']->value){?> control-group<?php if (!$_smarty_tpl->tpl_vars['capture_options_vs_qty']->value){?> product-list-field<?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['quantity_changer']=="Y"){?> changer<?php }?>" id="qty_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <?php if (!$_smarty_tpl->tpl_vars['hide_qty_label']->value){?><label for="qty_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['quantity_text']->value)===null||$tmp==='' ? $_smarty_tpl->__("quantity") : $tmp), ENT_QUOTES, 'UTF-8');?>
:</label><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['qty_content']&&$_smarty_tpl->tpl_vars['settings']->value['General']['inventory_tracking']=="Y"){?>
                <select name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" id="qty_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <?php $_smarty_tpl->tpl_vars["a_name"] = new Smarty_variable("product_amount_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["selected_amount"] = new Smarty_variable(false, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars["var"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["var"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['qty_content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["var"]->key => $_smarty_tpl->tpl_vars["var"]->value){
$_smarty_tpl->tpl_vars["var"]->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['product']->value['selected_amount']&&($_smarty_tpl->tpl_vars['product']->value['selected_amount']==$_smarty_tpl->tpl_vars['var']->value||($_smarty_tpl->getVariable('smarty')->value['foreach'][$_smarty_tpl->tpl_vars['a_name']->value]['last']&&!$_smarty_tpl->tpl_vars['selected_amount']->value))){?><?php $_smarty_tpl->tpl_vars["selected_amount"] = new Smarty_variable(true, null, 0);?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                <?php } ?>
                </select>
                <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['quantity_changer']=="Y"){?>
                <div class="center valign value-changer cm-value-changer">
                    <a class="cm-increase increase">&#43;</a>
                    <?php }?>
                    <input type="text" size="5" class="input-text-short cm-amount" id="qty_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_amount']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['product']->value['qty_step']>1){?> data-ca-step="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['qty_step'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['quantity_changer']=="Y"){?>
                    <a class="cm-decrease decrease">&minus;</a>
                </div>
                <?php }?>
                <?php }?>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['prices']){?>
                <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/products_qty_discounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }?>
        <?php }elseif(!$_smarty_tpl->tpl_vars['bulk_add']->value){?>
            <input type="hidden" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_amount']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php }?>
        <!--qty_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:qty"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['min_qty']->value&&$_smarty_tpl->tpl_vars['product']->value['min_qty']){?>
        <p class="description"><?php echo $_smarty_tpl->__("text_cart_min_qty",array("[product]"=>$_smarty_tpl->tpl_vars['product']->value['product'],"[quantity]"=>$_smarty_tpl->tpl_vars['product']->value['min_qty']));?>
.</p>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("min_qty_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_edp']->value&&$_smarty_tpl->tpl_vars['product']->value['is_edp']=="Y"){?>
        <p class="description"><?php echo $_smarty_tpl->__("text_edp_product");?>
.</p>
        <input type="hidden" name="product_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
][is_edp]" value="Y" />
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("product_edp_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
<?php if (!$_smarty_tpl->tpl_vars['hide_form']->value){?>
</form>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value){?>
    <?php $_smarty_tpl->tpl_vars["capture_name"] = new Smarty_variable("form_close_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php  $_smarty_tpl->tpl_vars["image"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image"]->_loop = false;
 $_smarty_tpl->tpl_vars["object_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image"]->key => $_smarty_tpl->tpl_vars["image"]->value){
$_smarty_tpl->tpl_vars["image"]->_loop = true;
 $_smarty_tpl->tpl_vars["object_id"]->value = $_smarty_tpl->tpl_vars["image"]->key;
?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['obj_id'], ENT_QUOTES, 'UTF-8');?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['image']->value['link']){?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['link'], ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['link'], ENT_QUOTES, 'UTF-8');?>
" name="image[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
][link]" />
        <?php }?>
        <input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['obj_id'], ENT_QUOTES, 'UTF-8');?>
,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['width'], ENT_QUOTES, 'UTF-8');?>
,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['height'], ENT_QUOTES, 'UTF-8');?>
,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['type'], ENT_QUOTES, 'UTF-8');?>
" name="image[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
][data]" />
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('image_width'=>$_smarty_tpl->tpl_vars['image']->value['width'],'image_height'=>$_smarty_tpl->tpl_vars['image']->value['height'],'obj_id'=>$_smarty_tpl->tpl_vars['object_id']->value,'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair']), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['image']->value['link']){?>
            </a>
        <?php }?>
    <!--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php } ?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:product_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:product_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:product_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?><?php }} ?>