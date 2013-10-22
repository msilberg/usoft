<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:12
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/cart_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1180013024526655584fe740-42794619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b49e1d47aa6cda95310ba9e7d200bd925d8eb5cb' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/cart_content.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1180013024526655584fe740-42794619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'config' => 0,
    'dropdown_id' => 0,
    '_cart_products' => 0,
    'p' => 0,
    'key' => 0,
    'force_items_deletion' => 0,
    'r_url' => 0,
    'settings' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266555876c163_86337266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266555876c163_86337266')) {function content_5266555876c163_86337266($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('items','for','cart_is_empty','cart_is_empty','view_cart','checkout','items','for','cart_is_empty','cart_is_empty','view_cart','checkout'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars["dropdown_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['snapping_id'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["r_url"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:cart_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:cart_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<div class="dropdown-box" id="cart_status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <a href="<?php echo htmlspecialchars(fn_url("checkout.cart"), ENT_QUOTES, 'UTF-8');?>
" id="sw_dropdown_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="popup-title cm-combination">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:dropdown_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:dropdown_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_SESSION['cart']['amount']){?>
                <i class="icon-basket filled"></i>
                <span class="minicart-title hand"><?php echo htmlspecialchars($_SESSION['cart']['amount'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->__("items");?>
 <?php echo $_smarty_tpl->__("for");?>
&nbsp;<?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_SESSION['cart']['display_subtotal']), 0);?>
<i class="icon-down-micro"></i></span>
            <?php }else{ ?>
                <i class="icon-basket empty"></i>
                <span class="minicart-title empty-cart hand"><?php echo $_smarty_tpl->__("cart_is_empty");?>
<i class="icon-down-micro"></i></span>
            <?php }?>        
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:dropdown_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </a>
    <div id="dropdown_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-popup-box popup-content hidden">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:minicart")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:minicart"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="cm-cart-content <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['products_links_type']=="thumb"){?>cm-cart-content-thumb<?php }?> <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['display_delete_icons']=="Y"){?>cm-cart-content-delete<?php }?>">
                    <div class="cart-items">
                        <?php if ($_SESSION['cart']['amount']){?>
                            <table class="minicart-table">
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:cart_status")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:cart_status"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <?php $_smarty_tpl->tpl_vars["_cart_products"] = new Smarty_variable(array_reverse($_SESSION['cart']['products'],true), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars["p"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["p"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_cart_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["p"]->key => $_smarty_tpl->tpl_vars["p"]->value){
$_smarty_tpl->tpl_vars["p"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["p"]->key;
?>
                                <?php if (!$_smarty_tpl->tpl_vars['p']->value['extra']['parent']){?>
                                <tr class="minicart-separator">
                                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['products_links_type']=="thumb"){?>
                                    <td style="width: 5%" class="cm-cart-item-thumb"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('image_width'=>"40",'image_height'=>"40",'images'=>$_smarty_tpl->tpl_vars['p']->value['main_pair'],'no_ids'=>true), 0);?>
</td>
                                    <?php }?>
                                    <td style="width: 94%"><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['p']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo fn_get_product_name($_smarty_tpl->tpl_vars['p']->value['product_id']);?>
</a>
                                    <p>
                                        <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['amount'], ENT_QUOTES, 'UTF-8');?>
</span><span>&nbsp;x&nbsp;</span><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['p']->value['display_price'],'span_id'=>"price_".((string)$_smarty_tpl->tpl_vars['key']->value)."_".((string)$_smarty_tpl->tpl_vars['dropdown_id']->value),'class'=>"none"), 0);?>

                                    </p></td>
                                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['display_delete_icons']=="Y"){?>
                                    <td style="width: 1%" class="minicart-tools cm-cart-item-delete"><?php if ((!$_smarty_tpl->tpl_vars['runtime']->value['checkout']||$_smarty_tpl->tpl_vars['force_items_deletion']->value)&&!$_smarty_tpl->tpl_vars['p']->value['extra']['exclude_from_calculate']){?><?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_href'=>"checkout.delete.from_status?cart_id=".((string)$_smarty_tpl->tpl_vars['key']->value)."&redirect_url=".((string)$_smarty_tpl->tpl_vars['r_url']->value),'but_meta'=>"cm-ajax cm-ajax-full-render",'but_target_id'=>"cart_status*",'but_role'=>"delete",'but_name'=>"delete_cart_item"), 0);?>
<?php }?></td>
                                    <?php }?>
                                </tr>
                                <?php }?>
                                <?php } ?>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:cart_status"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </table>
                        <?php }else{ ?>
                            <p class="center"><?php echo $_smarty_tpl->__("cart_is_empty");?>
</p>
                        <?php }?>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['display_bottom_buttons']=="Y"){?>
                    <div class="cm-cart-buttons buttons-container<?php if ($_SESSION['cart']['amount']){?> full-cart<?php }else{ ?> hidden<?php }?>">
                        <div class="view-cart-button">
                            <span class="button button-wrap-left"><span class="button button-wrap-right"><a href="<?php echo htmlspecialchars(fn_url("checkout.cart"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="view-cart"><?php echo $_smarty_tpl->__("view_cart");?>
</a></span></span>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['checkout_redirect']!="Y"){?>
                        <div class="float-right">
                            <span class="button-action button-wrap-left"><span class="button-action button-wrap-right"><a href="<?php echo htmlspecialchars(fn_url("checkout.checkout"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo $_smarty_tpl->__("checkout");?>
</a></span></span>
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>

            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:minicart"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
<!--cart_status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:cart_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/cart_content.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/cart_content.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["dropdown_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['snapping_id'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["r_url"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:cart_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:cart_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<div class="dropdown-box" id="cart_status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <a href="<?php echo htmlspecialchars(fn_url("checkout.cart"), ENT_QUOTES, 'UTF-8');?>
" id="sw_dropdown_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="popup-title cm-combination">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:dropdown_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:dropdown_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_SESSION['cart']['amount']){?>
                <i class="icon-basket filled"></i>
                <span class="minicart-title hand"><?php echo htmlspecialchars($_SESSION['cart']['amount'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->__("items");?>
 <?php echo $_smarty_tpl->__("for");?>
&nbsp;<?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_SESSION['cart']['display_subtotal']), 0);?>
<i class="icon-down-micro"></i></span>
            <?php }else{ ?>
                <i class="icon-basket empty"></i>
                <span class="minicart-title empty-cart hand"><?php echo $_smarty_tpl->__("cart_is_empty");?>
<i class="icon-down-micro"></i></span>
            <?php }?>        
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:dropdown_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </a>
    <div id="dropdown_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-popup-box popup-content hidden">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:minicart")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:minicart"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="cm-cart-content <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['products_links_type']=="thumb"){?>cm-cart-content-thumb<?php }?> <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['display_delete_icons']=="Y"){?>cm-cart-content-delete<?php }?>">
                    <div class="cart-items">
                        <?php if ($_SESSION['cart']['amount']){?>
                            <table class="minicart-table">
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:cart_status")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:cart_status"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <?php $_smarty_tpl->tpl_vars["_cart_products"] = new Smarty_variable(array_reverse($_SESSION['cart']['products'],true), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars["p"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["p"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_cart_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["p"]->key => $_smarty_tpl->tpl_vars["p"]->value){
$_smarty_tpl->tpl_vars["p"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["p"]->key;
?>
                                <?php if (!$_smarty_tpl->tpl_vars['p']->value['extra']['parent']){?>
                                <tr class="minicart-separator">
                                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['products_links_type']=="thumb"){?>
                                    <td style="width: 5%" class="cm-cart-item-thumb"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('image_width'=>"40",'image_height'=>"40",'images'=>$_smarty_tpl->tpl_vars['p']->value['main_pair'],'no_ids'=>true), 0);?>
</td>
                                    <?php }?>
                                    <td style="width: 94%"><a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['p']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo fn_get_product_name($_smarty_tpl->tpl_vars['p']->value['product_id']);?>
</a>
                                    <p>
                                        <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['amount'], ENT_QUOTES, 'UTF-8');?>
</span><span>&nbsp;x&nbsp;</span><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('value'=>$_smarty_tpl->tpl_vars['p']->value['display_price'],'span_id'=>"price_".((string)$_smarty_tpl->tpl_vars['key']->value)."_".((string)$_smarty_tpl->tpl_vars['dropdown_id']->value),'class'=>"none"), 0);?>

                                    </p></td>
                                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['display_delete_icons']=="Y"){?>
                                    <td style="width: 1%" class="minicart-tools cm-cart-item-delete"><?php if ((!$_smarty_tpl->tpl_vars['runtime']->value['checkout']||$_smarty_tpl->tpl_vars['force_items_deletion']->value)&&!$_smarty_tpl->tpl_vars['p']->value['extra']['exclude_from_calculate']){?><?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_href'=>"checkout.delete.from_status?cart_id=".((string)$_smarty_tpl->tpl_vars['key']->value)."&redirect_url=".((string)$_smarty_tpl->tpl_vars['r_url']->value),'but_meta'=>"cm-ajax cm-ajax-full-render",'but_target_id'=>"cart_status*",'but_role'=>"delete",'but_name'=>"delete_cart_item"), 0);?>
<?php }?></td>
                                    <?php }?>
                                </tr>
                                <?php }?>
                                <?php } ?>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:cart_status"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </table>
                        <?php }else{ ?>
                            <p class="center"><?php echo $_smarty_tpl->__("cart_is_empty");?>
</p>
                        <?php }?>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['display_bottom_buttons']=="Y"){?>
                    <div class="cm-cart-buttons buttons-container<?php if ($_SESSION['cart']['amount']){?> full-cart<?php }else{ ?> hidden<?php }?>">
                        <div class="view-cart-button">
                            <span class="button button-wrap-left"><span class="button button-wrap-right"><a href="<?php echo htmlspecialchars(fn_url("checkout.cart"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="view-cart"><?php echo $_smarty_tpl->__("view_cart");?>
</a></span></span>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['checkout_redirect']!="Y"){?>
                        <div class="float-right">
                            <span class="button-action button-wrap-left"><span class="button-action button-wrap-right"><a href="<?php echo htmlspecialchars(fn_url("checkout.checkout"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo $_smarty_tpl->__("checkout");?>
</a></span></span>
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>

            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:minicart"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
<!--cart_status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:cart_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?><?php }} ?>