<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:43
         compiled from "/home/mike/public_html/umws/design/backend/templates/views/promotions/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1584865271526655775bb113-43339197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7747f6635618d2251e6773be45d575c9fa23209a' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/views/promotions/manage.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1584865271526655775bb113-43339197',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'search' => 0,
    'promotions' => 0,
    'c_url' => 0,
    'c_icon' => 0,
    'c_dummy' => 0,
    'promotion' => 0,
    'allow_save' => 0,
    'additional_class' => 0,
    'link_text' => 0,
    'status_display' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266557773dfd9_16483936',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266557773dfd9_16483936')) {function content_5266557773dfd9_16483936($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('name','priority','zone','status','edit','view','delete','no_data','add_catalog_promotion','add_cart_promotion','add_cart_promotion','promotions'));
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="promotion_form" class="<?php if (fn_check_form_permissions('')){?> cm-hide-inputs<?php }?>">

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('save_current_page'=>true,'save_current_url'=>true), 0);?>


<?php $_smarty_tpl->tpl_vars["c_url"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],"sort_by","sort_order"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_icon"] = new Smarty_variable("<i class=\"exicon-".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])."\"></i>", null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_dummy"] = new Smarty_variable("<i class=\"exicon-dummy\"></i>", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['promotions']->value){?>
<table class="table table-middle">
<thead>
<tr>
    <th width="1%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </th>
    <th width="30%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=name&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("name");?>
<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="name"){?><?php echo $_smarty_tpl->tpl_vars['c_icon']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c_dummy']->value;?>
<?php }?></a></th>
    <th width="10%" class="nowrap center">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=priority&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("priority");?>
<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="priority"){?><?php echo $_smarty_tpl->tpl_vars['c_icon']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c_dummy']->value;?>
<?php }?></a></th>
    <th width="10%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=zone&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("zone");?>
<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="zone"){?><?php echo $_smarty_tpl->tpl_vars['c_icon']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c_dummy']->value;?>
<?php }?></a></th>
    <th width="10%">&nbsp;</th>
    <th width="10%" class="right"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=status&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("status");?>
<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="status"){?><?php echo $_smarty_tpl->tpl_vars['c_icon']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c_dummy']->value;?>
<?php }?></a></th>
</tr>
</thead>

<?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['promotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
?>

    <?php $_smarty_tpl->tpl_vars["allow_save"] = new Smarty_variable(fn_allow_save_object($_smarty_tpl->tpl_vars['promotion']->value,"promotions"), null, 0);?>

    <?php if ($_smarty_tpl->tpl_vars['allow_save']->value){?>
        <?php $_smarty_tpl->tpl_vars["link_text"] = new Smarty_variable($_smarty_tpl->__("edit"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["additional_class"] = new Smarty_variable("cm-no-hide-input", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status_display"] = new Smarty_variable('', null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars["link_text"] = new Smarty_variable($_smarty_tpl->__("view"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["additional_class"] = new Smarty_variable("cm-hide-inputs", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status_display"] = new Smarty_variable("text", null, 0);?>
    <?php }?>

<tr class="cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['promotion']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['additional_class']->value, ENT_QUOTES, 'UTF-8');?>
">
    <td>
        <input name="promotion_ids[]" type="checkbox" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promotion']->value['promotion_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
    <td>
        <a class="row-status" href="<?php echo htmlspecialchars(fn_url("promotions.update?promotion_id=".((string)$_smarty_tpl->tpl_vars['promotion']->value['promotion_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promotion']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('object'=>$_smarty_tpl->tpl_vars['promotion']->value), 0);?>

    <td class="center">
        <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promotion']->value['priority'], ENT_QUOTES, 'UTF-8');?>
</span>
    </td>
    <td>
        <span class="row-status"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['promotion']->value['zone']);?>
</span>
    </td>
    <td class="right">
        <div class="hidden-tools">
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_smarty_tpl->tpl_vars['link_text']->value,'href'=>"promotions.update?promotion_id=".((string)$_smarty_tpl->tpl_vars['promotion']->value['promotion_id'])));?>
</li>
            <?php if ($_smarty_tpl->tpl_vars['allow_save']->value){?>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("delete"),'class'=>"cm-confirm",'href'=>"promotions.delete?promotion_id=".((string)$_smarty_tpl->tpl_vars['promotion']->value['promotion_id'])));?>
</li>
            <?php }?>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

        </div>
    </td>
    <td class="nowrap right">
        <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('popup_additional_class'=>"dropleft",'display'=>$_smarty_tpl->tpl_vars['status_display']->value,'id'=>$_smarty_tpl->tpl_vars['promotion']->value['promotion_id'],'status'=>$_smarty_tpl->tpl_vars['promotion']->value['status'],'hidden'=>true,'object_id_name'=>"promotion_id",'table'=>"promotions"), 0);?>

    </td>
</tr>
<?php } ?>
</table>
<?php }else{ ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <?php if ($_smarty_tpl->tpl_vars['promotions']->value){?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[promotions.m_delete]",'form'=>"promotion_form"));?>
</li>
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("add_catalog_promotion"),'href'=>"promotions.add?zone=catalog"));?>
</li>
        <?php if (!fn_allowed_for("ULTIMATE:FREE")){?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("add_cart_promotion"),'href'=>"promotions.add?zone=cart"));?>
</li>
        <?php }else{ ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("add_cart_promotion"),'class'=>"cm-promo-popup"));?>
</li>
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php ob_start();?><?php echo $_smarty_tpl->__('add_promotions');?>
<?php $_tmp1=ob_get_clean();?><?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list'],'icon'=>"icon-plus",'no_caret'=>true,'title'=>$_tmp1));?>

    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

</form>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>__("promotions"),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'tools'=>Smarty::$_smarty_vars['capture']['tools'],'select_languages'=>true,'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons']), 0);?>
<?php }} ?>