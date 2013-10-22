<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:21
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/wrappers/sidebox_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187415750252665561690d32-65566785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bc532b246f3e08a7b0eda76d489fd08c2c68b85' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/wrappers/sidebox_general.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '187415750252665561690d32-65566785',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'content' => 0,
    'sidebox_wrapper' => 0,
    'hide_wrapper' => 0,
    'block' => 0,
    'content_alignment' => 0,
    'header_class' => 0,
    'title' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665561739339_06822457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665561739339_06822457')) {function content_52665561739339_06822457($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if (trim($_smarty_tpl->tpl_vars['content']->value)){?>
    <div class="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['sidebox_wrapper']->value)===null||$tmp==='' ? "sidebox-wrapper" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['hide_wrapper']->value)){?> cm-hidden-wrapper<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_wrapper']->value){?> hidden<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['content_alignment']->value=="RIGHT"){?> float-right<?php }elseif($_smarty_tpl->tpl_vars['content_alignment']->value=="LEFT"){?> float-left<?php }?>">
        <h3 class="sidebox-title<?php if ($_smarty_tpl->tpl_vars['header_class']->value){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['header_class']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"wrapper:sidebox_general_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"wrapper:sidebox_general_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (trim(Smarty::$_smarty_vars['capture']['title'])){?>
                <?php echo Smarty::$_smarty_vars['capture']['title'];?>

            <?php }else{ ?>
                <span><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
            <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"wrapper:sidebox_general_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </h3>
        <div class="sidebox-body"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['content']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</div>
    </div>
<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/wrappers/sidebox_general.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/wrappers/sidebox_general.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if (trim($_smarty_tpl->tpl_vars['content']->value)){?>
    <div class="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['sidebox_wrapper']->value)===null||$tmp==='' ? "sidebox-wrapper" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['hide_wrapper']->value)){?> cm-hidden-wrapper<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_wrapper']->value){?> hidden<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['content_alignment']->value=="RIGHT"){?> float-right<?php }elseif($_smarty_tpl->tpl_vars['content_alignment']->value=="LEFT"){?> float-left<?php }?>">
        <h3 class="sidebox-title<?php if ($_smarty_tpl->tpl_vars['header_class']->value){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['header_class']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"wrapper:sidebox_general_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"wrapper:sidebox_general_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (trim(Smarty::$_smarty_vars['capture']['title'])){?>
                <?php echo Smarty::$_smarty_vars['capture']['title'];?>

            <?php }else{ ?>
                <span><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
            <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"wrapper:sidebox_general_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </h3>
        <div class="sidebox-body"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['content']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</div>
    </div>
<?php }?><?php }?><?php }} ?>