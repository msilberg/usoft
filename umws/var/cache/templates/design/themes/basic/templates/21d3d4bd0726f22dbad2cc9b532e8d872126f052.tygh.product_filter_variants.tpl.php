<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 16:31:34
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/product_filters/components/product_filter_variants.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92149669528a08a6cb64f1-24775862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21d3d4bd0726f22dbad2cc9b532e8d872126f052' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/product_filters/components/product_filter_variants.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '92149669528a08a6cb64f1-24775862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'collapse' => 0,
    'filter_uid' => 0,
    'filter' => 0,
    'selected_range' => 0,
    'fh' => 0,
    'reset_qstring' => 0,
    'filter_qstring' => 0,
    'reset_lnk' => 0,
    'attach_query' => 0,
    'href' => 0,
    'config' => 0,
    'allow_ajax' => 0,
    'use_ajax' => 0,
    'ajax_div_ids' => 0,
    'range' => 0,
    'capture_q' => 0,
    'cookie_name_show_more' => 0,
    'more_collapse' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a08a6f07626_02093732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a08a6f07626_02093732')) {function content_528a08a6f07626_02093732($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('view_all','more','less','view_all','more','less'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>                <ul class="product-filters <?php if ($_smarty_tpl->tpl_vars['collapse']->value){?>hidden<?php }?>" id="content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
">

                    
                    <?php  $_smarty_tpl->tpl_vars["selected_range"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["selected_range"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['selected_ranges']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["selected_range"]->key => $_smarty_tpl->tpl_vars["selected_range"]->value){
$_smarty_tpl->tpl_vars["selected_range"]->_loop = true;
?>
                        <?php $_smarty_tpl->_capture_stack[0][] = array("has_selected", null, null); ob_start(); ?>Y<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                        <li>
                            <?php $_smarty_tpl->tpl_vars["fh"] = new Smarty_variable(fn_delete_range_from_url($_REQUEST['features_hash'],$_smarty_tpl->tpl_vars['selected_range']->value,$_smarty_tpl->tpl_vars['filter']->value['field_type']), null, 0);?><?php if ($_smarty_tpl->tpl_vars['fh']->value){?><?php $_smarty_tpl->tpl_vars["attach_query"] = new Smarty_variable("features_hash=".((string)$_smarty_tpl->tpl_vars['fh']->value), null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['filter']->value['feature_type']=="E"&&$_smarty_tpl->tpl_vars['selected_range']->value['range_id']==$_REQUEST['variant_id']){?><?php $_smarty_tpl->tpl_vars["reset_lnk"] = new Smarty_variable($_smarty_tpl->tpl_vars['reset_qstring']->value, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["reset_lnk"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter_qstring']->value, null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['fh']->value){?><?php $_smarty_tpl->tpl_vars["href"] = new Smarty_variable(fn_url(fn_link_attach($_smarty_tpl->tpl_vars['reset_lnk']->value,$_smarty_tpl->tpl_vars['attach_query']->value)), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["href"] = new Smarty_variable(fn_url($_smarty_tpl->tpl_vars['reset_lnk']->value), null, 0);?><?php }?><?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(fn_compare_dispatch($_smarty_tpl->tpl_vars['href']->value,$_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8');?>
" class="filter-item checked<?php if ($_smarty_tpl->tpl_vars['allow_ajax']->value&&$_smarty_tpl->tpl_vars['use_ajax']->value){?> cm-ajax cm-ajax-full-render cm-history"<?php }?> data-ca-scroll=".cm-pagination-container" data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_div_ids']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><span class="filter-icon"><i class="icon-ok"></i><i class="icon-cancel"></i></span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars(fn_text_placeholders($_smarty_tpl->tpl_vars['selected_range']->value['range_name']), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
</a>
                        </li>
                    <?php } ?>

                    
                    <?php if (fn_is_not_empty($_smarty_tpl->tpl_vars['filter']->value['ranges'])){?>
                        <ul id="ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
">

                            <?php  $_smarty_tpl->tpl_vars["range"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["range"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['ranges']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["range"]->key => $_smarty_tpl->tpl_vars["range"]->value){
$_smarty_tpl->tpl_vars["range"]->_loop = true;
?>
                                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/variant_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('range'=>$_smarty_tpl->tpl_vars['range']->value,'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

                            <?php } ?>

                        </ul>
                    <?php }?>


                    
                    <?php $_smarty_tpl->_capture_stack[0][] = array("view_all", null, null); ob_start(); ?>
                        <?php if ($_smarty_tpl->tpl_vars['filter']->value['more_cut']){?>
                            <?php $_smarty_tpl->_capture_stack[0][] = array("q", null, null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['filter_qstring']->value;?>
&filter_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['filter_id'], ENT_QUOTES, 'UTF-8');?>
&<?php if ($_REQUEST['features_hash']){?>&features_hash=<?php echo htmlspecialchars($_REQUEST['features_hash'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                            <li id="view_all_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
">
                                <?php $_smarty_tpl->tpl_vars["capture_q"] = new Smarty_variable(rawurlencode(Smarty::$_smarty_vars['capture']['q']), null, 0);?>
                                <a href="<?php echo htmlspecialchars(fn_url("product_features.view_all?q=".((string)$_smarty_tpl->tpl_vars['capture_q']->value)), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="extra-link"><?php echo $_smarty_tpl->__("view_all");?>
</a>
                            </li>
                        <?php }?>
                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

                    
                    <?php if (fn_is_not_empty($_smarty_tpl->tpl_vars['filter']->value['more_ranges'])){?>
                        <?php $_smarty_tpl->tpl_vars["cookie_name_show_more"] = new Smarty_variable("more_ranges_".((string)$_smarty_tpl->tpl_vars['filter_uid']->value), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["more_collapse"] = new Smarty_variable(true, null, 0);?>
                        <?php if ($_COOKIE[$_smarty_tpl->tpl_vars['cookie_name_show_more']->value]){?>
                            <?php $_smarty_tpl->tpl_vars["more_collapse"] = new Smarty_variable(false, null, 0);?>
                        <?php }?>

                        <ul id="more_ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['more_collapse']->value){?>class="hidden"<?php }?>>

                            <?php  $_smarty_tpl->tpl_vars["range"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["range"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['more_ranges']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["range"]->key => $_smarty_tpl->tpl_vars["range"]->value){
$_smarty_tpl->tpl_vars["range"]->_loop = true;
?>
                                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/variant_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('range'=>$_smarty_tpl->tpl_vars['range']->value,'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

                            <?php } ?>

                            <?php echo Smarty::$_smarty_vars['capture']['view_all'];?>


                        </ul>

                        <li class="extra-link-wrap">
                            <a id="on_more_ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="extra-link cm-save-state cm-combination-more_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['more_collapse']->value){?> hidden<?php }?>"><?php echo $_smarty_tpl->__("more");?>
</a>
                            <a id="off_more_ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="extra-link cm-save-state cm-combination-more_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['more_collapse']->value){?> hidden<?php }?>"><?php echo $_smarty_tpl->__("less");?>
</a>
                        </li>
                    <?php }else{ ?>
                        <?php echo Smarty::$_smarty_vars['capture']['view_all'];?>

                    <?php }?>
                </ul><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/product_filters/components/product_filter_variants.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/product_filters/components/product_filter_variants.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?>                <ul class="product-filters <?php if ($_smarty_tpl->tpl_vars['collapse']->value){?>hidden<?php }?>" id="content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
">

                    
                    <?php  $_smarty_tpl->tpl_vars["selected_range"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["selected_range"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['selected_ranges']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["selected_range"]->key => $_smarty_tpl->tpl_vars["selected_range"]->value){
$_smarty_tpl->tpl_vars["selected_range"]->_loop = true;
?>
                        <?php $_smarty_tpl->_capture_stack[0][] = array("has_selected", null, null); ob_start(); ?>Y<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                        <li>
                            <?php $_smarty_tpl->tpl_vars["fh"] = new Smarty_variable(fn_delete_range_from_url($_REQUEST['features_hash'],$_smarty_tpl->tpl_vars['selected_range']->value,$_smarty_tpl->tpl_vars['filter']->value['field_type']), null, 0);?><?php if ($_smarty_tpl->tpl_vars['fh']->value){?><?php $_smarty_tpl->tpl_vars["attach_query"] = new Smarty_variable("features_hash=".((string)$_smarty_tpl->tpl_vars['fh']->value), null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['filter']->value['feature_type']=="E"&&$_smarty_tpl->tpl_vars['selected_range']->value['range_id']==$_REQUEST['variant_id']){?><?php $_smarty_tpl->tpl_vars["reset_lnk"] = new Smarty_variable($_smarty_tpl->tpl_vars['reset_qstring']->value, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["reset_lnk"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter_qstring']->value, null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['fh']->value){?><?php $_smarty_tpl->tpl_vars["href"] = new Smarty_variable(fn_url(fn_link_attach($_smarty_tpl->tpl_vars['reset_lnk']->value,$_smarty_tpl->tpl_vars['attach_query']->value)), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["href"] = new Smarty_variable(fn_url($_smarty_tpl->tpl_vars['reset_lnk']->value), null, 0);?><?php }?><?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(fn_compare_dispatch($_smarty_tpl->tpl_vars['href']->value,$_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8');?>
" class="filter-item checked<?php if ($_smarty_tpl->tpl_vars['allow_ajax']->value&&$_smarty_tpl->tpl_vars['use_ajax']->value){?> cm-ajax cm-ajax-full-render cm-history"<?php }?> data-ca-scroll=".cm-pagination-container" data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_div_ids']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><span class="filter-icon"><i class="icon-ok"></i><i class="icon-cancel"></i></span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars(fn_text_placeholders($_smarty_tpl->tpl_vars['selected_range']->value['range_name']), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
</a>
                        </li>
                    <?php } ?>

                    
                    <?php if (fn_is_not_empty($_smarty_tpl->tpl_vars['filter']->value['ranges'])){?>
                        <ul id="ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
">

                            <?php  $_smarty_tpl->tpl_vars["range"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["range"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['ranges']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["range"]->key => $_smarty_tpl->tpl_vars["range"]->value){
$_smarty_tpl->tpl_vars["range"]->_loop = true;
?>
                                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/variant_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('range'=>$_smarty_tpl->tpl_vars['range']->value,'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

                            <?php } ?>

                        </ul>
                    <?php }?>


                    
                    <?php $_smarty_tpl->_capture_stack[0][] = array("view_all", null, null); ob_start(); ?>
                        <?php if ($_smarty_tpl->tpl_vars['filter']->value['more_cut']){?>
                            <?php $_smarty_tpl->_capture_stack[0][] = array("q", null, null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['filter_qstring']->value;?>
&filter_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['filter_id'], ENT_QUOTES, 'UTF-8');?>
&<?php if ($_REQUEST['features_hash']){?>&features_hash=<?php echo htmlspecialchars($_REQUEST['features_hash'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                            <li id="view_all_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
">
                                <?php $_smarty_tpl->tpl_vars["capture_q"] = new Smarty_variable(rawurlencode(Smarty::$_smarty_vars['capture']['q']), null, 0);?>
                                <a href="<?php echo htmlspecialchars(fn_url("product_features.view_all?q=".((string)$_smarty_tpl->tpl_vars['capture_q']->value)), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="extra-link"><?php echo $_smarty_tpl->__("view_all");?>
</a>
                            </li>
                        <?php }?>
                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

                    
                    <?php if (fn_is_not_empty($_smarty_tpl->tpl_vars['filter']->value['more_ranges'])){?>
                        <?php $_smarty_tpl->tpl_vars["cookie_name_show_more"] = new Smarty_variable("more_ranges_".((string)$_smarty_tpl->tpl_vars['filter_uid']->value), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["more_collapse"] = new Smarty_variable(true, null, 0);?>
                        <?php if ($_COOKIE[$_smarty_tpl->tpl_vars['cookie_name_show_more']->value]){?>
                            <?php $_smarty_tpl->tpl_vars["more_collapse"] = new Smarty_variable(false, null, 0);?>
                        <?php }?>

                        <ul id="more_ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['more_collapse']->value){?>class="hidden"<?php }?>>

                            <?php  $_smarty_tpl->tpl_vars["range"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["range"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['more_ranges']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["range"]->key => $_smarty_tpl->tpl_vars["range"]->value){
$_smarty_tpl->tpl_vars["range"]->_loop = true;
?>
                                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/variant_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('range'=>$_smarty_tpl->tpl_vars['range']->value,'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

                            <?php } ?>

                            <?php echo Smarty::$_smarty_vars['capture']['view_all'];?>


                        </ul>

                        <li class="extra-link-wrap">
                            <a id="on_more_ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="extra-link cm-save-state cm-combination-more_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['more_collapse']->value){?> hidden<?php }?>"><?php echo $_smarty_tpl->__("more");?>
</a>
                            <a id="off_more_ranges_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="extra-link cm-save-state cm-combination-more_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['more_collapse']->value){?> hidden<?php }?>"><?php echo $_smarty_tpl->__("less");?>
</a>
                        </li>
                    <?php }else{ ?>
                        <?php echo Smarty::$_smarty_vars['capture']['view_all'];?>

                    <?php }?>
                </ul><?php }?><?php }} ?>