<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:13
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/comet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1271717633526654a5cb9fd6-96040676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10a91192014793210412ea4ebca9fcde05226cae' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/comet.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1271717633526654a5cb9fd6-96040676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654a5cbf776_11304012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654a5cbf776_11304012')) {function content_526654a5cbf776_11304012($_smarty_tpl) {?><?php
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