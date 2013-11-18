<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:36:08
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/subheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18319582945289fba8d28853-22557638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84cd1f48a46a14b545c7f9b6fb0928960de57405' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/subheader.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18319582945289fba8d28853-22557638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notes' => 0,
    'notes_id' => 0,
    'meta' => 0,
    'target' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fba8e133e0_77730299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fba8e133e0_77730299')) {function content_5289fba8e133e0_77730299($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['notes']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/help.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('content'=>$_smarty_tpl->tpl_vars['notes']->value,'id'=>$_smarty_tpl->tpl_vars['notes_id']->value), 0);?>

<?php }?>
<h4 class="subheader <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['target']->value){?> hand<?php }?>" <?php if ($_smarty_tpl->tpl_vars['target']->value){?>data-toggle="collapse" data-target="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['target']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

    <?php if ($_smarty_tpl->tpl_vars['target']->value){?><span class="exicon-collapse"></span><?php }?>
</h4><?php }} ?>