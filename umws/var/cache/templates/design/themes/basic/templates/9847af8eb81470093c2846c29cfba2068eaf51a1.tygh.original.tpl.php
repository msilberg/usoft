<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 16:31:34
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/product_filters/original.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2097575233528a08a6a5d261-63617431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9847af8eb81470093c2846c29cfba2068eaf51a1' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/product_filters/original.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2097575233528a08a6a5d261-63617431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'items' => 0,
    'config' => 0,
    'curl' => 0,
    'settings' => 0,
    'filter_qstring' => 0,
    'reset_qstring' => 0,
    'filter' => 0,
    'filter_uid' => 0,
    'cookie_name_show_filter' => 0,
    'collapse' => 0,
    'ajax_div_ids' => 0,
    'allow_ajax' => 0,
    'use_ajax' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a08a6cacf81_48024430',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a08a6cacf81_48024430')) {function content_528a08a6cacf81_48024430($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('advanced','reset','advanced','reset'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>

<div id="product_filters_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
">
<?php if ($_smarty_tpl->tpl_vars['items']->value&&!$_REQUEST['advanced_filter']){?>

<?php if (strpos($_SERVER['QUERY_STRING'],"dispatch=")!==false){?>
    <?php $_smarty_tpl->tpl_vars["curl"] = new Smarty_variable($_smarty_tpl->tpl_vars['config']->value['current_url'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars["filter_qstring"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['curl']->value,"result_ids","full_render","filter_id","view_all","req_range_id","advanced_filter","features_hash","subcats","page"), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["filter_qstring"] = new Smarty_variable("products.search", null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["reset_qstring"] = new Smarty_variable("products.search", null, 0);?>

<?php if ($_REQUEST['category_id']&&$_smarty_tpl->tpl_vars['settings']->value['General']['show_products_from_subcategories']=="Y"){?>
    <?php $_smarty_tpl->tpl_vars["filter_qstring"] = new Smarty_variable(fn_link_attach($_smarty_tpl->tpl_vars['filter_qstring']->value,"subcats=Y"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["reset_qstring"] = new Smarty_variable(fn_link_attach($_smarty_tpl->tpl_vars['reset_qstring']->value,"subcats=Y"), null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["allow_ajax"] = new Smarty_variable(true, null, 0);?>
<?php $_smarty_tpl->tpl_vars["ajax_div_ids"] = new Smarty_variable("product_filters_*,products_search_*,category_products_*,product_features_*,breadcrumbs_*,currencies_*,languages_*", null, 0);?>

<?php $_smarty_tpl->tpl_vars["has_selected"] = new Smarty_variable(false, null, 0);?>
<?php  $_smarty_tpl->tpl_vars["filter"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["filter"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["filter"]->key => $_smarty_tpl->tpl_vars["filter"]->value){
$_smarty_tpl->tpl_vars["filter"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['filter']->value['slider']||$_smarty_tpl->tpl_vars['filter']->value['selected_ranges']||$_smarty_tpl->tpl_vars['filter']->value['ranges']){?>
        <?php $_smarty_tpl->tpl_vars["filter_uid"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."_".((string)$_smarty_tpl->tpl_vars['filter']->value['filter_id']), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["cookie_name_show_filter"] = new Smarty_variable("content_".((string)$_smarty_tpl->tpl_vars['filter_uid']->value), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['filter']->value['display']=="N"){?>
            
            <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(true, null, 0);?>
            <?php if ($_COOKIE[$_smarty_tpl->tpl_vars['cookie_name_show_filter']->value]){?>
                <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(false, null, 0);?>
            <?php }?>
        <?php }else{ ?>
            
            <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(false, null, 0);?>
            <?php if ($_COOKIE[$_smarty_tpl->tpl_vars['cookie_name_show_filter']->value]){?>
                <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(true, null, 0);?>
            <?php }?>
        <?php }?>

        <div id="sw_content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="filter-wrap cm-combination-filter_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['collapse']->value){?> open<?php }?> cm-save-state <?php if ($_smarty_tpl->tpl_vars['filter']->value['display']=="Y"){?>cm-ss-reverse<?php }?>">
            <i class="icon-down-dir"></i><i class="icon-right-dir"></i>
            <span class="filter-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['filter'], ENT_QUOTES, 'UTF-8');?>
</span>

            <?php if ($_smarty_tpl->tpl_vars['filter']->value['slider']){?>
                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/product_filter_slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('filter_uid'=>$_smarty_tpl->tpl_vars['filter_uid']->value,'id'=>"slider_".((string)$_smarty_tpl->tpl_vars['filter_uid']->value),'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'dynamic'=>true,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

            <?php }else{ ?>
                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/product_filter_variants.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('filter_uid'=>$_smarty_tpl->tpl_vars['filter_uid']->value,'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'collapse'=>$_smarty_tpl->tpl_vars['collapse']->value,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

            <?php }?>
        </div>
    <?php }?>
<?php } ?>

<div class="filters-tools clearfix">
    <div class="float-right"><a <?php if (defined("FILTER_CUSTOM_ADVANCED")){?>href="<?php echo htmlspecialchars(fn_url("products.search?advanced_filter=Y"), ENT_QUOTES, 'UTF-8');?>
"<?php }else{ ?>href="<?php echo htmlspecialchars(fn_url(fn_link_attach($_smarty_tpl->tpl_vars['filter_qstring']->value,"advanced_filter=Y")), ENT_QUOTES, 'UTF-8');?>
"<?php }?> rel="nofollow" class="secondary-link"><?php echo $_smarty_tpl->__("advanced");?>
</a></div>
    <?php if (Smarty::$_smarty_vars['capture']['has_selected']){?>
    <a href="<?php if ($_REQUEST['category_id']){?><?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(true, null, 0);?><?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_REQUEST['category_id'])), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(false, null, 0);?><?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
<?php }?>" rel="nofollow" class="reset-filters<?php if ($_smarty_tpl->tpl_vars['allow_ajax']->value&&$_smarty_tpl->tpl_vars['use_ajax']->value){?> cm-ajax cm-ajax-full-render cm-history" data-ca-scroll=".cm-pagination-container" data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_div_ids']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>"><i class="icon-cw"></i> <?php echo $_smarty_tpl->__("reset");?>
</a>
    <?php }?>
</div>

<?php }?>
<!--product_filters_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
--></div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/product_filters/original.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/product_filters/original.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?>

<div id="product_filters_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
">
<?php if ($_smarty_tpl->tpl_vars['items']->value&&!$_REQUEST['advanced_filter']){?>

<?php if (strpos($_SERVER['QUERY_STRING'],"dispatch=")!==false){?>
    <?php $_smarty_tpl->tpl_vars["curl"] = new Smarty_variable($_smarty_tpl->tpl_vars['config']->value['current_url'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars["filter_qstring"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['curl']->value,"result_ids","full_render","filter_id","view_all","req_range_id","advanced_filter","features_hash","subcats","page"), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["filter_qstring"] = new Smarty_variable("products.search", null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["reset_qstring"] = new Smarty_variable("products.search", null, 0);?>

<?php if ($_REQUEST['category_id']&&$_smarty_tpl->tpl_vars['settings']->value['General']['show_products_from_subcategories']=="Y"){?>
    <?php $_smarty_tpl->tpl_vars["filter_qstring"] = new Smarty_variable(fn_link_attach($_smarty_tpl->tpl_vars['filter_qstring']->value,"subcats=Y"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["reset_qstring"] = new Smarty_variable(fn_link_attach($_smarty_tpl->tpl_vars['reset_qstring']->value,"subcats=Y"), null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["allow_ajax"] = new Smarty_variable(true, null, 0);?>
<?php $_smarty_tpl->tpl_vars["ajax_div_ids"] = new Smarty_variable("product_filters_*,products_search_*,category_products_*,product_features_*,breadcrumbs_*,currencies_*,languages_*", null, 0);?>

<?php $_smarty_tpl->tpl_vars["has_selected"] = new Smarty_variable(false, null, 0);?>
<?php  $_smarty_tpl->tpl_vars["filter"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["filter"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["filter"]->key => $_smarty_tpl->tpl_vars["filter"]->value){
$_smarty_tpl->tpl_vars["filter"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['filter']->value['slider']||$_smarty_tpl->tpl_vars['filter']->value['selected_ranges']||$_smarty_tpl->tpl_vars['filter']->value['ranges']){?>
        <?php $_smarty_tpl->tpl_vars["filter_uid"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."_".((string)$_smarty_tpl->tpl_vars['filter']->value['filter_id']), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["cookie_name_show_filter"] = new Smarty_variable("content_".((string)$_smarty_tpl->tpl_vars['filter_uid']->value), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['filter']->value['display']=="N"){?>
            
            <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(true, null, 0);?>
            <?php if ($_COOKIE[$_smarty_tpl->tpl_vars['cookie_name_show_filter']->value]){?>
                <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(false, null, 0);?>
            <?php }?>
        <?php }else{ ?>
            
            <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(false, null, 0);?>
            <?php if ($_COOKIE[$_smarty_tpl->tpl_vars['cookie_name_show_filter']->value]){?>
                <?php $_smarty_tpl->tpl_vars["collapse"] = new Smarty_variable(true, null, 0);?>
            <?php }?>
        <?php }?>

        <div id="sw_content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
" class="filter-wrap cm-combination-filter_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_uid']->value, ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->tpl_vars['collapse']->value){?> open<?php }?> cm-save-state <?php if ($_smarty_tpl->tpl_vars['filter']->value['display']=="Y"){?>cm-ss-reverse<?php }?>">
            <i class="icon-down-dir"></i><i class="icon-right-dir"></i>
            <span class="filter-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['filter'], ENT_QUOTES, 'UTF-8');?>
</span>

            <?php if ($_smarty_tpl->tpl_vars['filter']->value['slider']){?>
                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/product_filter_slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('filter_uid'=>$_smarty_tpl->tpl_vars['filter_uid']->value,'id'=>"slider_".((string)$_smarty_tpl->tpl_vars['filter_uid']->value),'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'dynamic'=>true,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

            <?php }else{ ?>
                <?php echo $_smarty_tpl->getSubTemplate ("blocks/product_filters/components/product_filter_variants.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('filter_uid'=>$_smarty_tpl->tpl_vars['filter_uid']->value,'filter'=>$_smarty_tpl->tpl_vars['filter']->value,'ajax_div_ids'=>$_smarty_tpl->tpl_vars['ajax_div_ids']->value,'collapse'=>$_smarty_tpl->tpl_vars['collapse']->value,'filter_qstring'=>$_smarty_tpl->tpl_vars['filter_qstring']->value,'reset_qstring'=>$_smarty_tpl->tpl_vars['reset_qstring']->value,'allow_ajax'=>$_smarty_tpl->tpl_vars['allow_ajax']->value), 0);?>

            <?php }?>
        </div>
    <?php }?>
<?php } ?>

<div class="filters-tools clearfix">
    <div class="float-right"><a <?php if (defined("FILTER_CUSTOM_ADVANCED")){?>href="<?php echo htmlspecialchars(fn_url("products.search?advanced_filter=Y"), ENT_QUOTES, 'UTF-8');?>
"<?php }else{ ?>href="<?php echo htmlspecialchars(fn_url(fn_link_attach($_smarty_tpl->tpl_vars['filter_qstring']->value,"advanced_filter=Y")), ENT_QUOTES, 'UTF-8');?>
"<?php }?> rel="nofollow" class="secondary-link"><?php echo $_smarty_tpl->__("advanced");?>
</a></div>
    <?php if (Smarty::$_smarty_vars['capture']['has_selected']){?>
    <a href="<?php if ($_REQUEST['category_id']){?><?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(true, null, 0);?><?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_REQUEST['category_id'])), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php $_smarty_tpl->tpl_vars["use_ajax"] = new Smarty_variable(false, null, 0);?><?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
<?php }?>" rel="nofollow" class="reset-filters<?php if ($_smarty_tpl->tpl_vars['allow_ajax']->value&&$_smarty_tpl->tpl_vars['use_ajax']->value){?> cm-ajax cm-ajax-full-render cm-history" data-ca-scroll=".cm-pagination-container" data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_div_ids']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>"><i class="icon-cw"></i> <?php echo $_smarty_tpl->__("reset");?>
</a>
    <?php }?>
</div>

<?php }?>
<!--product_filters_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
--></div><?php }?><?php }} ?>