<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:47
         compiled from "/home/mike/public_html/umws/design/backend/templates/views/settings_wizard/components/ssl_checking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:409583919526654c75e4cd2-27308906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e57791aba9d286bc765dbda8608b56f6d6ce72ee' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/views/settings_wizard/components/ssl_checking.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '409583919526654c75e4cd2-27308906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'checking_result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654c76254a6_04175947',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654c76254a6_04175947')) {function content_526654c76254a6_04175947($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('warning_https_disabled','ssl_certificate','check_ssl','fail','ok'));
?>
<div id="ssl_checking">
    <?php if ($_smarty_tpl->tpl_vars['checking_result']->value=="fail"){?>
    <br>
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p><?php echo $_smarty_tpl->__("warning_https_disabled");?>
</p>
    </div>
    <?php }?>
    <br>
    <div class="control-group setting-wide">
        <label for="" class="control-label"><?php echo $_smarty_tpl->__("ssl_certificate");?>
</label>
        <div class="controls">
            <a class="btn cm-ajax" href="<?php echo htmlspecialchars(fn_url("settings_wizard.check_ssl"), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="ssl_checking"><?php echo $_smarty_tpl->__("check_ssl");?>
</a>
            <?php if ($_smarty_tpl->tpl_vars['checking_result']->value=="fail"){?>
                <span class="label label-important"><?php echo $_smarty_tpl->__("fail");?>
</span>
            <?php }elseif($_smarty_tpl->tpl_vars['checking_result']->value=="ok"){?>
                <span class="label label-success"><?php echo $_smarty_tpl->__("ok");?>
</span>
            <?php }?>
        </div>
    </div>
<!--ssl_checking--></div><?php }} ?>