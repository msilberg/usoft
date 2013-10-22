<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:12
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/block_manager/render/container.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1154459589526655582b71c1-36315610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b35fd2cc11f3e15f8b8ad494b74562c85242bb91' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/block_manager/render/container.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1154459589526655582b71c1-36315610',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout_data' => 0,
    'container' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526655582c6c38_29666497',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526655582c6c38_29666497')) {function content_526655582c6c38_29666497($_smarty_tpl) {?><div class="<?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed"){?>container-fluid <?php }else{ ?>container<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['container']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div><?php }} ?>