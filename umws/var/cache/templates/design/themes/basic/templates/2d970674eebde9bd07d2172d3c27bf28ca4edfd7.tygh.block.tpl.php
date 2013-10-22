<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:11
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/block_manager/render/block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4599971975266555744a788-01579596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d970674eebde9bd07d2172d3c27bf28ca4edfd7' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/block_manager/render/block.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '4599971975266555744a788-01579596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block' => 0,
    'content_alignment' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665557474506_35189278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665557474506_35189278')) {function content_52665557474506_35189278($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']||$_smarty_tpl->tpl_vars['content_alignment']->value=='RIGHT'||$_smarty_tpl->tpl_vars['content_alignment']->value=='LEFT'){?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']){?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['content_alignment']->value=='RIGHT'){?> float-right<?php }elseif($_smarty_tpl->tpl_vars['content_alignment']->value=='LEFT'){?>
    float-left<?php }?>">
<?php }?>
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']||$_smarty_tpl->tpl_vars['content_alignment']->value=='RIGHT'||$_smarty_tpl->tpl_vars['content_alignment']->value=='LEFT'){?>
    </div>
<?php }?><?php }} ?>