<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:33:00
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/comet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182449695289faec1f5165-01055012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10a91192014793210412ea4ebca9fcde05226cae' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/comet.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '182449695289faec1f5165-01055012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289faec1fb7e1_06473309',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289faec1fb7e1_06473309')) {function content_5289faec1fb7e1_06473309($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('processing'));
?>
<a id="comet_container_controller" data-backdrop="static" data-keyboard="false" href="#comet_control" data-toggle="modal" class="hide"></a>

<div class="modal hide fade" id="comet_control" tabindex="-1" role="dialog" aria-labelledby="comet_title" aria-hidden="true">
    <div class="modal-header">
        <h3 id="comet_title"><?php echo $_smarty_tpl->__("processing");?>
</h3>
    </div>
    <div class="modal-body">
        <p></p>
        <div class="progress progress-striped active">
            
            <div class="bar" style="width: 0%;"></div>
        </div>
    </div>
</div><?php }} ?>