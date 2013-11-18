<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:35:51
         compiled from "/home/mike/public_html/umws/design/backend/templates/pickers/products/js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7797339725289fb97722c39-45130559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04ef5cd72705a2376b0f2761fbb8aeef5d6e7950' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/pickers/products/js.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7797339725289fb97722c39-45130559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_id' => 0,
    'runtime' => 0,
    'product_data' => 0,
    'product' => 0,
    'owner_company_id' => 0,
    'type' => 0,
    'clone' => 0,
    'root_id' => 0,
    'delete_id' => 0,
    'position_field' => 0,
    'input_name' => 0,
    'position' => 0,
    'show_only_name' => 0,
    'options' => 0,
    'options_array' => 0,
    'option_id' => 0,
    'option' => 0,
    'amount_input' => 0,
    'amount' => 0,
    'hide_delete_button' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb9785b891_65549805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb9785b891_65549805')) {function content_5289fb9785b891_65549805($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('delete','edit','remove'));
?>
<?php if (fn_allowed_for("ULTIMATE")&&$_smarty_tpl->tpl_vars['product_id']->value&&$_smarty_tpl->tpl_vars['runtime']->value['company_id']){?>
    <?php $_smarty_tpl->tpl_vars["product_data"] = new Smarty_variable(fn_get_product_data($_smarty_tpl->tpl_vars['product_id']->value,$_SESSION['auth'],@constant('CART_LANGUAGE'),"?:products.company_id,?:product_descriptions.product",false,false,false,false,false,false,true), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['product_data']->value['company_id']!=$_smarty_tpl->tpl_vars['runtime']->value['company_id']){?>
        <?php $_smarty_tpl->tpl_vars["product"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['product_data']->value['product'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value : $tmp), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['owner_company_id']->value&&$_smarty_tpl->tpl_vars['owner_company_id']->value!=$_smarty_tpl->tpl_vars['runtime']->value['company_id']){?>
            <?php $_smarty_tpl->tpl_vars["show_only_name"] = new Smarty_variable(true, null, 0);?>
        <?php }?>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['type']->value=="options"){?>
<tr <?php if (!$_smarty_tpl->tpl_vars['clone']->value){?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['root_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delete_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php }?>class="cm-js-item<?php if ($_smarty_tpl->tpl_vars['clone']->value){?> cm-clone hidden<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['position_field']->value){?><td><input type="text" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delete_id']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo smarty_function_math(array('equation'=>"a*b",'a'=>$_smarty_tpl->tpl_vars['position']->value,'b'=>10),$_smarty_tpl);?>
" size="3" class="input-text-short" <?php if ($_smarty_tpl->tpl_vars['clone']->value){?>disabled="disabled"<?php }?> /></td><?php }?>
<td>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value, ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['show_only_name']->value){?><?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('object'=>$_smarty_tpl->tpl_vars['product_data']->value), 0);?>
<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['options']->value){?>
        <br>
        <small><?php echo $_smarty_tpl->tpl_vars['options']->value;?>
</small>
    <?php }?>
    <?php if (is_array($_smarty_tpl->tpl_vars['options_array']->value)){?>
        <?php  $_smarty_tpl->tpl_vars["option"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["option"]->_loop = false;
 $_smarty_tpl->tpl_vars["option_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['options_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["option"]->key => $_smarty_tpl->tpl_vars["option"]->value){
$_smarty_tpl->tpl_vars["option"]->_loop = true;
 $_smarty_tpl->tpl_vars["option_id"]->value = $_smarty_tpl->tpl_vars["option"]->key;
?>
        <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
[product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option_id']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['clone']->value){?> disabled="disabled"<?php }?> />
        <?php } ?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['product_id']->value){?>
        <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
[product_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['clone']->value){?> disabled="disabled"<?php }?> />
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['amount_input']->value=="hidden"){?>
        <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
[amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['clone']->value){?> disabled="disabled"<?php }?> />
    <?php }?>
</td>
    <?php if ($_smarty_tpl->tpl_vars['amount_input']->value=="text"){?>
<td class="center">
    <?php if ($_smarty_tpl->tpl_vars['show_only_name']->value){?>
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8');?>

    <?php }else{ ?>
        <input type="text" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
[amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8');?>
" size="3" class="input-micro"<?php if ($_smarty_tpl->tpl_vars['clone']->value){?> disabled="disabled"<?php }?> />
    <?php }?>
</td>
    <?php }?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"product_picker:table_column_options")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"product_picker:table_column_options"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"product_picker:table_column_options"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<td class="nowrap">
    <?php if (!$_smarty_tpl->tpl_vars['hide_delete_button']->value&&!$_smarty_tpl->tpl_vars['show_only_name']->value){?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("delete"),'onclick'=>"Tygh."."$".".cePicker('delete_js_item', '".((string)$_smarty_tpl->tpl_vars['root_id']->value)."', '".((string)$_smarty_tpl->tpl_vars['delete_id']->value)."', 'p'); return false;"));?>
</li>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <div class="hidden-tools">
            <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

        </div>
    <?php }else{ ?>&nbsp;<?php }?>
</td>
</tr>

<?php }elseif($_smarty_tpl->tpl_vars['type']->value=="product"){?>
    <tr <?php if (!$_smarty_tpl->tpl_vars['clone']->value){?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['root_id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delete_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php }?>class="cm-js-item<?php if ($_smarty_tpl->tpl_vars['clone']->value){?> cm-clone hidden<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['position_field']->value){?><td><input type="text" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delete_id']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo smarty_function_math(array('equation'=>"a*b",'a'=>$_smarty_tpl->tpl_vars['position']->value,'b'=>10),$_smarty_tpl);?>
" size="3" class="input-text-short" <?php if ($_smarty_tpl->tpl_vars['clone']->value){?>disabled="disabled"<?php }?> /></td><?php }?>
        <td><?php if (!$_smarty_tpl->tpl_vars['show_only_name']->value){?><a href="<?php echo htmlspecialchars(fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['delete_id']->value)), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value;?>
</a><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['product']->value;?>
 <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('object'=>$_smarty_tpl->tpl_vars['product_data']->value), 0);?>
<?php }?></td>
        <td>&nbsp;</td>
        <td class="nowrap"><?php if (!$_smarty_tpl->tpl_vars['hide_delete_button']->value&&!$_smarty_tpl->tpl_vars['show_only_name']->value){?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("edit"),'href'=>"products.update?product_id=".((string)$_smarty_tpl->tpl_vars['delete_id']->value)));?>
</li>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("remove"),'onclick'=>"Tygh."."$".".cePicker('delete_js_item', '".((string)$_smarty_tpl->tpl_vars['root_id']->value)."', '".((string)$_smarty_tpl->tpl_vars['delete_id']->value)."', 'p'); return false;"));?>
</li>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <div class="hidden-tools">
                <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

            </div>
        <?php }?></td>
    </tr>
<?php }?>
<?php }} ?>