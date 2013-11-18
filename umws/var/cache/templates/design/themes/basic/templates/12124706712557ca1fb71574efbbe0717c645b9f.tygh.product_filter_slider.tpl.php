<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 16:31:35
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/product_filters/components/product_filter_slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1086865859528a08a7118580-81354631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12124706712557ca1fb71574efbbe0717c645b9f' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/product_filters/components/product_filter_slider.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1086865859528a08a7118580-81354631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'filter' => 0,
    'min' => 0,
    'max' => 0,
    'dynamic' => 0,
    'filter_qstring' => 0,
    'filter_slider_hash' => 0,
    'filter_slider_url' => 0,
    'config' => 0,
    'filter_uid' => 0,
    'extra_class' => 0,
    'id' => 0,
    'left' => 0,
    'disable_slider' => 0,
    'right' => 0,
    'secondary_currency' => 0,
    'currencies' => 0,
    'num_25' => 0,
    'num_50' => 0,
    'num_75' => 0,
    '_right' => 0,
    'allow_ajax' => 0,
    'use_ajax' => 0,
    'ajax_div_ids' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a08a73b46d2_18973416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a08a73b46d2_18973416')) {function content_528a08a73b46d2_18973416($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars["min"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['range_values']['min'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["max"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['range_values']['max'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["left"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['filter']->value['range_values']['left'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['min']->value : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["right"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['filter']->value['range_values']['right'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['max']->value : $tmp), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['max']->value-$_smarty_tpl->tpl_vars['min']->value<=$_smarty_tpl->tpl_vars['filter']->value['round_to']){?>
    <?php $_smarty_tpl->tpl_vars["disable_slider"] = new Smarty_variable(true, null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['max']->value-$_smarty_tpl->tpl_vars['min']->value>=(4*$_smarty_tpl->tpl_vars['filter']->value['round_to'])){?>
    <?php echo smarty_function_math(array('equation'=>"min + round((max - min) * 0.25 / rto) * rto",'max'=>$_smarty_tpl->tpl_vars['max']->value,'min'=>$_smarty_tpl->tpl_vars['min']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"num_25"),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"min + round((max - min) * 0.50 / rto) * rto",'max'=>$_smarty_tpl->tpl_vars['max']->value,'min'=>$_smarty_tpl->tpl_vars['min']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"num_50"),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"min + round((max - min) * 0.75 / rto) * rto",'max'=>$_smarty_tpl->tpl_vars['max']->value,'min'=>$_smarty_tpl->tpl_vars['min']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"num_75"),$_smarty_tpl);?>

<?php }?>

<?php if (fn_string_not_empty($_smarty_tpl->tpl_vars['filter']->value['range_values']['left'])||fn_string_not_empty($_smarty_tpl->tpl_vars['filter']->value['range_values']['right'])){?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("has_selected", null, null); ob_start(); ?>Y<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['dynamic']->value){?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_hash"] = new Smarty_variable(fn_add_range_to_url_hash($_REQUEST['features_hash'],'###-###',$_smarty_tpl->tpl_vars['filter']->value['field_type']), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_url"] = new Smarty_variable(fn_url(fn_link_attach($_smarty_tpl->tpl_vars['filter_qstring']->value,"features_hash=".((string)$_smarty_tpl->tpl_vars['filter_slider_hash']->value))), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(fn_compare_dispatch($_smarty_tpl->tpl_vars['filter_slider_url']->value,$_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_hash"] = new Smarty_variable(fn_add_range_to_url_hash('','###-###',$_smarty_tpl->tpl_vars['filter']->value['field_type']), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_url"] = new Smarty_variable(fn_url("products.search?features_hash=".((string)$_smarty_tpl->tpl_vars['filter_slider_hash']->value)), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(false, null, 0);?>
<?php }?>

<div id="content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="price-slider hidden <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra_class']->value, ENT_QUOTES, 'UTF-8');?>
">
    <input type="text" class="input-text" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_left" name="left_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['left']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['disable_slider']->value){?> disabled="disabled"<?php }?> />
    &nbsp;–&nbsp;
    <input type="text" class="input-text" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_right" name="right_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['right']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['disable_slider']->value){?> disabled="disabled"<?php }?> />
    <?php if ($_smarty_tpl->tpl_vars['filter']->value['field_type']=='P'){?>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value]['symbol'];?>

    <?php }?>

    <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="range-slider cm-range-slider">    <ul>
        <li style="left: 0%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['min']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
        <?php if ($_smarty_tpl->tpl_vars['num_25']->value){?>
            <li style="left: 25%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_25']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
            <li style="left: 50%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_50']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
            <li style="left: 75%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_75']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
        <?php }?>
        <li style="left: 100%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
    </ul></div>

    <?php if ($_smarty_tpl->tpl_vars['right']->value==$_smarty_tpl->tpl_vars['left']->value){?>
        <?php echo smarty_function_math(array('equation'=>"left + rto",'left'=>$_smarty_tpl->tpl_vars['left']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"_right"),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars["_right"] = new Smarty_variable($_smarty_tpl->tpl_vars['right']->value, null, 0);?>
    <?php }?>
    
    <input type="hidden" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_json" value='{
        "disabled": <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['disable_slider']->value)===null||$tmp==='' ? "false" : $tmp), ENT_QUOTES, 'UTF-8');?>
,
        "min": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['min']->value, ENT_QUOTES, 'UTF-8');?>
,
        "max": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max']->value, ENT_QUOTES, 'UTF-8');?>
,
        "left": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['left']->value, ENT_QUOTES, 'UTF-8');?>
,
        "right": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_right']->value, ENT_QUOTES, 'UTF-8');?>
,
        "step": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['round_to'], ENT_QUOTES, 'UTF-8');?>
,
        "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_slider_url']->value, ENT_QUOTES, 'UTF-8');?>
",
        "type": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['field_type'], ENT_QUOTES, 'UTF-8');?>
",
        "currency": "<?php echo htmlspecialchars(@constant('CART_SECONDARY_CURRENCY'), ENT_QUOTES, 'UTF-8');?>
",
        "ajax": <?php if ($_smarty_tpl->tpl_vars['allow_ajax']->value&&$_smarty_tpl->tpl_vars['use_ajax']->value){?>true<?php }else{ ?>false<?php }?>,
        "result_ids": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_div_ids']->value, ENT_QUOTES, 'UTF-8');?>
",
        "scroll": ".cm-pagination-container"
    }' />
    

</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/product_filters/components/product_filter_slider.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/product_filters/components/product_filter_slider.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["min"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['range_values']['min'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["max"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['range_values']['max'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["left"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['filter']->value['range_values']['left'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['min']->value : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["right"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['filter']->value['range_values']['right'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['max']->value : $tmp), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['max']->value-$_smarty_tpl->tpl_vars['min']->value<=$_smarty_tpl->tpl_vars['filter']->value['round_to']){?>
    <?php $_smarty_tpl->tpl_vars["disable_slider"] = new Smarty_variable(true, null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['max']->value-$_smarty_tpl->tpl_vars['min']->value>=(4*$_smarty_tpl->tpl_vars['filter']->value['round_to'])){?>
    <?php echo smarty_function_math(array('equation'=>"min + round((max - min) * 0.25 / rto) * rto",'max'=>$_smarty_tpl->tpl_vars['max']->value,'min'=>$_smarty_tpl->tpl_vars['min']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"num_25"),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"min + round((max - min) * 0.50 / rto) * rto",'max'=>$_smarty_tpl->tpl_vars['max']->value,'min'=>$_smarty_tpl->tpl_vars['min']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"num_50"),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"min + round((max - min) * 0.75 / rto) * rto",'max'=>$_smarty_tpl->tpl_vars['max']->value,'min'=>$_smarty_tpl->tpl_vars['min']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"num_75"),$_smarty_tpl);?>

<?php }?>

<?php if (fn_string_not_empty($_smarty_tpl->tpl_vars['filter']->value['range_values']['left'])||fn_string_not_empty($_smarty_tpl->tpl_vars['filter']->value['range_values']['right'])){?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("has_selected", null, null); ob_start(); ?>Y<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['dynamic']->value){?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_hash"] = new Smarty_variable(fn_add_range_to_url_hash($_REQUEST['features_hash'],'###-###',$_smarty_tpl->tpl_vars['filter']->value['field_type']), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_url"] = new Smarty_variable(fn_url(fn_link_attach($_smarty_tpl->tpl_vars['filter_qstring']->value,"features_hash=".((string)$_smarty_tpl->tpl_vars['filter_slider_hash']->value))), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(fn_compare_dispatch($_smarty_tpl->tpl_vars['filter_slider_url']->value,$_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_hash"] = new Smarty_variable(fn_add_range_to_url_hash('','###-###',$_smarty_tpl->tpl_vars['filter']->value['field_type']), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["filter_slider_url"] = new Smarty_variable(fn_url("products.search?features_hash=".((string)$_smarty_tpl->tpl_vars['filter_slider_hash']->value)), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(false, null, 0);?>
<?php }?>

<div id="content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="price-slider hidden <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra_class']->value, ENT_QUOTES, 'UTF-8');?>
">
    <input type="text" class="input-text" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_left" name="left_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['left']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['disable_slider']->value){?> disabled="disabled"<?php }?> />
    &nbsp;–&nbsp;
    <input type="text" class="input-text" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_right" name="right_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['right']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['disable_slider']->value){?> disabled="disabled"<?php }?> />
    <?php if ($_smarty_tpl->tpl_vars['filter']->value['field_type']=='P'){?>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value]['symbol'];?>

    <?php }?>

    <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="range-slider cm-range-slider">    <ul>
        <li style="left: 0%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['min']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
        <?php if ($_smarty_tpl->tpl_vars['num_25']->value){?>
            <li style="left: 25%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_25']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
            <li style="left: 50%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_50']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
            <li style="left: 75%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_75']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
        <?php }?>
        <li style="left: 100%;"><i><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max']->value, ENT_QUOTES, 'UTF-8');?>
</b></i></li>
    </ul></div>

    <?php if ($_smarty_tpl->tpl_vars['right']->value==$_smarty_tpl->tpl_vars['left']->value){?>
        <?php echo smarty_function_math(array('equation'=>"left + rto",'left'=>$_smarty_tpl->tpl_vars['left']->value,'rto'=>$_smarty_tpl->tpl_vars['filter']->value['round_to'],'assign'=>"_right"),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars["_right"] = new Smarty_variable($_smarty_tpl->tpl_vars['right']->value, null, 0);?>
    <?php }?>
    
    <input type="hidden" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_json" value='{
        "disabled": <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['disable_slider']->value)===null||$tmp==='' ? "false" : $tmp), ENT_QUOTES, 'UTF-8');?>
,
        "min": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['min']->value, ENT_QUOTES, 'UTF-8');?>
,
        "max": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max']->value, ENT_QUOTES, 'UTF-8');?>
,
        "left": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['left']->value, ENT_QUOTES, 'UTF-8');?>
,
        "right": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_right']->value, ENT_QUOTES, 'UTF-8');?>
,
        "step": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['round_to'], ENT_QUOTES, 'UTF-8');?>
,
        "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_slider_url']->value, ENT_QUOTES, 'UTF-8');?>
",
        "type": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['field_type'], ENT_QUOTES, 'UTF-8');?>
",
        "currency": "<?php echo htmlspecialchars(@constant('CART_SECONDARY_CURRENCY'), ENT_QUOTES, 'UTF-8');?>
",
        "ajax": <?php if ($_smarty_tpl->tpl_vars['allow_ajax']->value&&$_smarty_tpl->tpl_vars['use_ajax']->value){?>true<?php }else{ ?>false<?php }?>,
        "result_ids": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_div_ids']->value, ENT_QUOTES, 'UTF-8');?>
",
        "scroll": ".cm-pagination-container"
    }' />
    

</div>
<?php }?><?php }} ?>