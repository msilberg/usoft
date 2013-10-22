<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:15
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/addons/statistics/hooks/index/footer.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16565905775266555bbbf687-31165006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0739fcabc8304a9f930d4968590709853178850b' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/addons/statistics/hooks/index/footer.post.tpl',
      1 => 1382438048,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '16565905775266555bbbf687-31165006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'ldelim' => 0,
    'rdelim' => 0,
    'page_title' => 0,
    'location_data' => 0,
    'breadcrumbs' => 0,
    'i' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266555bcc4fc6_89690646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266555bcc4fc6_89690646')) {function content_5266555bcc4fc6_89690646($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><script type="text/javascript">
//<![CDATA[
Tygh.$(document).ready(function()<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>

    Tygh.$.ceAjax('request', '<?php echo fn_url("statistics.collect",'C','current');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>

        method: 'post',
        data: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>

            've[url]': location.href,
            've[title]': document.title,
            've[browser_version]': Tygh.$.ua.version,
            've[browser]': Tygh.$.ua.browser,
            've[os]': Tygh.$.ua.os,
            've[client_language]': Tygh.$.ua.language,
            've[referrer]': document.referrer,
            've[screen_x]': (screen.width || null),
            've[screen_y]': (screen.height || null),
            've[color]': (screen.colorDepth || screen.pixelDepth || null),
            've[time_begin]': <?php echo htmlspecialchars(@constant('MICROTIME'), ENT_QUOTES, 'UTF-8');?>

        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
,
        hidden: true
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);
//]]>
</script>

<noscript>
<?php $_smarty_tpl->_capture_stack[0][] = array("statistics_link", null, null); ob_start(); ?>statistics.collect?ve[url]=<?php echo htmlspecialchars(rawurlencode(@constant('REAL_URL')), ENT_QUOTES, 'UTF-8');?>
&ve[title]=<?php if ($_smarty_tpl->tpl_vars['page_title']->value){?><?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['page_title']->value), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['location_data']->value['page_title']), ENT_QUOTES, 'UTF-8');?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['i']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['i']->iteration=0;
 $_smarty_tpl->tpl_vars['i']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->iteration++;
 $_smarty_tpl->tpl_vars['i']->index++;
 $_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->index === 0;
 $_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['first'] = $_smarty_tpl->tpl_vars['i']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['last'] = $_smarty_tpl->tpl_vars['i']->last;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['index']==1){?> - <?php }?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['first']){?><?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['i']->value['title']), ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['last']){?> :: <?php }?><?php }?><?php } ?><?php }?>&ve[referrer]=<?php echo htmlspecialchars(rawurlencode($_SERVER['HTTP_REFERER']), ENT_QUOTES, 'UTF-8');?>
&ve[time_begin]=<?php echo htmlspecialchars(@constant('MICROTIME'), ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<object data="<?php echo htmlspecialchars(fn_url(Smarty::$_smarty_vars['capture']['statistics_link']), ENT_QUOTES, 'UTF-8');?>
" width="0" height="0"></object>
</noscript><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="addons/statistics/hooks/index/footer.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/statistics/hooks/index/footer.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><script type="text/javascript">
//<![CDATA[
Tygh.$(document).ready(function()<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>

    Tygh.$.ceAjax('request', '<?php echo fn_url("statistics.collect",'C','current');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>

        method: 'post',
        data: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>

            've[url]': location.href,
            've[title]': document.title,
            've[browser_version]': Tygh.$.ua.version,
            've[browser]': Tygh.$.ua.browser,
            've[os]': Tygh.$.ua.os,
            've[client_language]': Tygh.$.ua.language,
            've[referrer]': document.referrer,
            've[screen_x]': (screen.width || null),
            've[screen_y]': (screen.height || null),
            've[color]': (screen.colorDepth || screen.pixelDepth || null),
            've[time_begin]': <?php echo htmlspecialchars(@constant('MICROTIME'), ENT_QUOTES, 'UTF-8');?>

        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
,
        hidden: true
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);
//]]>
</script>

<noscript>
<?php $_smarty_tpl->_capture_stack[0][] = array("statistics_link", null, null); ob_start(); ?>statistics.collect?ve[url]=<?php echo htmlspecialchars(rawurlencode(@constant('REAL_URL')), ENT_QUOTES, 'UTF-8');?>
&ve[title]=<?php if ($_smarty_tpl->tpl_vars['page_title']->value){?><?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['page_title']->value), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['location_data']->value['page_title']), ENT_QUOTES, 'UTF-8');?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['i']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['i']->iteration=0;
 $_smarty_tpl->tpl_vars['i']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->iteration++;
 $_smarty_tpl->tpl_vars['i']->index++;
 $_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->index === 0;
 $_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['first'] = $_smarty_tpl->tpl_vars['i']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['last'] = $_smarty_tpl->tpl_vars['i']->last;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['index']==1){?> - <?php }?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['first']){?><?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['i']->value['title']), ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['last']){?> :: <?php }?><?php }?><?php } ?><?php }?>&ve[referrer]=<?php echo htmlspecialchars(rawurlencode($_SERVER['HTTP_REFERER']), ENT_QUOTES, 'UTF-8');?>
&ve[time_begin]=<?php echo htmlspecialchars(@constant('MICROTIME'), ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<object data="<?php echo htmlspecialchars(fn_url(Smarty::$_smarty_vars['capture']['statistics_link']), ENT_QUOTES, 'UTF-8');?>
" width="0" height="0"></object>
</noscript><?php }?><?php }} ?>