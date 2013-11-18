<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:34:47
         compiled from "/home/mike/public_html/umws/design/backend/templates/addons/news_and_emails/hooks/index/recent_activity_item.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19937812355289fb57e673d3-00722105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66759f5650958651053b70072710dcbad97ad715' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/addons/news_and_emails/hooks/index/recent_activity_item.post.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '19937812355289fb57e673d3-00722105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb57ed0db8_63234587',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb57ed0db8_63234587')) {function content_5289fb57ed0db8_63234587($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['type']=="news"){?>
    <a href="<?php echo htmlspecialchars(fn_url("news.update?news_id=".((string)$_smarty_tpl->tpl_vars['item']->value['content']['id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['content']['news'], ENT_QUOTES, 'UTF-8');?>
</a><br>                        
<?php }?><?php }} ?>