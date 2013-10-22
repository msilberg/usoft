<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:25
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/addons/wishlist/views/wishlist/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166788561852665565cb3fa5-73683406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42168e455c5714e7833bf7ed5d20e34232a6efe8' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/addons/wishlist/views/wishlist/view.tpl',
      1 => 1382438050,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '166788561852665565cb3fa5-73683406',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'wishlist' => 0,
    'products' => 0,
    'columns' => 0,
    'iteration' => 0,
    'empty_count' => 0,
    'cell_width' => 0,
    'continue_url' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665565e03286_06059023',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665565e03286_06059023')) {function content_52665565e03286_06059023($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('empty','clear_wishlist','wishlist_content','empty','clear_wishlist','wishlist_content'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars["columns"] = new Smarty_variable(4, null, 0);?>
<?php if (!fn_cart_is_empty($_smarty_tpl->tpl_vars['wishlist']->value)){?>

    <?php echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars["show_hr"] = new Smarty_variable(false, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["location"] = new Smarty_variable("cart", null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("blocks/list_templates/grid_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('columns'=>$_smarty_tpl->tpl_vars['columns']->value,'show_empty'=>true,'show_trunc_name'=>true,'show_old_price'=>true,'show_price'=>true,'show_clean_price'=>true,'show_list_discount'=>true,'no_pagination'=>true,'no_sorting'=>true,'show_add_to_cart'=>false,'is_wishlist'=>true), 0);?>

<?php }else{ ?>
<?php echo smarty_function_math(array('equation'=>"100 / x",'x'=>(($tmp = @$_smarty_tpl->tpl_vars['columns']->value)===null||$tmp==='' ? "2" : $tmp),'assign'=>"cell_width"),$_smarty_tpl);?>

<table class="fixed-layout multicolumns-list table-width">
    <tr class="row-border">
    <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable(0, null, 0);?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("iteration", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iteration']->value, ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"wishlist:view")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"wishlist:view"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"wishlist:view"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable(Smarty::$_smarty_vars['capture']['iteration'], null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['iteration']->value==0||$_smarty_tpl->tpl_vars['iteration']->value%$_smarty_tpl->tpl_vars['columns']->value!=0){?> 
        <?php echo smarty_function_math(array('assign'=>"empty_count",'equation'=>"c - it%c",'it'=>$_smarty_tpl->tpl_vars['iteration']->value,'c'=>$_smarty_tpl->tpl_vars['columns']->value),$_smarty_tpl);?>

        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['empty_count']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['name'] = "empty_rows";
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total']);
?>
            <td class="product-spacer">&nbsp;</td>
            <td class="product-cell product-cell-empty valign-top" style="width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cell_width']->value, ENT_QUOTES, 'UTF-8');?>
%">
                <div>
                    <p><?php echo $_smarty_tpl->__("empty");?>
</p>
                </div>
            </td>
            <td class="product-spacer">&nbsp;</td>
        <?php endfor; endif; ?>
    <?php }?>

    </tr>
</table>
<?php }?>
<?php if (!fn_cart_is_empty($_smarty_tpl->tpl_vars['wishlist']->value)){?>
    <div class="buttons-container wish-list-btn">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_text'=>__("clear_wishlist"),'but_href'=>"wishlist.clear"), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("buttons/continue_shopping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_href'=>fn_url($_smarty_tpl->tpl_vars['continue_url']->value),'but_role'=>"text"), 0);?>

    </div>
<?php }else{ ?>
    <div class="buttons-container wish-list-btn wish-list-continue">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/continue_shopping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_href'=>fn_url($_smarty_tpl->tpl_vars['continue_url']->value),'but_role'=>"text"), 0);?>

    </div>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><?php echo $_smarty_tpl->__("wishlist_content");?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="addons/wishlist/views/wishlist/view.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/wishlist/views/wishlist/view.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["columns"] = new Smarty_variable(4, null, 0);?>
<?php if (!fn_cart_is_empty($_smarty_tpl->tpl_vars['wishlist']->value)){?>

    <?php echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars["show_hr"] = new Smarty_variable(false, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["location"] = new Smarty_variable("cart", null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("blocks/list_templates/grid_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('columns'=>$_smarty_tpl->tpl_vars['columns']->value,'show_empty'=>true,'show_trunc_name'=>true,'show_old_price'=>true,'show_price'=>true,'show_clean_price'=>true,'show_list_discount'=>true,'no_pagination'=>true,'no_sorting'=>true,'show_add_to_cart'=>false,'is_wishlist'=>true), 0);?>

<?php }else{ ?>
<?php echo smarty_function_math(array('equation'=>"100 / x",'x'=>(($tmp = @$_smarty_tpl->tpl_vars['columns']->value)===null||$tmp==='' ? "2" : $tmp),'assign'=>"cell_width"),$_smarty_tpl);?>

<table class="fixed-layout multicolumns-list table-width">
    <tr class="row-border">
    <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable(0, null, 0);?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("iteration", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iteration']->value, ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"wishlist:view")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"wishlist:view"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"wishlist:view"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable(Smarty::$_smarty_vars['capture']['iteration'], null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['iteration']->value==0||$_smarty_tpl->tpl_vars['iteration']->value%$_smarty_tpl->tpl_vars['columns']->value!=0){?> 
        <?php echo smarty_function_math(array('assign'=>"empty_count",'equation'=>"c - it%c",'it'=>$_smarty_tpl->tpl_vars['iteration']->value,'c'=>$_smarty_tpl->tpl_vars['columns']->value),$_smarty_tpl);?>

        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['empty_count']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['name'] = "empty_rows";
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["empty_rows"]['total']);
?>
            <td class="product-spacer">&nbsp;</td>
            <td class="product-cell product-cell-empty valign-top" style="width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cell_width']->value, ENT_QUOTES, 'UTF-8');?>
%">
                <div>
                    <p><?php echo $_smarty_tpl->__("empty");?>
</p>
                </div>
            </td>
            <td class="product-spacer">&nbsp;</td>
        <?php endfor; endif; ?>
    <?php }?>

    </tr>
</table>
<?php }?>
<?php if (!fn_cart_is_empty($_smarty_tpl->tpl_vars['wishlist']->value)){?>
    <div class="buttons-container wish-list-btn">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_text'=>__("clear_wishlist"),'but_href'=>"wishlist.clear"), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("buttons/continue_shopping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_href'=>fn_url($_smarty_tpl->tpl_vars['continue_url']->value),'but_role'=>"text"), 0);?>

    </div>
<?php }else{ ?>
    <div class="buttons-container wish-list-btn wish-list-continue">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/continue_shopping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_href'=>fn_url($_smarty_tpl->tpl_vars['continue_url']->value),'but_role'=>"text"), 0);?>

    </div>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><?php echo $_smarty_tpl->__("wishlist_content");?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php }?><?php }} ?>