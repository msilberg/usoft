<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:11
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/block_manager/render/grid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:818214714526655575782e0-60591754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c2a85aeb72f2d678bd399733ee4f6e3ac6095b9' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/block_manager/render/grid.tpl',
      1 => 1382438042,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '818214714526655575782e0-60591754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout_data' => 0,
    'parent_grid' => 0,
    'grid' => 0,
    'fluid_width' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526655575c0510_13300488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526655575c0510_13300488')) {function content_526655575c0510_13300488($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed"){?>
    <?php if ($_smarty_tpl->tpl_vars['parent_grid']->value['width']>0){?>
        <?php $_smarty_tpl->tpl_vars['fluid_width'] = new Smarty_variable(fn_get_grid_fluid_width($_smarty_tpl->tpl_vars['layout_data']->value['width'],$_smarty_tpl->tpl_vars['parent_grid']->value['width'],$_smarty_tpl->tpl_vars['grid']->value['width']), null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['fluid_width'] = new Smarty_variable($_smarty_tpl->tpl_vars['grid']->value['width'], null, 0);?>
    <?php }?>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['grid']->value['alpha']){?><div class="<?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed"){?>row-fluid <?php }else{ ?>row<?php }?>"><?php }?>
    <div class="span<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['fluid_width']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['grid']->value['width'] : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['grid']->value['offset']){?> offset<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grid']->value['offset'], ENT_QUOTES, 'UTF-8');?>
<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grid']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
" >
        <?php if ($_smarty_tpl->tpl_vars['grid']->value['status']=="A"&&$_smarty_tpl->tpl_vars['content']->value){?>
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        <?php }?>
    </div>
<?php if ($_smarty_tpl->tpl_vars['grid']->value['omega']){?></div><?php }?><?php }} ?>