<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:13
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/wrappers/mainbox_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36261675552665559242be5-78310373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e3e5faa1c7e614e99e2cbad4d53053791c22932' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/wrappers/mainbox_general.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '36261675552665559242be5-78310373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'content' => 0,
    'anchor' => 0,
    'hide_wrapper' => 0,
    'details_page' => 0,
    'block' => 0,
    'content_alignment' => 0,
    'title' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266555932d399_24910127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266555932d399_24910127')) {function content_5266555932d399_24910127($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if (trim($_smarty_tpl->tpl_vars['content']->value)){?>
    <?php if ($_smarty_tpl->tpl_vars['anchor']->value){?>
    <a name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['anchor']->value, ENT_QUOTES, 'UTF-8');?>
"></a>
    <?php }?>
    <div class="mainbox-container clearfix<?php if (isset($_smarty_tpl->tpl_vars['hide_wrapper']->value)){?> cm-hidden-wrapper<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_wrapper']->value){?> hidden<?php }?><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?> details-page<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['content_alignment']->value=="RIGHT"){?> float-right<?php }elseif($_smarty_tpl->tpl_vars['content_alignment']->value=="LEFT"){?> float-left<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['title']->value||trim(Smarty::$_smarty_vars['capture']['title'])){?>
            <h1 class="mainbox-title">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"wrapper:mainbox_general_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"wrapper:mainbox_general_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if (trim(Smarty::$_smarty_vars['capture']['title'])){?>
                    <?php echo Smarty::$_smarty_vars['capture']['title'];?>

                <?php }else{ ?>
                    <span><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                <?php }?>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"wrapper:mainbox_general_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </h1>
        <?php }?>
        <div class="mainbox-body"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
    </div>
<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/wrappers/mainbox_general.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/wrappers/mainbox_general.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if (trim($_smarty_tpl->tpl_vars['content']->value)){?>
    <?php if ($_smarty_tpl->tpl_vars['anchor']->value){?>
    <a name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['anchor']->value, ENT_QUOTES, 'UTF-8');?>
"></a>
    <?php }?>
    <div class="mainbox-container clearfix<?php if (isset($_smarty_tpl->tpl_vars['hide_wrapper']->value)){?> cm-hidden-wrapper<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_wrapper']->value){?> hidden<?php }?><?php if ($_smarty_tpl->tpl_vars['details_page']->value){?> details-page<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['content_alignment']->value=="RIGHT"){?> float-right<?php }elseif($_smarty_tpl->tpl_vars['content_alignment']->value=="LEFT"){?> float-left<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['title']->value||trim(Smarty::$_smarty_vars['capture']['title'])){?>
            <h1 class="mainbox-title">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"wrapper:mainbox_general_title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"wrapper:mainbox_general_title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if (trim(Smarty::$_smarty_vars['capture']['title'])){?>
                    <?php echo Smarty::$_smarty_vars['capture']['title'];?>

                <?php }else{ ?>
                    <span><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                <?php }?>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"wrapper:mainbox_general_title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </h1>
        <?php }?>
        <div class="mainbox-body"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
    </div>
<?php }?><?php }?><?php }} ?>