<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:12
         compiled from "/home/mike/public_html/umws/design/backend/templates/addons/twigmo/hooks/index/scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2071721847526654a49ca2d0-00040709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c3256795822c2983e7b5314ae459c22fe2eccdb' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/addons/twigmo/hooks/index/scripts.post.tpl',
      1 => 1380199129,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2071721847526654a49ca2d0-00040709',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654a49d11e7_33669428',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654a49d11e7_33669428')) {function content_526654a49d11e7_33669428($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('checkout_terms_n_conditions_alert'));
?>
<script>
    //<![CDATA[
    
    Tygh.$(function (_, $) {
        _.tr("checkout_terms_n_conditions_alert", "<?php echo $_smarty_tpl->__("checkout_terms_n_conditions_alert");?>
");
        
        $.ceFormValidator('registerValidator', {
            class: 'cm-check-agreement',
            message: _.tr("checkout_terms_n_conditions_alert"),
            func: function(id) {
                return $('#' + id).prop('checked');
            }
        });
        
        function fn_tw_copy_email() {
            var tw_email = $('#elm_tw_email').val();
            $('#elm_reset_tw_password').attr(
                'href', 
                'http://twigmo.com/svc/reset_password.php?email=' + tw_email
            );
        }
        
        
        function fn_tw_check_agreement() {
            if (!$('#id_accept_terms').attr('checked')) {
                return false;
            }
            return true;
        }
        
    }(Tygh, Tygh.$));
    
    //]]>
</script><?php }} ?>