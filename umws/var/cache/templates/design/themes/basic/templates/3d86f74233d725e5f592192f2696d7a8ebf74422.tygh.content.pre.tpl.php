<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:11
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/addons/twigmo/hooks/index/content.pre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4449864825266555707ec86-28109378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d86f74233d725e5f592192f2696d7a8ebf74422' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/addons/twigmo/hooks/index/content.pre.tpl',
      1 => 1382438049,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '4449864825266555707ec86-28109378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'config' => 0,
    'home_location' => 0,
    'but_href' => 0,
    'offset' => 0,
    'tw_settings' => 0,
    'but_text' => 0,
    'addon_images_path' => 0,
    'show_avail_notice' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526655572b0a60_58375340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526655572b0a60_58375340')) {function content_526655572b0a60_58375340($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars['but_role'] = new Smarty_variable("general", null, 0);?>
<?php $_smarty_tpl->tpl_vars['addon_images_path'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['path_rel']->value)."/media/images/addons/twigmo/images/", null, 0);?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mobile_store_link", null, null); ob_start(); ?>
	<?php ob_start();?><?php echo htmlspecialchars(strpos($_smarty_tpl->tpl_vars['config']->value['current_url'],"?"), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
		<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable(fn_url(fn_query_remove(((string)$_smarty_tpl->tpl_vars['config']->value['current_url'])."&auto","desktop")), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable(fn_url(fn_query_remove(((string)$_smarty_tpl->tpl_vars['config']->value['current_url'])."?auto","desktop")), null, 0);?>
	<?php }?>
	
	    <?php if (defined("HTTPS")){?>
	    	<?php $_smarty_tpl->tpl_vars['home_location'] = new Smarty_variable("https://".((string)$_smarty_tpl->tpl_vars['config']->value['https_host']).((string)$_smarty_tpl->tpl_vars['config']->value['https_path']), null, 0);?>
	    <?php }else{ ?>
	    	<?php $_smarty_tpl->tpl_vars['home_location'] = new Smarty_variable("http://".((string)$_smarty_tpl->tpl_vars['config']->value['http_host']).((string)$_smarty_tpl->tpl_vars['config']->value['http_path']), null, 0);?>
	    <?php }?>
	    <?php $_smarty_tpl->tpl_vars['offset'] = new Smarty_variable(strlen($_smarty_tpl->tpl_vars['home_location']->value), null, 0);?>
	    <?php if (substr($_smarty_tpl->tpl_vars['but_href']->value,$_smarty_tpl->tpl_vars['offset']->value,6)=="/?auto"){?>
	        <?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['home_location']->value)."/".((string)$_smarty_tpl->tpl_vars['config']->value['customer_index'])."?auto", null, 0);?>
	    <?php }?>
    
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__('twg_visit_our_mobile_store');?>
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("android", null, null); ob_start(); ?>
	<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_googleplay'])===null||$tmp==='' ? "https://play.google.com/store" : $tmp), null, 0);?>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__('twg_app_for_android');?>
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("ios", null, null); ob_start(); ?>
	<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_appstore'])===null||$tmp==='' ? "https://itunes.apple.com/en/genre/ios/id36?mt=8" : $tmp), null, 0);?>
	<?php if ($_SESSION['device']=="iphone"){?>
		<?php $_smarty_tpl->tpl_vars['but_text'] = new Smarty_variable($_smarty_tpl->__('twg_app_for_iphone'), null, 0);?>
	<?php }elseif($_SESSION['device']=="ipad"){?>
	    <?php $_smarty_tpl->tpl_vars['but_text'] = new Smarty_variable($_smarty_tpl->__('twg_app_for_ipad'), null, 0);?>
	<?php }?>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');?>
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("notice_block", null, null); ob_start(); ?>
<div class="mobile-avail-notice<?php if ($_SESSION['twigmo_mobile_avail_notice_off']){?> hidden<?php }?>">
	<div class="buttons-container">
		<?php echo Smarty::$_smarty_vars['capture']['mobile_store_link'];?>

		<?php if ($_SESSION['device']=="android"&&$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_googleplay']){?>
			<?php echo Smarty::$_smarty_vars['capture']['android'];?>

		<?php }elseif(($_SESSION['device']=="iphone"||$_SESSION['device']=="ipad")&&$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_appstore']){?>
			<?php echo Smarty::$_smarty_vars['capture']['ios'];?>

		<?php }?>
		<img id="close_notification_mobile_avail_notice" class="cm-notification-close hand" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['addon_images_path']->value, ENT_QUOTES, 'UTF-8');?>
icons/icon_close.png" border="0" alt="Close" title="Close" />
	</div>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (($_SESSION['twg_user_agent']&&$_SESSION['twg_user_agent']=='tablet'&&$_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']=='tablet')||($_SESSION['twg_user_agent']&&$_SESSION['twg_user_agent']=='phone'&&$_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']=='phone')||($_SESSION['twg_user_agent']&&($_SESSION['twg_user_agent']=='tablet'||$_SESSION['twg_user_agent']=='phone')&&$_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']=='both_tablet_and_phone')){?>
	<?php $_smarty_tpl->tpl_vars['show_avail_notice'] = new Smarty_variable("Y", null, 0);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars['show_avail_notice'] = new Smarty_variable("N", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']!='never'&&$_smarty_tpl->tpl_vars['show_avail_notice']->value=="Y"){?>
	<?php if ($_SESSION['device']=="iphone"||$_SESSION['device']=="ipad"||$_SESSION['device']=="android"||$_SESSION['device']=="winphone"){?>
		<?php echo Smarty::$_smarty_vars['capture']['notice_block'];?>

	<?php }?>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="addons/twigmo/hooks/index/content.pre.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/twigmo/hooks/index/content.pre.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['but_role'] = new Smarty_variable("general", null, 0);?>
<?php $_smarty_tpl->tpl_vars['addon_images_path'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['path_rel']->value)."/media/images/addons/twigmo/images/", null, 0);?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mobile_store_link", null, null); ob_start(); ?>
	<?php ob_start();?><?php echo htmlspecialchars(strpos($_smarty_tpl->tpl_vars['config']->value['current_url'],"?"), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2){?>
		<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable(fn_url(fn_query_remove(((string)$_smarty_tpl->tpl_vars['config']->value['current_url'])."&auto","desktop")), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable(fn_url(fn_query_remove(((string)$_smarty_tpl->tpl_vars['config']->value['current_url'])."?auto","desktop")), null, 0);?>
	<?php }?>
	
	    <?php if (defined("HTTPS")){?>
	    	<?php $_smarty_tpl->tpl_vars['home_location'] = new Smarty_variable("https://".((string)$_smarty_tpl->tpl_vars['config']->value['https_host']).((string)$_smarty_tpl->tpl_vars['config']->value['https_path']), null, 0);?>
	    <?php }else{ ?>
	    	<?php $_smarty_tpl->tpl_vars['home_location'] = new Smarty_variable("http://".((string)$_smarty_tpl->tpl_vars['config']->value['http_host']).((string)$_smarty_tpl->tpl_vars['config']->value['http_path']), null, 0);?>
	    <?php }?>
	    <?php $_smarty_tpl->tpl_vars['offset'] = new Smarty_variable(strlen($_smarty_tpl->tpl_vars['home_location']->value), null, 0);?>
	    <?php if (substr($_smarty_tpl->tpl_vars['but_href']->value,$_smarty_tpl->tpl_vars['offset']->value,6)=="/?auto"){?>
	        <?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['home_location']->value)."/".((string)$_smarty_tpl->tpl_vars['config']->value['customer_index'])."?auto", null, 0);?>
	    <?php }?>
    
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__('twg_visit_our_mobile_store');?>
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("android", null, null); ob_start(); ?>
	<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_googleplay'])===null||$tmp==='' ? "https://play.google.com/store" : $tmp), null, 0);?>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__('twg_app_for_android');?>
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("ios", null, null); ob_start(); ?>
	<?php $_smarty_tpl->tpl_vars['but_href'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_appstore'])===null||$tmp==='' ? "https://itunes.apple.com/en/genre/ios/id36?mt=8" : $tmp), null, 0);?>
	<?php if ($_SESSION['device']=="iphone"){?>
		<?php $_smarty_tpl->tpl_vars['but_text'] = new Smarty_variable($_smarty_tpl->__('twg_app_for_iphone'), null, 0);?>
	<?php }elseif($_SESSION['device']=="ipad"){?>
	    <?php $_smarty_tpl->tpl_vars['but_text'] = new Smarty_variable($_smarty_tpl->__('twg_app_for_ipad'), null, 0);?>
	<?php }?>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');?>
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("notice_block", null, null); ob_start(); ?>
<div class="mobile-avail-notice<?php if ($_SESSION['twigmo_mobile_avail_notice_off']){?> hidden<?php }?>">
	<div class="buttons-container">
		<?php echo Smarty::$_smarty_vars['capture']['mobile_store_link'];?>

		<?php if ($_SESSION['device']=="android"&&$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_googleplay']){?>
			<?php echo Smarty::$_smarty_vars['capture']['android'];?>

		<?php }elseif(($_SESSION['device']=="iphone"||$_SESSION['device']=="ipad")&&$_smarty_tpl->tpl_vars['tw_settings']->value['url_on_appstore']){?>
			<?php echo Smarty::$_smarty_vars['capture']['ios'];?>

		<?php }?>
		<img id="close_notification_mobile_avail_notice" class="cm-notification-close hand" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['addon_images_path']->value, ENT_QUOTES, 'UTF-8');?>
icons/icon_close.png" border="0" alt="Close" title="Close" />
	</div>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (($_SESSION['twg_user_agent']&&$_SESSION['twg_user_agent']=='tablet'&&$_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']=='tablet')||($_SESSION['twg_user_agent']&&$_SESSION['twg_user_agent']=='phone'&&$_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']=='phone')||($_SESSION['twg_user_agent']&&($_SESSION['twg_user_agent']=='tablet'||$_SESSION['twg_user_agent']=='phone')&&$_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']=='both_tablet_and_phone')){?>
	<?php $_smarty_tpl->tpl_vars['show_avail_notice'] = new Smarty_variable("Y", null, 0);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars['show_avail_notice'] = new Smarty_variable("N", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['use_mobile_frontend']!='never'&&$_smarty_tpl->tpl_vars['show_avail_notice']->value=="Y"){?>
	<?php if ($_SESSION['device']=="iphone"||$_SESSION['device']=="ipad"||$_SESSION['device']=="android"||$_SESSION['device']=="winphone"){?>
		<?php echo Smarty::$_smarty_vars['capture']['notice_block'];?>

	<?php }?>
<?php }?>
<?php }?><?php }} ?>