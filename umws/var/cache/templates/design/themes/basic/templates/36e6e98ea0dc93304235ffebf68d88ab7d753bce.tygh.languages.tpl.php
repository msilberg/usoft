<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:34:57
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/languages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13139228505289fb614881a7-01423465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36e6e98ea0dc93304235ffebf68d88ab7d753bce' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/languages.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '13139228505289fb614881a7-01423465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'languages' => 0,
    'dropdown_limit' => 0,
    'config' => 0,
    'language' => 0,
    'code' => 0,
    'format' => 0,
    'key_name' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb61587803_47021692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb61587803_47021692')) {function content_5289fb61587803_47021692($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('change_language','change_language'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div id="languages_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
">
    <?php if ($_smarty_tpl->tpl_vars['languages']->value&&count($_smarty_tpl->tpl_vars['languages']->value)>1){?>
    <?php if ($_smarty_tpl->tpl_vars['dropdown_limit']->value>0&&count($_smarty_tpl->tpl_vars['languages']->value)<=$_smarty_tpl->tpl_vars['dropdown_limit']->value){?>
        <div class="select-wrap languages">
            <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['code'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['code']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
                <a href="<?php echo htmlspecialchars(fn_link_attach($_smarty_tpl->tpl_vars['config']->value['current_url'],"sl=".((string)$_smarty_tpl->tpl_vars['language']->value['lang_code'])), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("change_language");?>
" class="<?php if (@constant('DESCR_SL')==$_smarty_tpl->tpl_vars['code']->value){?>active-element<?php }?>"><i class="flag flag-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['language']->value['country_code'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
"></i><?php if ($_smarty_tpl->tpl_vars['format']->value=="name"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?></a>
            <?php } ?>
        </div>
    <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['format']->value=="name"){?>
            <?php $_smarty_tpl->tpl_vars["key_name"] = new Smarty_variable("name", null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["key_name"] = new Smarty_variable('', null, 0);?>
        <?php }?>
        <div class="select-wrap"><?php echo $_smarty_tpl->getSubTemplate ("common/select_object.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('style'=>"graphic",'suffix'=>"language",'link_tpl'=>fn_link_attach($_smarty_tpl->tpl_vars['config']->value['current_url'],"sl="),'items'=>$_smarty_tpl->tpl_vars['languages']->value,'selected_id'=>@constant('CART_LANGUAGE'),'display_icons'=>true,'key_name'=>$_smarty_tpl->tpl_vars['key_name']->value,'language_var_name'=>"sl"), 0);?>
</div>
    <?php }?>
<?php }?>

<!--languages_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
--></div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/languages.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/languages.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><div id="languages_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
">
    <?php if ($_smarty_tpl->tpl_vars['languages']->value&&count($_smarty_tpl->tpl_vars['languages']->value)>1){?>
    <?php if ($_smarty_tpl->tpl_vars['dropdown_limit']->value>0&&count($_smarty_tpl->tpl_vars['languages']->value)<=$_smarty_tpl->tpl_vars['dropdown_limit']->value){?>
        <div class="select-wrap languages">
            <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['code'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['code']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
                <a href="<?php echo htmlspecialchars(fn_link_attach($_smarty_tpl->tpl_vars['config']->value['current_url'],"sl=".((string)$_smarty_tpl->tpl_vars['language']->value['lang_code'])), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("change_language");?>
" class="<?php if (@constant('DESCR_SL')==$_smarty_tpl->tpl_vars['code']->value){?>active-element<?php }?>"><i class="flag flag-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['language']->value['country_code'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
"></i><?php if ($_smarty_tpl->tpl_vars['format']->value=="name"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?></a>
            <?php } ?>
        </div>
    <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['format']->value=="name"){?>
            <?php $_smarty_tpl->tpl_vars["key_name"] = new Smarty_variable("name", null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["key_name"] = new Smarty_variable('', null, 0);?>
        <?php }?>
        <div class="select-wrap"><?php echo $_smarty_tpl->getSubTemplate ("common/select_object.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('style'=>"graphic",'suffix'=>"language",'link_tpl'=>fn_link_attach($_smarty_tpl->tpl_vars['config']->value['current_url'],"sl="),'items'=>$_smarty_tpl->tpl_vars['languages']->value,'selected_id'=>@constant('CART_LANGUAGE'),'display_icons'=>true,'key_name'=>$_smarty_tpl->tpl_vars['key_name']->value,'language_var_name'=>"sl"), 0);?>
</div>
    <?php }?>
<?php }?>

<!--languages_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
--></div><?php }?><?php }} ?>